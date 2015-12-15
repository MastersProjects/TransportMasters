<?php
require_once 'controller/ConnectionLoader.php';
$from = 'Bassersdorf';
$to = 'Zurich';

if (isset($_GET['from'])) {
	$from = $_GET['from'];
}

if (isset($_GET['to'])) {
	$to = $_GET['to'];
}

$params = array (
		0 => $from,
		1 => $to,
		2 => 6 
);

// $url = 'http://transport.opendata.ch/v1/connections?from=' . $params[0] . '&to=' . $params[1] . '&limit=' . $params[2];
// echo $url;

// // $json = json_decode(file_get_contents($url));
// $json = file_get_contents($url);
// var_dump($json);
$connectionLoader = new ConnectionLoader();
$connectionLoader->getJSONStream($params);
// var_dump($connectionLoader->getJSONStream($params));
