<?php
/**
 * ToDo
 * @author Chiramed Phong Penglerd, Luca Marti, Elia Perenzin
 * @version 1.0
 * TransportMasters 2015
 */
require_once 'JSONLoadingTask.php';

Class JourneyDetails extends JSONLoadingTask {
	
	/**
	 * This function loads the JSON from
	 * the given URL. The function returns
	 * a decoded JSON.
	 * @param string $url
	 */
	public function getJSONStream($url){
		$jsonString = file_get_contents($url);
		onPostExecute($jsonString);
	}
	
	/**
	 * This function is for setting the next step what to do with JsonString
	 * @param String $jsonString
	 */
	public function onPostExecute($jsonString){
		//TODO next step: what to do with this connection object
		$connection = $JSONParser.getConnection($jsonString);
	}
	
	/**
	 * This Function creates the URL for the JSON 
	 * request to transport.opendata.ch
	 * @param arry $params
	 */
	public function createURL($params){
		return 'http://transport.opendata.ch/v1/connections?' . http_build_query ( $params[0] );
	}
	

}