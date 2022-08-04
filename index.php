<!DOCTYPE html>
<html>
<?php

session_start();
$_SESSION["FormRequest"] = '';
$_SESSION["FormRequestMsg"] = 'Zlyhalo skúste znova!';



require "_inc/config.php";
require "partial/edit-city.php";





// fetch city database 
$citys = $db->query("SELECT * FROM weather");
$city = $citys->fetchAll(PDO::FETCH_OBJ);


// assign to the city weather
foreach ($city as $key => $value) {
    $value->current_weather = [];
    array_push($value->current_weather, weather($value->city));
    $value->city = ucfirst($value->city);
}



// CityList. json
$json_city = file_get_contents("data/CityList.json");
(object)$cityList = json_decode($json_city, true);


?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Weather</title>
    <link rel="stylesheet" href="<?= asset('/css/base.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital@1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital@1&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>


<body class="bg-light">
    <main style="padding: 3rem 0rem;">
        <?php if ($_SESSION['FormRequest'] == 1) : ?>
            <div id="msg-request" class="col-12 alert alert-success fixed-top" role="alert">
                <h4><?php echo isset($_POST['deleted']) ?  'Odstranenie' : 'Pridanie' ?> bolo úspešné !</h4>
                <span>X</span>
            </div>
        <?php elseif ($_SESSION['FormRequest'] == 0) : ?>
            <div id="msg-request" class="col-12 alert alert-danger fixed-top" role="alert">
                <h4><?php echo $_SESSION["FormRequestMsg"] ?></h4>
                <span>X</span>
            </div>
        <?php endif; ?>

        <div class="add-new-city">
            <form id='add-form' method="Post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div id="spinner" class="hidden">
                    <div class="spinner-border text-success" role="status">
                    </div>
                </div>
                <label for="exampleFormControlInput1" class="form-label">Pridať mesto alebo obec</label>
                <input class="form-control form-control-lg" name="inputCity" type="text" placeholder="mesto" aria-label=".form-control-lg example">
                <select id="select-city" class="form-select form-select-lg" name="selectCity" aria-label=".form-select-lg example">
                    <option selected>vyberte mesto</option>
                    <?php foreach ($cityList as $value) : ?>
                        <option value="<?= $value['city'] ?>"><?= $value['city'] ?></option>
                    <?php endforeach; ?>
                </select>
                <div>
                    <a class="select-city-a">Populárne mestá</a>
                    <button type="submit" class="btn add-city-btn btn-primary">Pridať</button>
                </div>
            </form>
            <nav class="current-list-city">
                <span>Aktuálny zoznam </span>
                <ul>
                    <?php foreach ($city as $value) : ?>
                        <li><a href="#<?= $value->city ?>-<?= $value->id ?>"><?= $value->city ?></a>
                            <form id='del-form' class="del-city-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                <input type="hidden" name="deleted" value="<?= $value->id ?>">
                                <button class="btn-del" type="submit">X</button>
                            </form>
                        </li>

                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
        <div class="container">
            <ul class="list-city-weather">
                <?php if (count($city) > 0) : foreach ($city as $value) : ?>
                        <li id="<?= $value->city ?>-<?= $value->id ?>">
                            <div class="card" style="width: auto;">
                                <h1><?= $value->city ?></h1>
                                <?php foreach ($value->current_weather as $current) : ?>
                                    <img width="100" height="100" src="https://openweathermap.org/img/wn/<?= $current->weather[0]->icon ?>@2x.png" class="img-thumbnail" alt="<?= $current->weather[0]->description ?>">
                                    <div class="card-body">
                                        <h2><strong><?= intval($current->main->temp) ?>°C</strong></h2>
                                        <h2><strong><?= $current->weather[0]->description ?></strong></h2>
                                        <h4>Pocitovo:&nbsp;&nbsp;<?= intval($current->main->feels_like) ?>°C</h4>
                                        <h4>Mraky:&nbsp;&nbsp;<?= $current->clouds->all ?>%</h4>
                                        <h4>Vlhkosť:&nbsp;&nbsp;<?= $current->main->humidity ?>%</h4>
                                        <h4>Rýchlosť Vetra:&nbsp;&nbsp;<?= $current->wind->speed ?>m/s</h4>
                                        <h6><?= date("d.m.Y") ?></h6>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </li>
                    <?php endforeach; ?>
                <?php else : ?>
                    <li>
                        Zoznam miest prázdny
                    </li>
                <?php endif; ?>
            </ul>
        </div>


    </main>
</body>
<script src="<?= asset('/js/jquery-3.6.0.min.js') ?>"></script>
<script src="<?= asset('/js/app.js') ?>"></script>


</html>