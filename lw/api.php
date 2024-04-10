<?php

const HOST = 'localhost';
const USERNAME = 'yogurt';
const PASSWORD = 'pAssw0rd#';
const DATABASE = 'blog';

function saveFile(string $file, string $data): void
{
	$myFile = fopen($file, 'w');
	if ($myFile) {
		$result = fwrite($myFile, $data);
		if ($result) {
			echo 'Данные успешно сохранены в файл';
		} else {
			echo 'Произошла ошибка при сохранении данных в файл';
		}
		fclose($myFile);
	} else {
		echo 'Произошла ошибка при открытии файла';
	}
}

function saveImage(string $imageBase64, $fileName): string
{
	$imageBase64Array = explode(';base64,', $imageBase64);
	$imgExtension = str_replace('data:image/', '', $imageBase64Array[0]);
	$imageDecoded = base64_decode($imageBase64Array[1]);
	$imagePath = "/src/images/{$fileName}.{$imgExtension}";
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	saveFile(__DIR__ . $imagePath, $imageDecoded);
	return $imagePath;
}

function createDBConnection(): mysqli {
	$conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	return $conn;
}

function closeDBConnection(mysqli $conn): void {
	$conn->close();
}

function savePostToDatabase(mysqli $conn, $data): bool {
	$imageName = strtolower(str_replace(" ", "-", $data['title']));
	$imageUrl = saveImage($data['image_url'], $imageName);
	$imageName = strtolower(str_replace(" ", "-", $data['author']));
	$authorUrl = saveImage($data['author_url'], $imageName);
	$sql = "INSERT INTO post (title, subtitle, content, author, author_url, publish_date, image_url, featured, adventure)
					VALUES ( 
					        '{$data['title']}',
					        '{$data['subtitle']}',
					        '{$data['content']}',
					        '{$data['author']}',
					        '$authorUrl',
					        '{$data['publish_date']}',
					        '$imageUrl',
					        '{$data['featured']}',
					        '{$data['adventure']}'
					        );";
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	return $conn->query($sql);
}

$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'POST') {
	$connection = createDBConnection();
	$dataAsJson = file_get_contents("php://input");
	$dataAsArray = json_decode($dataAsJson, true);
	savePostToDatabase($connection, $dataAsArray);
	closeDBConnection($connection);
} else {
	echo 'Метод не POST';
}
