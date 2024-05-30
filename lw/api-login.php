<?php

require_once 'ConnectionProvider.php';

$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'POST') {
	$connection = createDBConnection();
	$dataAsJson = file_get_contents('php://input');
	$dataAsArray = json_decode($dataAsJson, true);
	echo $dataAsJson;
	closeDBConnection($connection);
} else {
	echo 'Метод не POST';
}