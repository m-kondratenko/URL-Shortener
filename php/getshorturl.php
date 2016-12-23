<?php
  function implementFilters($url) {
    if(get_magic_quotes_gpc()==1)  {
      $url=stripslashes(trim($url));
      }
    else {
      $url=trim($url);
      }
    $url=mysql_real_escape_string($url);
    return $url;
  }

  function verifyUrl($url) {
    $curl=curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_exec($curl);
    $response=curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    return (!empty($response)&&$response!=404);
  }

  //check for valid URL
  if (!verifyUrl($_POST["longurl"])) {
    die("Your URL is not valid");
  }
  //check for injections
  $longurl=implementFilters($_POST["longurl"]);
  //check for desiredurl
  if($_POST["desiredurl"]) {
    $shorturl="http://".$_SERVER["HTTP_HOST"]."/".implementFilters($_POST["desiredurl"]);
  }
  else {
    $shorturl="http://".$_SERVER["HTTP_HOST"]."/empty";
  }
  //insert url pair into the DB
  require_once 'DB.php';
  $connect=connectDB();
  if ($connect->connect_errno) {
    echo "db_error";
  }
  else {
    $lock=$connect->query("LOCK TABLES `urls` WRITE");
    $success=$connect->query("INSERT INTO  `urls` (`id`, `longurl`, `shorturl`, `date`, `usage`) VALUES (NULL, '$longurl', '$shorturl', CURRENT_TIMESTAMP, '0')");
    $unlock=$connect->query("UNLOCK TABLES");
    $connect->close();
    echo $shorturl;
  }
?>
