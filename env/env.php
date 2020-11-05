<?php
  define('DB_HOST', 'localhost');
  define('DB_NAME', 'bulletinboard');
  define('DB_USER', 'root');
  echo gethostname();
  if (gethostname() == 'LAPTOP-FGHICC8J') {
    define('DB_PASSWORD', 'N0-izychannel');
  } else {
    define('DB_PASSWORD', '');
  }