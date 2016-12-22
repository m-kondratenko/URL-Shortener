<?php
  function connectDB() {
    $mysqli = new mysqli ("localhost","root","","test_umbrella");
    $mysqli->query("SET NAMES 'utf-8'");
    return $mysqli;
  }
?>
