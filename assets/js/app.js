(function($) {

	

	//varialble
    var msgRequ = $('#msg-request')
	var selectCityButton = $('.select-city-a') 
	var addForm = $('#add-form')
	var delForm = $('#del-form ')


	// Refresh the msg requ.
	$( document ).ready(function() {
		    if(msgRequ.length){		     
	          setTimeout(() => {				
				msgRequ.fadeOut()				
			  }, 2000);
	       }		
 
     });   


	 
    

	 // Widgets the window.
	msgRequ.find('span').on('click', function(event){
		$(this).parent().fadeOut()
	})





		// Deletes the form.
	delForm.on('submit', function(e){     
		   if(confirm('Určite vymazať?')){     
			 $('#spinner').removeClass('hidden');	
		   }else{
			event.preventDefault();
		   }
	});


		// Adds a form to the submit button.
	addForm.on('submit', function(e){  
		$('#spinner').removeClass('hidden');	
		  
	});





	// Clicks a city button
	selectCityButton.on('click', function(e){
         e.preventDefault();
		if($(this).text() === 'späť'){
			$('#select-city').prev().fadeIn(500);
		    $('#select-city').fadeOut(1);
			$(this).text('Populárne mestá');

		}else{
			$('#select-city').prev().fadeOut(1);
	     	$('#select-city').fadeIn(500)
	     	$(this).text('späť');

		}
		
	})



}(jQuery));