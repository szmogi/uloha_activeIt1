<?php

require_once 'config.php';


	// Converts a date to a timestamp.
	function time_form($data)
	{
		// Returns the timestamp of a date.
		$data = strtotime($data);
		$data = str_replace(' ', '&nbsp;', date('j M Y, G:i', $data));


		return $data;
	}


	// Converts a date to Y - M - d.
	function date_time($date)
	{
		$date = strtotime($date);
		$date = date('Y-m-d', $date);
	}



	function weather($city){

	    $apiKey = "582f8b5196639297276ce37c848752b7";

		$weatherApiUrl = "https://api.openweathermap.org/data/2.5/weather?q=" . $city . "&units=metric&lang=sk&appid=" . $apiKey;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $weatherApiUrl);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_VERBOSE, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$response = curl_exec($ch);
		curl_close($ch);

		return $data = json_decode($response);
               
	}







    




			
	

