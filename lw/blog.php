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

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Blog</title>
  <link rel="stylesheet" href="src/styles/blog-style.css">
  <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
</head>
<body>
<header class="header-block">
  <div class="navigation container">
    <a href="/home"><img class="navigation__logo" src="src/images/escape-white.svg" alt="Error"></a>
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
  <div class="header-block__title">
    <h1>Let's do it together.</h1>
    <h2>We travel the world in search of stories. Come along for the ride.</h2>
    <button class="header-block__latest">View Latest Posts</button>
  </div>
</header>
<main>
  <ul class="menu__list container">
    <li class="menu__item">
      <a class="menu__link">Nature</a>
    </li>
    <li class="menu__item">
      <a class="menu__link">Photography</a>
    </li>
    <li class="menu__item">
      <a class="menu__link">Relaxation</a>
    </li>
    <li class="menu__item">
      <a class="menu__link">Vocation</a>
    </li>
    <li class="menu__item">
      <a class="menu__link">Travel</a>
    </li>
    <li class="menu__item">
      <a class="menu__link">Adventure</a>
    </li>
  </ul>
  <div class="posts">
    <div class="posts__featured container">
      <h2 class="posts__title">Featured Posts</h2>
      <div class="posts__divider"></div>
      <div class="posts__blocks">
	      <?php
          foreach ($posts as $post) {
              if ($post['featured'] == 1) {
                  include 'posts_featured.php';
              }
          }
	      ?>
      </div>
    </div>
    <div class="posts__recent container">
      <h5 class="posts__title">Most Recent</h5>
      <div class="posts__divider"></div>
      <div class="posts__blocks">
	      <?php
	      foreach ($posts as $post) {
		      if ($post['featured'] == 0) {
			      include 'posts_recent.php';
		      }
	      }
	      ?>
      </div>
    </div>
  </div>
</main>
<footer class="footer-block">
  <div class="navigation__footer-block container">
    <a href="/home"><img class="footer-block__logo" src="src/images/escape-white.svg" alt="Error"></a>
    <ul class="footer-block__list">
      <li class="footer-block__item">
        <a class="footer-block__link" href="/home">HOME</a>
      </li>
      <li class="footer-block__item">
        <a class="footer-block__link">CATEGORIES</a>
      </li>
      <li class="footer-block__item">
        <a class="footer-block__link">ABOUT</a>
      </li>
      <li class="footer-block__item">
        <a class="footer-block__link">CONTACT</a>
      </li>
    </ul>
  </div>
</footer>

</body>
</html>