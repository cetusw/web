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
      <a href=""><img class="header-block__logout-icon" src="static/images/log-out.svg" alt="Logout icon"></a>
    </div>
  </div>
</header>

<main>
  <div class="post-title container">
    <div class="post-title__text">
      <h1>New Post</h1>
      <h2>Fill out the form bellow and publish your article</h2>
    </div>
    <button id="button" class="publish">Publish</button>
  </div>
  <div class="main-information container">
    <h2>Main Information</h2>
    <div class="main-information__content">
      <form class="main-information__form">
        <label>Title<br><input id="input" name="title" type="text" placeholder="New Post" /></label>
        <label>Short description<br><input id="input" name="description" type="text" placeholder="Please, enter any description" /></label>
        <label>Author name<br><input id="input" name="author-name" type="text" /></label>
        <label>
          Author Photo<br>
          <img class="input" src="static/images/placeholder-image-round.svg" alt="Photo">
          <div class="input">
            <input id="input" name="author-image" type="file"/>
            <span class="input">Upload</span>
        </div>
        </label>
        <label>Publish Date<br><input id="input" name="publish-date" type="date" /></label>
        <label>
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
        <h3>Article preview</h3>
        <div class="main-information__article-outer">
          <div class="main-information__article-inner">
            <div class="main-information__article-header">
              <div class="main-information__bullet"></div>
              <div class="main-information__bullet"></div>
              <div class="main-information__bullet"></div>
            </div>
            <h5>New Post</h5>
            <h6>Please, enter any description</h6>
            <img src="static/images/article-preview.svg">
          </div>
        </div>
        <h4>Post card preview</h4>
        <div class="main-information__post-card-preview">
          <div class="main-information__post-card-outer">

          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<footer class="footer-block">
</footer>
<script src="src/js/admin.js" type="application/javascript"></script>
</body>
</html>
