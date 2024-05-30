<?php

require_once 'ConnectionProvider.php';

function findUser($email, mysqli $conn): bool
{
	$sql = "SELECT password FROM user WHERE email = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('s', $email);
	$stmt->execute();
	$result = $stmt->get_result();
	if ($result->num_rows === 0) {
		return false;
	}
	return true;
}

$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'POST') {
	$connection = createDBConnection();
	$dataAsJson = file_get_contents('php://input');
	$dataAsArray = json_decode($dataAsJson, true);
	echo $dataAsJson;
	$user_found = findUser($dataAsArray['email'], $connection);

	if ($user_found) {
		echo 'User found';
	} else {
		echo 'User not found or error during query execution';
	}
	closeDBConnection($connection);
} else {
	echo 'Метод не POST';
}