<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="static/styles/login-style.css">
	<link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
</head>
<body>

<main>
  <div class="login">
    <div class="login__content">
      <img src="static/images/escape-author-white-logo.svg" alt="Escape logo">
      <p>Log in to start creating</p>
    </div>
    <form class="login__form">
      <h1>Log In</h1>
      <div class="login__required-fields-empty" id="required-fields-empty" hidden>
        <div class="login__required-fields-empty-content">
          <img src="static/images/alert-circle.svg" alt="alert-circle">
          <p>Email or password is incorrect.</p>
        </div>
      </div>
      <label>Email<br><input id="input-email" name="email" type="email" required></label>
      <div class="login__password">
        <label>Password<br>
          <input id="input-password" name="password" type="password" required>
          <button id="toggle-visibility" class="login__toggle-visibility" type="button"><img id="eye" src="static/images/eye.svg" alt="eye"></button>
        </label>
      </div>
      <button id="login" class="login__button" type="submit">Log In</button>
    </form>
  </div>
</main>

<footer class="footer-block">
</footer>
<script src="src/js/login.js" type="application/javascript"></script>
<script src="static/js/inputs-logic.js" type="application/javascript"></script>
</body>
</html>
