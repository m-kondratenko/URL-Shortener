<?php
  class Shortener {

    public function connectDB() {
      $mysqli = new mysqli (DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
      $mysqli->query("SET NAMES 'utf-8'");
      return $mysqli;
    }

    public function implementFilters($senturl, $connect) {
      $url=trim($senturl);
      $url=mysqli_real_escape_string($connect, $url);
      return $url;
    }

    public function verifyShortURL($url, $connect) {
      $id=$connect->query("SELECT `id` FROM  `urls` WHERE `shorturl`='$url' LIMIT 0 , 1");
      return $id;
    }

    public function verifyLongUrl($url) {
      $curl=curl_init();
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_exec($curl);
      $response=curl_getinfo($curl, CURLINFO_HTTP_CODE);
      curl_close($curl);
      return (!empty($response)&&$response!=404);
    }

    public function getLongURL($id, $connect) {
      $url=$connect->query("SELECT `longurl` FROM  `urls` WHERE `id`='$id' LIMIT 0 , 1");
      return $url;
    }

    public function incrementUsage($id, $connect) {
      $result=$connect->query("UPDATE `urls` SET `count`=`count`+1 WHERE `id`='$id'");
    }

    public function generateShortURL($base){
      $shorturl='';
      $count=rand(1, MAX_LENGTH);
      $length=strlen($base);
      for ($i=1; $i<=$count; $i++) {
        $shorturl.=$base[rand(0, $length)];
      }
      return $shorturl;
    }
  }
?>
