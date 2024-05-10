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
  <form class="main-information__form">
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
          <div class="main-information__inputs">
            <label>Title<br><input id="title-input" name="title" type="text" placeholder="New Post" maxlength="30" required></label>
            <label>Short description<br><input id="description-input" name="description" type="text" placeholder="Please, enter any description" maxlength="30" required></label>
            <label>Author name<br><input id="author-input" name="author-name" type="text" maxlength="30" required></label>
            <label>
              Author Photo<br>
              <input id="author-image-input" name="author-image" type="file" required>
              <div class="main-information__author-image-upload">
                <img class="main-information__author-image" src="static/images/placeholder-image-round.svg" id="author-image" alt="Photo">
                <button type="button" class="main-information__upload-new-avatar" id="upload-new-avatar" hidden>
                  <img src="static/images/camera.svg" alt="camera">
                  <span>Upload New</span>
                </button>
                <button type="button" class="main-information__remove-avatar" id="remove-avatar" hidden>
                  <img src="static/images/trash-red.svg" alt="camera">
                  <span>Remove</span>
                </button>
                <span class="main-information__author-image-upload-text" id="upload">Upload</span>
              </div>
            </label>
            <label>Publish Date<br><input id="date-input" name="publish-date" type="date" required></label>
            <label class="main-information__hero-image">
              <span>Hero Image</span><br>
              <img class="main-information__hero-image-10mb" src="static/images/placeholder-image-rectangle-10mb.svg" id="hero-image-10mb" alt="Photo">
              <input id="image10mb-input" name="hero-image" type="file" required><br>
              <button type="button" class="main-information__upload-new-article" id="upload-new-article" hidden>
                <img src="static/images/camera.svg" alt="camera">
                <span>Upload New</span>
              </button>
              <button type="button" class="main-information__remove-article" id="remove-article" hidden>
                <img src="static/images/trash-red.svg" alt="camera">
                <span>Remove</span>
              </button>
              <span class="main-information__format" id="size">Size up to 10mb. Format: png, jpeg, gif.</span>
            </label>
            <label>
              <span>Hero Image</span><br>
              <img class="main-information__hero-image-5mb" src="static/images/placeholder-image-rectangle-5mb.svg" id="hero-image-5mb" alt="Photo">
              <input id="image5mb-input" name="hero-image-small" type="file" required><br>
              <span class="main-information__ps">Size up to 5mb. Format: png, jpeg, gif.</span>
            </label>
          </div>
          <div class="main-information__preview">
            <p class="main-information__preview-title">Article preview</p>
            <div class="main-information__article-outer">
              <div class="main-information__article-inner">
                <div class="main-information__article-header">
                  <div class="main-information__bullet"></div>
                  <div class="main-information__bullet"></div>
                  <div class="main-information__bullet"></div>
                </div>
                <p class="main-information__article-title" id="article-preview-title">New Post</p>
                <p class="main-information__article-description" id="article-preview-description">Please, enter any description</p>
                <img class="main-information__article-image-preview" src="static/images/article-preview.svg" id="article-image-preview" alt="Article preview">
              </div>
            </div>
            <p class="main-information__preview-title">Post card preview</p>
            <div class="main-information__post-card-preview">
              <div class="main-information__post">
                <img class="main-information__card-image-preview" src="static/images/post-card-preview.svg" id="card-image-preview" alt="Author Image">
                <div class="main-information__post-header">
                  <p class="main-information__post-title" id="post-preview-title">New Post</p>
                  <p class="main-information__post-description" id="post-preview-description">Please, enter any description</p>
                </div>
                <div class="main-information__post-footer">
                  <img src="static/images/author-image-preview.svg" id="author-image-preview" alt="Author Image">
                  <span class="main-information__author-name" id="post-preview-author">Enter author name</span>
                  <span class="main-information__publish-date" id="post-preview-date">00/00/0000</span>
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
  </form>
</main>

<footer class="footer-block">
</footer>
<script src="src/js/admin.js" type="application/javascript"></script>
</body>
</html>
