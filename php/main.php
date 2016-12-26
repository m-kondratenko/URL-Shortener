<?php
  require_once 'silex.phar';
  //create application instance
  $app = new Silex\Application();
  //describe routing
  $app->get('/', function() {
    require_once 'config.php';
    require_once 'functions.php';
    $connect=connectDB();
    $lock=$connect->query("LOCK TABLES `urls` WRITE");
    $success=$connect->query("DELETE FROM `urls` WHERE DATEDIFF(CURDATE(), `date`)>=15");
    $unlock=$connect->query("UNLOCK TABLES");
    $connect->close();
    return false;
  });
  $app->get('/{url}', function($url) {
    if(!preg_match('|^[0-9a-zA-Z]{1,6}$|', $url)) {
	     die('That is not a valid short URL');
    }
    require_once 'config.php';
    require_once 'functions.php';
    $shorturl="http://".$_SERVER["HTTP_HOST"]."/".implementFilters($url);
    $connect=connectDB();
    $id=mysqli_fetch_row(verifyShortURL($shorturl, $connect));
    if (!$id) {
      die("There is no such short URL in the DB");
    }
    else {
      $longurl=mysqli_fetch_row(getLongURL($id[0], $connect));
    }
    $connect->close();
    echo '<meta http-equiv="refresh" content="0; URL='.$longurl[0].'" />';
    die();
  });
  $app->run();
?>
