<?php


require "function.php";
require "functions-general.php";

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

// constants & settings
define('BASE_URL', 'http://localhost/uloha_activeIt/');
define('APP_PATH', realpath(__DIR__ . '/../'));

$servername = "localhost";
$username = "root";
$password = "root";

try {
	$db = new PDO("mysql:host=$servername;dbname=ulohaactiveit1", $username, $password);
	// set the PDO error mode to exception
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

