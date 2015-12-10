<?php

$from = '';
$to = '';

if (isset($_GET['from'])) {
	$from = $_GET['from'];
}

if (isset($_GET['to'])) {
	$to = $_GET['to'];
}

$query = array (
		'from' => $from,
		'to' => $to,
		'limit' => 6 
);

$url = 'http://transport.opendata.ch/v1/connections?' . http_build_query ( $query );
echo $url;

$json = json_decode(file_get_contents($url));
var_dump($json);
