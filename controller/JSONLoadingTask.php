<?php
/**
 * ToDo
 * @author Chiramed Phong Penglerd, Luca Marti, Elia Perenzin
 * @version 1.0
 * TransportMasters 2015
 */
abstract class JSONLoadingTask{
	
	protected $jsonParser;
	
	public function __construct() {
		 $this->jsonParser = new JSONParser();
	}
			
	/**
	 * This function loads the JSON from
	 * the given URL. The function returns
	 * a decoded JSON.
	 * @param string $url
	 */
	abstract public function getJSONStream($params);
	
	/**
	 * This function is for setting the next step what to do with JsonString
	 * @param String $jsonString
	 */
	abstract public function onPostExecute($jsonString);
	
	/**
	 * This Function creates the URL for the JSON 
	 * request to transport.opendata.ch
	 * @param array $params
	 */
	abstract public function createURL($params);
	

	
}