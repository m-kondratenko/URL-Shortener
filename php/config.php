<?php
  //DB parameters
  define("DB_HOST", "localhost");
  define("DB_USER", "root");
  define("DB_PASSWORD", "");
  define("DB_NAME", "test_umbrella");
  //maximum length of short URL
  define("MAX_LENGTH", 6);
  //allowed chars for generated short URL
  define("CHARS", "0123456789abcdefghijklmnopqrstuvwxyz");
  //allowed chars for desired short URL {1,6}
  define("EXPRESSION", "|^[0-9a-z]{1,".MAX_LENGTH."}$|");
?>
