<?php
$posts = [
  [
    'title' => 'Still Standing Tall',
    'subtitle' => 'Life begins at the end of your comfort zone.',
    'img_back' => 'static/images/01.jpg',
    'img_author' => 'static/images/william.svg',
    'author' => 'William Wong',
    'date' => '9/25/2015'
  ],
  [
    'title' => 'Sunny Side Up',
    'subtitle' => 'No place is ever as bad as they tell you it’s going to be.',
    'img_back' => 'static/images/02.jpg',
    'img_author' => 'static/images/mat.svg',
    'author' => 'Mat Vogels',
    'date' => '9/25/2015'
  ],
  [
    'title' => 'Water Falls',
    'subtitle' => 'We travel not to escape life, but for life not to escape us.',
    'img_back' => 'static/images/03.jpg',
    'img_author' => 'static/images/mat.svg',
    'author' => 'Mat Vogels',
    'date' => '9/25/2015'
  ],
  [
    'title' => 'Through the Mist',
    'subtitle' => 'Travel makes you see what a tiny place you occupy in the world.',
    'img_back' => 'static/images/04.jpg',
    'img_author' => 'static/images/william.svg',
    'author' => 'William Wong',
    'date' => '9/25/2015'
  ],
  [
    'title' => 'Awaken Early',
    'subtitle' => 'Not all those who wander are lost.',
    'img_back' => 'static/images/05.jpg',
    'img_author' => 'static/images/mat.svg',
    'author' => 'Mat Vogels',
    'date' => '9/25/2015'
  ],
  [
    'title' => 'Try it Always',
    'subtitle' => 'The world is a book, and those who do not travel read only one page.',
    'img_back' => 'static/images/06.jpg',
    'img_author' => 'static/images/mat.svg',
    'author' => 'Mat Vogels',
    'date' => '9/25/2015'
  ],
];
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Blog</title>
  <link rel="stylesheet" href="static/styles/blog-style.css">
  <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
</head>
<body>
<header class="header-block">
  <div class="navigation container">
    <img class="navigation__logo" src="static/images/escape-white.svg" alt="Error">
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
  <div class="header__title">
    <h1>Let's do it together.</h1>
    <h2>We travel the world in search of stories. Come along for the ride.</h2>
    <button class="header__latest">View Latest Posts</button>
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
        <div class="first-post">
          <h3 class="featured__title">The Road Ahead</h3>
          <h4 class="featured__subtitle">The road ahead might be paved - it might not be.</h4>
          <div class="first-post__bottom-bar">
            <img class="first-post__avatar" src="static/images/mat.svg" alt="Error">
            <span class="first-post__name">Mat Vogels</span>
            <span class="first-post__date">September 25, 2015</span>
          </div>
        </div>
        <div class="second-post">
          <div class="second-post__type">ADVENTURE</div>
          <h3 class="featured__title">From Top Down</h3>
          <h4 class="featured__subtitle">Once a year, go someplace you’ve never been before.</h4>
          <div class="second-post__bottom-bar">
            <img class="second-post__avatar" src="static/images/william.svg" alt="Error">
            <span class="second-post__name">William Wong</span>
            <span class="second-post__date">September 25, 2015</span>
          </div>
        </div>
      </div>
    </div>
    <div class="posts__recent container">
      <h5 class="posts__title">Most Recent</h5>
      <div class="posts__divider"></div>
      <div class="posts__blocks">
        <?php
        foreach ($posts as $post) {
          include 'post_preview.php';
        }
        ?>
      </div>
    </div>
  </div>
</main>
<footer class="footer-block">
  <div class="navigation__footer container">
    <img class="footer__logo" src="static/images/escape-white.svg" alt="Error">
    <ul class="footer__list">
      <li class="footer__item">
        <a class="footer__link">HOME</a>
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