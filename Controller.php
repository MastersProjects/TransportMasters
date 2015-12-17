<?php
require_once 'controller/ConnectionLoader.php';

class Controller{
	
	public function getConnections($params){
		$connectionLoader = new ConnectionLoader();
		$connections = $connectionLoader->getJSONStream($params);
		return $connections;
	}
}


?>
