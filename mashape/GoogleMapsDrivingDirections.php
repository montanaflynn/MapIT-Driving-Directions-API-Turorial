<?php
require_once("MashapeClient.php");


class GoogleMapsDrivingDirections {
	const PUBLIC_DNS = "montanaflynn-mapit.p.mashape.com";
	private $authHandlers;

	function __construct($mashapeKey) {
		$this->authHandlers = array();
		$this->authHandlers[] = new MashapeAuthentication($mashapeKey);
		
	}
	public function directions($starting, $ending) {
		$parameters = array(
				"starting" => $starting,
				"ending" => $ending );

		$response = HttpClient::doRequest(
				HttpMethod::GET,
				"https://" . self::PUBLIC_DNS . "/directions",
				$parameters,
				$this->authHandlers,
				ContentType::FORM,
				true);
		return $response;
	}
	

	
}
?>