<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>URL Shortener</title>
    <link rel="stylesheet" href="css/main.css" title="test umbrella">
    <script src="js/jquery.min.js"></script>
    <script src="js/main.js"></script>
  </head>
  <body>
    <?php
      require_once '/php/main.php';
    ?><br>
    <h1>URL Shortener</h1>
    <form method="post" id="shortener">
      <div>Insert your URL:</div>
      <input id="longurl" type="text">
      <div>Insert desired short URL:</div>
      <input id="desiredurl" maxlength="<?php echo MAX_LENGTH ?>" type="text"><br>
      <div>Short URL:</div>
      <input id="shorturl" type="text" disabled><br>
      <button id="shorten" type="button" onclick="GetShortURL()">Get shortened URL</button><br>
      <div>* First you should insert your URL and then push the button to get the URL shortened. You may also insert preffered short URL.
      Allowed chars: <?php echo CHARS ?>. Allowed length: <?php echo MAX_LENGTH ?>.</div>
    </form>
  </body>
</html>
