<?php

/*******************************************
* SET UP MASHAPE API CALL
*******************************************/

// Avoid wasting CPU or API calls
if (!isset($_POST['start_location']) || !isset($_POST['end_location'])) {
	$abort = true;
}

// Fire away when ready
if (!$abort){
	require_once("mashape/GoogleMapsDrivingDirections.php");
	$client = new GoogleMapsDrivingDirections('PUBSooO7c4$yX_owkYcsn8CDCV_enfz2');
	$response = $client->directions($_POST['start_location'], $_POST['end_location']);
	$directions = $response->body;
	
	// Set this for our view
	if ($directions->error) {
		$abort = true;
	}
}

// Output view
include('view.php');