<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="static/styles/login-style.css">
	<link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

  <script src="static/js/login.js" type="application/javascript"></script>
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
      <div class="login__required-fields-empty" id="required-fields-empty">
        <div class="login__required-fields-empty-content">
          <img src="static/images/alert-circle.svg" alt="alert-circle">
          <p>A-Ah! Check all fields.</p>
        </div>
      </div>
      <div class="login__data-is-incorrect" id="data-is-incorrect">
        <div class="login__data-is-incorrect-content">
          <img src="static/images/alert-circle.svg" alt="alert-circle">
          <p>Email or password is incorrect.</p>
        </div>
      </div>
      <label>Email<br><input class="login__email-input" id="input-email" name="email" type="email" required></label>
      <span class="login__email-is-required" id="email-is-required">Email is required.</span>
      <span class="login__email-is-incorrect" id="email-is-incorrect">Incorrect email format. Correct format is ****@**.***</span>
      <div class="login__password">
        <label class="login__password-label">Password<br>
          <input class="login__password-input" id="input-password" name="password" type="password" required>
          <button id="toggle-visibility" class="login__toggle-visibility" type="button"><img id="eye" src="static/images/eye.svg" alt="eye"></button>
        </label>
        <span class="login__password-is-required" id="password-is-required">Password is required.</span>
      </div>
      <button id="login" class="login__button" type="submit">Log In</button>
    </form>
  </div>
</main>

<footer class="footer-block">
</footer>
</body>
</html>
