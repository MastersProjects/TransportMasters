<?php
/**
 * ToDo
 * @author Chiramed Phong Penglerd, Luca Marti, Elia Perenzin
 * @version 1.0
 * TransportMasters 2015
 */
include_once('../model/Connection.php');

Class JSONParser{
	
	public function getConnection($jsonString) {
		$connection = new Connection();
		$data = json_decode($jsonString);
		
		/*
		 * Parse parse parse...
		 */
		return $data;
	}
}