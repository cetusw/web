<?php

require_once 'ConnectionProvider.php';

function saveFile(string $file, string $data): void
{
	$myFile = fopen($file, 'w');
	if ($myFile) {
		$result = fwrite($myFile, $data);
		if ($result) {
			echo 'Данные успешно сохранены в файл ';
		} else {
			echo 'Произошла ошибка при сохранении данных в файл ';
		}
		fclose($myFile);
	} else {
		echo 'Произошла ошибка при открытии файла ';
	}
}

function saveImage(string $imageBase64, $fileName): string
{
	$imageBase64Array = explode(';base64,', $imageBase64);
	$imgExtension = str_replace('data:image/', '', $imageBase64Array[0]);
	$imageDecoded = base64_decode($imageBase64Array[1]);
	$imagePath = "/src/images/{$fileName}.{$imgExtension}";
	saveFile(__DIR__ . $imagePath, $imageDecoded);
	return $imagePath;
}

function savePostToDatabase(mysqli $conn, $data): bool
{
	$imageName = strtolower(str_replace(' ', '-', $data['title']));
	$imageUrl = saveImage($data['image_url'], $imageName);
	$imageName = strtolower(str_replace(' ', '-', $data['author']));
	$authorUrl = saveImage($data['author_url'], $imageName);
	$data['publish_date'] = strtotime($data['publish_date']);
	$sql = "INSERT INTO post (title, subtitle, content, author, author_url, publish_date, image_url, featured, adventure)
				VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
	$stmt = $conn->prepare($sql);

	if ($stmt) {
		$stmt->bind_param('sssssssii', $data['title'], $data['subtitle'], $data['content'], $data['author'], $authorUrl, $data['publish_date'], $imageUrl, $data['featured'], $data['adventure']);
		if ($stmt->execute()) {
			return true;
		} else {
			echo 'SQL injection!';
			return false;
		}
	}
	echo 'SQL injection!';
	return false;
}

function dataIsCorrect($data): bool
{
	foreach ($data as $key => $value) {
		switch ($key) {
			case 'title':
			case 'subtitle':
			case 'content':
			case 'author':
			case 'publish_date':
				if ((!preg_match(pattern: '~^[a-zA-Z0-9 .,!@#$%^&*():;{}<>/+=_-]+$~', subject: $value)) || (gettype($value) !== 'string')) {
					echo 'Введён неправильный ' . $key;
				  return false;
			  }
				break;
			case 'featured':
			case 'adventure':
				if ((!preg_match(pattern: '~^[0-1]+$~', subject: $value)) || (gettype($value) !== 'integer')) {
					echo 'Введён неправильный ' . $key;
					return false;
				}
				break;
		}
	}
	return true;
}

$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'POST') {
	$connection = createDBConnection();
	$dataAsJson = file_get_contents('php://input');
	$dataAsArray = json_decode($dataAsJson, true);
	if (dataIsCorrect($dataAsArray)) {
		savePostToDatabase($connection, $dataAsArray);
	}
	closeDBConnection($connection);
} else {
	echo 'Метод не POST';
}
