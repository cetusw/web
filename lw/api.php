<?php
function saveFile(string $file, string $data): void
{
	$myFile = fopen($file, 'w');

	if (!$myFile) {
		echo 'Произошла ошибка при открытии файла';
		return;
	}

	$result = fwrite($myFile, $data);

	if (!$result) {
		echo 'Произошла ошибка при сохранении данных в файл';
		return;
	}

	echo 'Данные успешно сохранены в файл';
	fclose($myFile);
}

function saveImage(string $imageBase64, string $imageName)
{
	$imageBase64Array = explode(';base64,', $imageBase64);
	$imgExtention = str_replace('data:image/', '', $imageBase64Array[0]);
	$imageDecoded = base64_decode($imageBase64Array[1]);
	saveFile(__DIR__ . "\\src\\images\\{$imageName}.{$imgExtention}", $imageDecoded);
}

$method = $_SERVER['REQUEST_METHOD'];
if ($method != "POST") {
	echo 'Неправильный тип запроса';
	exit;
}

$dataAsJson = file_get_contents("php://input");
$dataAsArray = json_decode($dataAsJson, true);
saveImage($dataAsArray['image'], $dataAsArray['name']);
