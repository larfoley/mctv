<?php

class Database {

  private $connection;
  private $connected;

  public function __construct() {
    include_once $_SERVER["DOCUMENT_ROOT"] . "/../connection.php";
    $this->connection = $conn;
    if ($conn) {
      $this->connected = true;
    } else {
      $this->connected = false;
    }
  }

  public function isConnected() {
    return $this->connected;
  }

  public function query($sql) {
    return $this->connection->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  }

  public function fetch($sql) {
    return $this->connection->query($sql);
  }

}
