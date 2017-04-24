<?php

session_start();

$root = $_SERVER["DOCUMENT_ROOT"] . '/';

if (!isset($_SESSION["cart"])) {
  $_SESSION["cart"] = array();
}

if (!isset($_SESSION["loggedin"])) {
  $_SESSION["loggedin"] = false;
}
