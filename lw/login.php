<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
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
      <label>Email<br><input id="input-email" name="email" type="email" required></label>
      <div class="login__password">
        <label>Password<br>
          <input id="input-password" name="password" type="password" required>
          <button class="login__toggle-visibility" type="button"><img src="static/images/eye.svg" alt="eye"></button>
        </label>
      </div>
      <button class="login__button" type="submit">Log In</button>
    </form>
  </div>
</main>

<footer class="footer-block">
</footer>
<script src="src/js/login.js" type="application/javascript"></script>
<script src="static/js/inputs-logic.js" type="application/javascript"></script>
</body>
</html>
