<?php
/**
 * ToDo
 * @author Chiramed Phong Penglerd, Luca Marti, Elia Perenzin
 * @version 1.0
 * TransportMasters 2015
 */
Class JSONParser{
	
	public function getConnection($jsonString) {
		
		$data = json_decode($jsonString);
		/*
		 * Pars pars pars...
		 */
		return $data;
	}
}