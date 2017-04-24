<?php
session_start();

$loginError;

// Check if logged in
if ($_SESSION["loggedIn"]) {
  header('Location: ./index.php');
  exit;
}

// Validate Login
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  if ($username === "admin" && $password === "letmein") {
    $_SESSION["loggedIn"] = true;
    header('Location: ./index.php');
    exit;
  } else {
    $loginError = true;
  }

}

include_once '../../inc/dashboard-header.php'; ?>
  <div class="container">

    <?php if ($loginError) {
      echo '<p class="red padding white-text">Incorrect Username or Password.</p>';
    } ?>

    <div class="white padding margin-vertical">
      <h2>Login</h2>
      <form class="form"
      method="POST">
        <div class="form__field">
          <input required class="form__input" type="text" name="username" value="" placeholder="Username">
        </div>
        <div class="form__field">
          <input class="form__input" type="password" name="password" value="" placeholder="Password">
        </div>
        <div class="form__field">
          <input required class="btn-primary" type="submit" value="Login">
        </div>
      </form>

    </div>
  </div>
