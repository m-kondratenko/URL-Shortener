<?php
  function connectDB() {
    $mysqli = new mysqli (DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    $mysqli->query("SET NAMES 'utf-8'");
    return $mysqli;
  }

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

  function verifyShortURL($url, $connect) {
    $id=$connect->query("SELECT `id` FROM  `urls` WHERE `shorturl`='$url' LIMIT 0 , 1");
    return $id;
  }

  function getLongURL($id, $connect) {
    $url=$connect->query("SELECT `longurl` FROM  `urls` WHERE `id`='$id' LIMIT 0 , 1");
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

?>
