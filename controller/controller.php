<?php
require_once 'ConnectionLoader.php';
$from = 'Bassersdorf';
$to = 'Zurich';

if (isset($_POST['from'])) {
	$from = $_POST['from'];
}

if (isset($_GET['to'])) {
	$to = $_GET['to'];
}

$params = array (
		0 => $from,
		1 => $to,
		2 => 6
);

$connectionLoader = new ConnectionLoader();
var_dump($connectionLoader->getJSONStream($params));
?>