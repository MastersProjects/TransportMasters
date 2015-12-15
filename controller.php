<?php
require_once 'controller/ConnectionLoader.php';

if (isset($_POST['from'])) {
	$from = $_POST['from'];
}

if (isset($_POST['to'])) {
	$to = $_POST['to'];
}

if (isset($_POST['date'])) {
	$date = $_POST['date'];
}

if (isset($_POST['time'])) {
	$time = $_POST['time'];
}

$params = array (
		"from" => $from,
		"to" => $to,
		"date" => $date,
		"time" => $time,
		"limit" => 4
);

$connectionLoader = new ConnectionLoader();
//$connectionLoader->getJSONStream($params);
echo $connectionLoader->createURL($params);
?>