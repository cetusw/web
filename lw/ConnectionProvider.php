<?php

const HOST = 'localhost';
const USERNAME = 'yogurt';
const PASSWORD = 'pAssw0rd#';
const DATABASE = 'blog';

function createDBConnection(): mysqli {
	$conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
	if ($conn->connect_error) {
		die('Connection failed: ' . $conn->connect_error);
	}
	return $conn;
}

function closeDBConnection(mysqli $conn): void {
	$conn->close();
}