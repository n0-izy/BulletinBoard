<?php 

    define('DB_HOST', 'localhost');
  define('DB_NAME', 'bulletinboard');
  define('DB_USER', 'root');
  if (gethostname() == 'kazuyanoMacBook-Pro.local') {
    define('DB_PASSWORD', '');
  } else {
    define('DB_PASSWORD', 'N0-izychannel');
  }