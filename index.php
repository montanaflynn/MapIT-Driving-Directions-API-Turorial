<?php

/*******************************************
* MapIT Driving Directions WebApp
* by http://montanaflynn.me/
*******************************************/

// Avoid wasting CPU or API calls if don't have any requests
if (!isset($_POST['start_location']) || !isset($_POST['end_location'])) {
	$abort = true;
}

// Fire away when ready
if (!$abort){
	
	// Require google maps driving directions mashape library
	// https://www.mashape.com/montanaflynn/google-maps-driving-directions
	require_once("mashape/GoogleMapsDrivingDirections.php");
	
	// Instantiate API client with your API key
	$client = new GoogleMapsDrivingDirections('APIKEY');
	
	// Get response from API from the directions endpoint
	// sending the start and end location as parameters
	$response = $client->directions($_POST['start_location'], $_POST['end_location']);
	$directions = $response->body;
	
	// Setting this for our view so we know what to show
	if ($directions->error) {
		$abort = true;
	}
}

// Output our view file which contains the html and form
include('view.php');

