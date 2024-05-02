<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<link rel="stylesheet" href="static/styles/admin-style.css">
	<link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
</head>
<body>

<header class="header-block">
  <div class="header-block__content container">
    <a href="/admin"><img class="header-block__logo" src="static/images/escape-author.svg" alt="Logo"></a>
    <div class="header-block__account">
      <div class="header-block__author-image">N</div>
      <a href="/home"><img class="header-block__logout-icon" src="static/images/log-out.svg" alt="Logout icon"></a>
    </div>
  </div>
</header>

<main>
  <div class="post-title container">
    <div class="post-title__text">
      <h1>New Post</h1>
      <p>Fill out the form bellow and publish your article</p>
    </div>
    <div class="post-title__button">
      <button id="button" class="publish">Publish</button>
    </div>
  </div>
  <div class="main-information container">
    <h2>Main Information</h2>
    <div class="main-information__content">
      <form class="main-information__form">
        <label>Title<br><input id="input" name="title" type="text" placeholder="New Post" maxlength="30"></label>
        <label>Short description<br><input id="input" name="description" type="text" placeholder="Please, enter any description" maxlength="30"></label>
        <label>Author name<br><input id="input" name="author-name" type="text" maxlength="30"></label>
        <label>
          Author Photo<br>
          <div class="main-information__author-image-upload">
            <img class="main-information__author-image" src="static/images/placeholder-image-round.svg" alt="Photo">
            <input id="input" name="author-image" type="file">
            <span>Upload</span>
          </div>
        </label>
        <label>Publish Date<br><input id="input" name="publish-date" type="date" /></label>
        <label class="main-information__hero-image">
          <span>Hero Image</span><br>
          <img class="main-information__hero-image-10mb" src="static/images/placeholder-image-rectangle-10mb.svg" alt="Photo">
          <input id="input" name="hero-image" type="file"/><br>
          <span class="main-information__ps">Size up to 10mb. Format: png, jpeg, gif.</span>
        </label>
        <label>
          <span>Hero Image</span><br>
          <img class="main-information__hero-image-5mb" src="static/images/placeholder-image-rectangle-5mb.svg" alt="Photo">
          <input id="input" name="hero-image-small" type="file"/><br>
          <span class="main-information__ps">Size up to 5mb. Format: png, jpeg, gif.</span>
        </label>
      </form>
      <div class="main-information__preview">
        <p class="main-information__preview-title">Article preview</p>
        <div class="main-information__article-outer">
          <div class="main-information__article-inner">
            <div class="main-information__article-header">
              <div class="main-information__bullet"></div>
              <div class="main-information__bullet"></div>
              <div class="main-information__bullet"></div>
            </div>
            <p class="main-information__article-title">New Post</p>
            <p class="main-information__article-subtitle">Please, enter any description</p>
            <img src="static/images/article-preview.svg" alt="Article preview">
          </div>
        </div>
        <p class="main-information__preview-title">Post card preview</p>
        <div class="main-information__post-card-preview">
          <div class="main-information__post">
            <img class="main-information__author-image-preview" src="static/images/post-card-preview.svg" alt="Author Image">
            <div class="main-information__post-header">
              <p class="main-information__post-title">New Post</p>
              <p class="main-information__post-subtitle">Please, enter any description</p>
            </div>
            <div class="main-information__post-footer">
              <img src="static/images/author-image-preview.svg" alt="Author Image">
              <span class="main-information__author-name">Enter author name</span>
              <span class="main-information__publish-date">4/19/2023</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="content container">
    <p>Content</p>
    <label>Post content (plain text)<br><textarea class="content__textarea" name="post-content" placeholder="Type anything you want ..."></textarea></label>
  </div>
</main>

<footer class="footer-block">
</footer>
<script src="src/js/admin.js" type="application/javascript"></script>
</body>
</html>
