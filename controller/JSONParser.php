<?php
/**
 * ToDo
 * @author Chiramed Phong Penglerd, Luca Marti, Elia Perenzin
 * @version 1.0
 * TransportMasters 2015
 */
require_once ('model/Connection.php');

Class JSONParser{
	public function getConnection($jsonString) {
		$connection = new Connection();
		$data = json_decode($jsonString);
			
		$jsonIterator = new RecursiveIteratorIterator(
				new RecursiveArrayIterator($data),
				RecursiveIteratorIterator::SELF_FIRST);
		
		foreach ($jsonIterator as $key => $value) {
			echo $key;
		}



		return $data;
	}
}