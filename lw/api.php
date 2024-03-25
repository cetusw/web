<?php

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
	$data = file_get_contents('php://input');
	$imageData = json_decode($data, true);

	if ($imageData && isset($imageData['image'])) {
		$imageBase64 = $imageData['image'];
		$image = base64_decode($imageBase64);

		$fileName = '/src/images/image_' . uniqid() . '.jpg';
		file_put_contents($fileName, $image);

		echo "Image saved successfully as: $fileName";
	} else {
		echo "Invalid JSON data or missing 'image' key";
	}
} else {
	echo "Only POST requests are allowed";
}
