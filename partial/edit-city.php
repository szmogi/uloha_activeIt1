<?php



// Delete weather.
if (isset($_POST['deleted'])) {      
    
    $id = test_input($_POST['deleted']);

    $delete = $db->prepare("
						DELETE FROM `weather` 
						WHERE id = :id 						
						");
    $delete->execute(['id' => $id]);

    if ($delete->rowCount() > 0) {

        $_SESSION["FormRequest"] = 1;        

    }else{

        $_SESSION["FormRequest"] = 0;  

    }
}



// Insert a city into the database
if (isset($_POST['inputCity']) || isset($_POST['selectCity']) ) {
       
     if(strlen($_POST['inputCity']) > 1){

        $city = test_input($_POST['inputCity']);

        }else {

        $city = test_input($_POST['selectCity']);
      }




      $ifCity = weather($city);

      $exist = $db->query("SELECT * FROM  weather WHERE city = '$city'"); 

    
    
     if ($ifCity->cod == 404 || count( $exist->fetchAll(PDO::FETCH_ASSOC)) > 0){

        $newCity = false;
        $_SESSION["FormRequest"] = 0;    

        if($ifCity->cod == 404){
            $_SESSION["FormRequestMsg"] = 'Mesto sa nenašlo!';                  
        }else{
            $_SESSION["FormRequestMsg"] = 'Mesto už je v zozname!'; 
        }
        
       

     }else{
        $newCity = $db->prepare("
            INSERT INTO weather
                ( city)
                 VALUES
                ( :city)
        ");
        $insert = $newCity->execute([
            'city'  => $city,

        ]);


        if ($newCity->rowCount() > 0) {

            $_SESSION["FormRequest"] = 1;
        } else {

            $_SESSION["FormRequest"] = 0;
        }

    }    
   
}


