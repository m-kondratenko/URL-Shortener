<?php
  require_once 'silex.phar';
  //create application instance
  $app = new Silex\Application();
  //$app['debug'] = true;
  //describe routing
  $app->get('/', function() {
    require_once 'config.php';
    require_once 'DB.php';
    $connect=connectDB();
    $lock=$connect->query("LOCK TABLES `urls` WRITE");
    $success=$connect->query("DELETE FROM `urls` WHERE DATEDIFF(CURDATE(), `date`)>=15");
    $unlock=$connect->query("UNLOCK TABLES");
    $connect->close();
    return false;
  });
  $app->run();
?>
