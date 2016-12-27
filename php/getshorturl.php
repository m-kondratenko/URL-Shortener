<?php
  require_once 'config.php';
  require_once 'functions.php';
  //check for valid URL
  if (!verifyLongUrl($_REQUEST["longurl"])) {
    die("Your URL is not valid");
  }
  //check for DB connection
  $connect=connectDB();
  if ($connect->connect_errno) {
    die("db_error");
  }
  //check for injections
  $longurl=implementFilters($_REQUEST["longurl"]);
  //check for desired URL
  if($_POST["desiredurl"]) {
    if(!preg_match(EXPRESSION, $_POST["desiredurl"])) {
	     die('That is not a valid short URL');
    }
    $shorturl="http://".$_SERVER["HTTP_HOST"]."/".implementFilters($_REQUEST["desiredurl"]);
    if (verifyShortURL($shorturl, $connect)->fetch_assoc()) {
      die("Desired URL is already in DB");
    }
  }
  else {
    //generate short URL and verify if it is already in the DB
    do {
      $generatedurl=generateShortURL(CHARS);
    } while (verifyShortURL($generatedurl, $connect)->fetch_assoc());
    $shorturl="http://".$_SERVER["HTTP_HOST"]."/".$generatedurl;
  }
  //insert URL pair into the DB
  $lock=$connect->query("LOCK TABLES `urls` WRITE");
  $success=$connect->query("INSERT INTO  `urls` (`id`, `longurl`, `shorturl`, `date`, `usage`) VALUES (NULL, '$longurl', '$shorturl', CURRENT_TIMESTAMP, '0')");
  $unlock=$connect->query("UNLOCK TABLES");
  $connect->close();
  echo $shorturl;
?>
