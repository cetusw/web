<?php
$post_date = mktime(1, 0, 0, 9, 25, 2015);
$posts_featured = [
  [
    'id' => 1,
    'title' => 'The Road Ahead',
    'subtitle' => 'The road ahead might be paved - it might not be.',
    'img_back' => 'src/images/sky-small.jpg',
    'img_author' => 'src/images/mat.svg',
    'author' => 'Mat Vogels',
    'date' => $post_date,
    'adventure' => false
  ],
  [
    'id' => 2,
    'title' => 'From Top Down',
    'subtitle' => 'Once a year, go someplace you’ve never been before.',
    'img_back' => 'src/images/lamp.jpg',
    'img_author' => 'src/images/william.svg',
    'author' => 'William Wong',
    'date' => $post_date,
	'adventure' => true
  ]
];
$posts_recent = [
  [
    'id' => 3,
    'title' => 'Still Standing Tall',
    'subtitle' => 'Life begins at the end of your comfort zone.',
    'img_back' => 'src/images/01.jpg',
    'img_author' => 'src/images/william.svg',
    'author' => 'William Wong',
    'date' => $post_date
  ],
  [
    'id' => 4,
    'title' => 'Sunny Side Up',
    'subtitle' => 'No place is ever as bad as they tell you it’s going to be.',
    'img_back' => 'src/images/02.jpg',
    'img_author' => 'src/images/mat.svg',
    'author' => 'Mat Vogels',
    'date' => $post_date
  ],
  [
    'id' => 5,
    'title' => 'Water Falls',
    'subtitle' => 'We travel not to escape life, but for life not to escape us.',
    'img_back' => 'src/images/03.jpg',
    'img_author' => 'src/images/mat.svg',
    'author' => 'Mat Vogels',
    'date' => $post_date
  ],
  [
    'id' => 6,
    'title' => 'Through the Mist',
    'subtitle' => 'Travel makes you see what a tiny place you occupy in the world.',
    'img_back' => 'src/images/04.jpg',
    'img_author' => 'src/images/william.svg',
    'author' => 'William Wong',
    'date' => $post_date
  ],
  [
    'id' => 7,
    'title' => 'Awaken Early',
    'subtitle' => 'Not all those who wander are lost.',
    'img_back' => 'src/images/05.jpg',
    'img_author' => 'src/images/mat.svg',
    'author' => 'Mat Vogels',
    'date' => $post_date
  ],
  [
    'id' => 8,
    'title' => 'Try it Always',
    'subtitle' => 'The world is a book, and those who do not travel read only one page.',
    'img_back' => 'src/images/06.jpg',
    'img_author' => 'src/images/mat.svg',
    'author' => 'Mat Vogels',
    'date' => $post_date
  ]
];
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
    <img class="navigation__logo" src="src/images/escape-white.svg" alt="Error">
    <ul class="navigation__list">
      <li class="navigation__item">
        <a class="navigation__link">HOME</a>
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
        foreach ($posts_featured as $post_featured) {
          include 'posts_featured.php';
        }
        ?>
      </div>
    </div>
    <div class="posts__recent container">
      <h5 class="posts__title">Most Recent</h5>
      <div class="posts__divider"></div>
      <div class="posts__blocks">
        <?php
        foreach ($posts_recent as $post_recent) {
          include 'posts_recent.php';
        }
        ?>
      </div>
    </div>
  </div>
</main>
<footer class="footer-block">
  <div class="navigation__footer-block container">
    <img class="footer-block__logo" src="src/images/escape-white.svg" alt="Error">
    <ul class="footer-block__list">
      <li class="footer-block__item">
        <a class="footer-block__link">HOME</a>
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