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
			
		 if ($data->from) {
        	$from = $data->from->name;
        	$connection->setFrom($from);
        	
   		 }else if ($data->to) {
   		 	$to = $data->to->name;
   		 	$connection->setTo($to);
   		 	
   		 }
   		 
   		 echo "$from <br>";
   		 echo $to;
		


		return $data;
	}
}