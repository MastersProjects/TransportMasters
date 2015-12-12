<?php
/**
 * ToDo
 * @author Chiramed Phong Penglerd, Luca Marti, Elia Perenzin
 * @version 1.0
 * TransportMasters 2015
 */
require_once 'controller/JSONLoadingTask.php';
require_once 'controller/JSONParser.php';

Class ConnectionLoader extends JSONLoadingTask {
	
	/**
	 * This function loads the JSON from
	 * the given URL. The function returns
	 * a decoded JSON.
	 * @param string $url
	 */
	public function getJSONStream($params){
		$jsonString = file_get_contents($this->createURL($params));
		return $this->onPostExecute($jsonString);
	}
	
	/**
	 * This function is for setting the next step what to do with JsonString
	 * @param String $jsonString
	 */
	public function onPostExecute($jsonString){
		//$this->jsonParser says it can't find but its extended from JSONLoadingTask
		return $this->jsonParser->getConnection($jsonString);
	}
	
	/**
	 * This Function creates the URL for the JSON 
	 * request to transport.opendata.ch
	 * @param arry $params
	 */
	public function createURL($params){
		return 'http://transport.opendata.ch/v1/connections?from=' . $params[0] . '&to=' . $params[1] . '&limit=' . $params[2];
	}
	

}