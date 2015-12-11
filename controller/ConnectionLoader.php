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
	 * ToDo
	 * @param unknown_type $ToDo
	 */
	public function onPostExecute($ToDo);
	
	/**
	 * This Function creates the URL for the JSON 
	 * request to transport.opendata.ch
	 * @param arry $param
	 */
	public function createURL($param){
		return 'http://transport.opendata.ch/v1/connections?' . http_build_query ( $param );
	}
	
	/**
	 * This function loads the JSON from
	 * the given URL. The function returns 
	 * a decoded JSON.
	 * @param string $url
	 */
	public function getJSONStream($url){
		return json_decode(file_get_contents($url));
	}
}