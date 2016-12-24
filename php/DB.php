<?php
  function connectDB() {
    $mysqli = new mysqli (DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    $mysqli->query("SET NAMES 'utf-8'");
    return $mysqli;
  }
?>
