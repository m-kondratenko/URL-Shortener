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
    //delete URL pairs which are older than 15 days
    $success=$connect->query("DELETE FROM `urls` WHERE DATEDIFF(CURDATE(), `date`)>=15");
    $unlock=$connect->query("UNLOCK TABLES");
    $connect->close();
    return false;
    //API
    //return file_get_contents('http://DOMAIN/php/getshorturl.php?longurl='.urlencode('URL'));
  });
  $app->get('/{url}', function($url) {
    //check for correct simbols
    if(!preg_match(EXPRESSION, $url)) {
	     die('That is not a valid short URL');
    }
    require_once 'config.php';
    require_once 'functions.php';
    $shorturl="http://".$_SERVER["HTTP_HOST"]."/".implementFilters($url);
    $connect=connectDB();
    //check if there is such URL in the DB
    $id=mysqli_fetch_row(verifyShortURL($shorturl, $connect));
    if (!$id) {
      die("There is no such short URL in the DB");
    }
    //get initial URL
    else {
      $longurl=mysqli_fetch_row(getLongURL($id[0], $connect));
      incrementUsage($id[0], $connect);
    }
    $connect->close();
    //redirect to initial URL
    echo '<meta http-equiv="refresh" content="0; URL='.$longurl[0].'" />';
    die();
  });
  $app->run();
?>
