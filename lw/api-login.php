<?php

require_once 'ConnectionProvider.php';

function findUser($data, mysqli $conn): int
{
	$sql = "SELECT user_id FROM user WHERE email = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('s', $data['email']);
	$stmt->execute();
	$result = $stmt->get_result();
	if ($result->num_rows === 0) {
		return 0;
	}
	$row = $result->fetch_assoc();
	return $row['user_id'];
}

function checkPassword($userId, $data, mysqli $conn): bool
{
	$salt = 'MyPass';
  $sql = "SELECT password FROM user WHERE user_id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('s', $userId);
  $stmt->execute();
  $result = $stmt->get_result();
	$row = $result->fetch_assoc();
  if (md5(md5($data['password']) . $salt) === $row['password']) {
		return true;
	}
	return false;
}

$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'POST') {
	$connection = createDBConnection();
	$dataAsJson = file_get_contents('php://input');
	$dataAsArray = json_decode($dataAsJson, true);
  echo $dataAsJson;
	$userId = findUser($dataAsArray, $connection);
	if (checkPassword($userId, $dataAsArray, $connection)) {
		http_response_code(200);
	} else {
		http_response_code(401);;
	}

	closeDBConnection($connection);
} else {
	echo 'Метод не POST';
}