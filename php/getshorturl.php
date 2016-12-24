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

  function verifyLongUrl($url) {
    $curl=curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_exec($curl);
    $response=curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    return (!empty($response)&&$response!=404);
  }

  function generateShortURL($base){
    $shorturl='';
    $count=rand(0, MAX_LENGTH);
    $length=strlen($base);
    for ($i=0; $i<=$count; $i++) {
      $shorturl.=$base[rand(0, $length)];
    }
    return $shorturl;
  }

  function verifyShortURL($url, $connect) {
    $id=$connect->query("SELECT `id` FROM  `urls` WHERE `shorturl`='$url' LIMIT 0 , 1");
    return $id;
  }

  require_once 'config.php';
  require_once 'DB.php';
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
