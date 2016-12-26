<?php
  require_once 'config.php';
  require_once 'functions.php';
  //check for valid URL
  if (!verifyLongUrl($_POST["longurl"])) {
    die("Your URL is not valid");
  }
  //check for DB connection
  $connect=connectDB();
  if ($connect->connect_errno) {
    die("db_error");
  }
  //check for injections
  $longurl=implementFilters($_POST["longurl"]);
  //check for desiredurl
  if($_POST["desiredurl"]) {
    $shorturl="http://".$_SERVER["HTTP_HOST"]."/".implementFilters($_POST["desiredurl"]);
    if (verifyShortURL($shorturl, $connect)->fetch_assoc()) {
      die("Desired URL is already in DB");
    }
  }
  else {
    //generate short URL and verify if it is already in DB
    do {
      $generatedurl=generateShortURL(CHARS);
    } while (verifyShortURL($generatedurl, $connect)->fetch_assoc());
    $shorturl="http://".$_SERVER["HTTP_HOST"]."/".$generatedurl;
  }
  //insert url pair into the DB
  $lock=$connect->query("LOCK TABLES `urls` WRITE");
  $success=$connect->query("INSERT INTO  `urls` (`id`, `longurl`, `shorturl`, `date`, `usage`) VALUES (NULL, '$longurl', '$shorturl', CURRENT_TIMESTAMP, '0')");
  $unlock=$connect->query("UNLOCK TABLES");
  $connect->close();
  echo $shorturl;
?>
