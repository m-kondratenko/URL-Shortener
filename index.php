<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>URL Shortener</title>
    <link rel="stylesheet" href="css/style.css" title="test umbrella">
    <script src="js/jquery.min.js"></script>
    <script src="js/main.js"></script>
  </head>
  <body>
    <h1>URL Shortener</h1>
    <p><?php
      require_once '/php/main.php';
    ?></p><br>
    <form method="post" id="shortener">
      <div class="text">Insert your URL</div>
      <input id="longurl" class="input" type="text">
      <p></p>
      <div class="text">Insert desired short URL</div>
      <input id="desiredurl" class="input" maxlength="<?php echo MAX_LENGTH ?>" type="text"><br>
      <p></p>
      <div class="text">Short URL</div>
      <input id="shorturl" class="input" type="text" disabled><br>
      <button id="shorten" class="button" type="button" onclick="GetShortURL()" >Get shortened URL</button><br>
      <div class="smalltext">* First you should insert your URL and then push the button to get the URL shortened. You may also insert preffered short URL.</div>
      <div class="smalltext">Allowed chars: <?php echo CHARS ?>. Allowed length: <?php echo MAX_LENGTH ?>.</div>
    </form>
  </body>
</html>
