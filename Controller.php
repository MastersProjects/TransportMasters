<?php
require_once 'controller/ConnectionLoader.php';

/**
 * Controller class manages the connection between View and Model
 * @author Chiramed Phong Penglerd, Luca Marti, Elia Perenzin
 * @version 1.0
 * TransportMasters 2015
 */
class Controller{
	
	public function getConnections($params){
		$connectionLoader = new ConnectionLoader();
		$connections = $connectionLoader->getJSONStream($params);
		return $connections;
	}
}


?>
