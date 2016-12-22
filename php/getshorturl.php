<?php
  require_once 'DB.php';
  //check for injections
  if(get_magic_quotes_gpc()==1)  {
    $longurl=stripslashes(trim($_POST["longurl"]));
    $desiredurl=stripslashes(trim($_POST["desiredurl"]));
    }
  else {
    $longurl=trim($_POST["longurl"]);
    $desiredurl=trim($_POST["desiredurl"]);
    }
  $longurl=mysql_real_escape_string($longurl);
  $desiredurl=mysql_real_escape_string($desiredurl);

  $connect=connectDB();
  if ($connect->connect_errno) {
    echo "db_error";
  }
  else {
    $lock=$connect->query("LOCK TABLES `urls` WRITE");
    $success=$connect->query("INSERT INTO  `urls` (`id`, `longurl`, `shorturl`, `date`, `usage`) VALUES (NULL, '$longurl', '$longurl', CURRENT_TIMESTAMP, '0')");
    $unlock=$connect->query("UNLOCK TABLES");
    $connect->close();
    echo $longurl;
  }
?>
