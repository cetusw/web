<?php
$method = $_SERVER['REQUEST_METHOD'];
echo $method;

function saveFile(string $file, string $data): void {
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

function saveImage(string $imageBase64): void {
	$imageBase64Array = explode(';base64,', $imageBase64);
	$imgExtension = str_replace('data:image/', '', $imageBase64Array[0]);
	$imageDecoded = base64_decode($imageBase64Array[1]);
	saveFile("./src/images/cat.jpeg.$imgExtension", $imageDecoded);
}

$dataAsJson = file_get_contents("php://input");
$dataAsArray = json_decode($dataAsJson, true);
saveImage($dataAsArray['image']);


?>