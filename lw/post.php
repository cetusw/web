<?php
const HOST = 'localhost';
const USERNAME = 'yogurt';
const PASSWORD = 'pAssw0rd#';
const DATABASE = 'blog';

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

function getPost(mysqli $conn): mysqli_result {
	$sql = "SELECT * FROM post";
	return $conn->query($sql);
}

$connection = createDBConnection();
$posts = getPost($connection);

closeDBConnection($connection);

$postId = $_GET['id'];
foreach ($posts as $post) {
    if ($postId == $post['id']) {
        $title = $post['title'];
	    $subtitle = $post['subtitle'];
	    $image_url = $post['image_url'];
	    $content = $post['content'];
	    $postExist = true;
        break;
    } else {
	    $title = "No such post exists :(";
        $postExist = false;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $title ?></title>
  <link rel="stylesheet" href="src/styles/post-style.css">
  <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
</head>
<body>
<header class="top-bar container">
  <a href="/home"><img class="navigation__logo" src="src/images/escape.svg" alt="Error"></a>
  <div class="navigation">
    <ul class="navigation__list">
      <li class="navigation__item">
        <a class="navigation__link" href="/home">HOME</a>
      </li>
      <li class="navigation__item">
        <a class="navigation__link">CATEGORIES</a>
      </li>
      <li class="navigation__item">
        <a class="navigation__link">ABOUT</a>
      </li>
      <li class="navigation__item">
        <a class="navigation__link">CONTACT</a>
      </li>
    </ul>
  </div>
</header>
<main>
  <div class="head-article">
    <h1><?= $title ?></h1>
    <h2><?= $subtitle ?></h2>
  </div>
  <?php
  if ($postExist) {
  ?>
  <img class="sky" src="<?= $image_url ?>" alt="Error">
  <?php
  }
  ?>
  <div class="text container">
    <p><?= $content ?></p>
  </div>
</main>
<footer class="footer-block">
  <div class="container">
    <img class="footer__logo" src="src/images/escape-white.svg" alt="Error">
  </div>
  <div class="navigation__footer container">
    <ul class="footer__list">
      <li class="footer__item">
        <a class="footer__link" href="/home">HOME</a>
      </li>
      <li class="footer__item">
        <a class="footer__link">CATEGORIES</a>
      </li>
      <li class="footer__item">
        <a class="footer__link">ABOUT</a>
      </li>
      <li class="footer__item">
        <a class="footer__link">CONTACT</a>
      </li>
    </ul>
  </div>
</footer>
</body>
</html>