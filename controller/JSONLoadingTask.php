<?php
/**
 * ToDo
 * @author Chiramed Phong Penglerd, Luca Marti, Elia Perenzin
 * @version 1.0
 * TransportMasters 2015
 */
abstract class JSONLoadingTask{
	private $JSONParser;
	
	/**
	 * ToDo
	 * @param unknown_type $ToDo
	 */
	abstract public function onPostExecute($ToDo);
	
	/**
	 * ToDo
	 * @param unknown_type $ToDo
	 */
	abstract public function createURL($ToDo);
	
	/**
	 * ToDo
	 * @param unknown_type $ToDo
	 */
	abstract public function getJSONStream($ToDo);
	
}