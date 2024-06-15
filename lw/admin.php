<?php
  session_name('auth');
  session_start();
  $email = $_SESSION['email'] ?? null;
  $userId = $_SESSION['user_id'] ?? null;

  if ($email === null) {
    http_response_code(401);
    header("Location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<link rel="stylesheet" href="static/styles/admin-style.css">
	<link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

  <script src="static/js/admin.js" type="application/javascript"></script>
</head>
<body>

<header class="header-block">
  <div class="header-block__content container">
    <a href="/admin"><img class="header-block__logo" src="static/images/escape-author.svg" alt="Logo"></a>
    <div class="header-block__account">
      <div class="header-block__author-image" style="background-color: rgba(<?= ($userId * 100) % 255 ?>, <?= ($userId * 200) % 255 ?>, <?= ($userId * 300) % 255 ?>, 1)"><?= strtoupper($email[0]) ?></div>
      <a href="/logout"><img class="header-block__logout-icon" src="static/images/log-out.svg" alt="Logout icon"></a>
    </div>
  </div>
</header>

<main>
  <form class="form container">
    <div class="post-title container">
      <div class="post-title__text">
        <h1>New Post</h1>
        <p>Fill out the form bellow and publish your article</p>
      </div>
      <div class="post-title__button">
        <button id="publish-button" class="post-title__publish" type="submit">Publish</button>
      </div>
    </div>
    <div class="form__all-is-ok" id="form-is-ok" hidden>
      <div class="form__all-is-ok-content">
        <img src="static/images/check-circle.svg" alt="alert-circle">
        <p>Publish Complete!</p>
      </div>
    </div>
    <div class="form__required-fields-empty" id="required-fields-empty" hidden>
      <div class="form__required-fields-empty-content">
        <img src="static/images/alert-circle.svg" alt="alert-circle">
        <p>Whoops! Some fields need your attention :o</p>
      </div>
    </div>
    <div class="main-information">
      <h2>Main Information</h2>
        <div class="main-information__content">
          <div class="main-information__inputs">
            <label>Title<br><input id="title-input" name="title" type="text" maxlength="30" required></label>
            <label>Short description<br><input id="description-input" name="description" type="text" maxlength="30" required></label>
            <label>Author name<br><input id="author-input" name="author-name" type="text" maxlength="30" required></label>
            <label>
              Author Photo<br>
              <input id="author-image-input" name="author-image" type="file" required>
              <div class="main-information__author-image-upload">
                <img class="main-information__author-image" src="static/images/placeholder-image-round.svg" id="author-image" alt="Photo">
                <button type="button" class="main-information__upload-new-avatar" id="upload-new-avatar" hidden>
                  <div class="main-information__upload-new-avatar-content">
                    <img src="static/images/camera.svg" alt="camera">
                    <p>Upload New</p>
                  </div>
                </button>
                <button type="button" class="main-information__remove-avatar" id="remove-avatar" hidden>
                  <div class="main-information__remove-avatar-content">
                    <img src="static/images/trash-red.svg" alt="camera">
                    <p>Remove</p>
                  </div>
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
                <div class="main-information__upload-new-article-content">
                  <img src="static/images/camera.svg" alt="camera">
                  <p>Upload New</p>
                </div>
              </button>
              <button type="button" class="main-information__remove-article" id="remove-article" hidden>
                <div class="main-information__remove-article-content">
                  <img src="static/images/trash-red.svg" alt="camera">
                  <p>Remove</p>
                </div>
              </button>
              <span class="main-information__format" id="size10mb">Size up to 10mb. Format: png, jpeg, gif.</span>
            </label>
            <label>
              <span>Hero Image</span><br>
              <img class="main-information__hero-image-5mb" src="static/images/placeholder-image-rectangle-5mb.svg" id="hero-image-5mb" alt="Photo">
              <input id="image5mb-input" name="hero-image-small" type="file" required><br>
              <button type="button" class="main-information__upload-new-card" id="upload-new-card" hidden>
                <div class="main-information__upload-new-card-content">
                  <img src="static/images/camera.svg" alt="camera">
                  <p>Upload New</p>
                </div>
              </button>
              <button type="button" class="main-information__remove-card" id="remove-card" hidden>
                <div class="main-information__remove-card-content">
                  <img src="static/images/trash-red.svg" alt="camera">
                  <p>Remove</p>
                </div>
              </button>
              <span class="main-information__ps" id="size5mb">Size up to 5mb. Format: png, jpeg, gif.</span>
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
                <p class="main-information__article-title" id="article-preview-title"></p>
                <p class="main-information__article-description" id="article-preview-description"></p>
                <img class="main-information__article-image-preview" src="static/images/article-preview.svg" id="article-image-preview" alt="Article preview">
              </div>
            </div>
            <p class="main-information__preview-title">Post card preview</p>
            <div class="main-information__post-card-preview">
              <div class="main-information__post">
                <img class="main-information__card-image-preview" src="static/images/post-card-preview.svg" id="card-image-preview" alt="Author Image">
                <div class="main-information__post-header">
                  <p class="main-information__post-title" id="post-preview-title"></p>
                  <p class="main-information__post-description" id="post-preview-description"></p>
                </div>
                <div class="main-information__post-footer">
                  <img src="static/images/author-image-preview.svg" id="author-image-preview" alt="Author Image">
                  <span class="main-information__author-name" id="post-preview-author"></span>
                  <span class="main-information__publish-date" id="post-preview-date"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <div class="content">
      <p>Content</p>
      <label>Post content (plain text)<br><textarea id="content" class="content__textarea" name="post-content" placeholder="Type anything you want ..." required></textarea></label>
    </div>
  </form>
</main>

<footer class="footer-block">
</footer>
</body>
</html>
