<?php

session_start();

if ($_SESSION["loggedIn"] !== true) {
  header('Location: ./login.php');
  exit;
}

include_once $_SERVER["DOCUMENT_ROOT"] . '/../inc/dashboard-header.php';

?>

<div class="container">
  <h1>Dashboard</h1>
</div>
