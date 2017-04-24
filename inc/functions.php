<?php

function inc($file) {
  $file = str_replace(".php", "", $file);
  include_once $_SERVER["DOCUMENT_ROOT"] . '/../inc/' . $file . ".php";
}

function connect() {
  include_once $_SERVER["DOCUMENT_ROOT"] . '/../connection.php';
  if (isset($conn)) {
    return $conn;
  }
}

function query($sql) {
  return connect()->query($sql);
}

function fetch($sql) {
  return query($sql);
}
