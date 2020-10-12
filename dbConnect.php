<?php
require_once('env/env.php');

date_default_timezone_set('Asia/Tokyo');

/**
 * DB接続メソッド
 * @param string
 * @param string
 * @param string
 * @param string
 */
function dbConnect($hostname, $dbname, $dbuser = 'root', $password = '') {
  $dsn = "mysql:host=$hostname;dbname=$dbname;charset=utf8";
  try{
    return new PDO($dsn, $dbuser, $password);
  } catch(PDOException $e){
      echo '接続失敗です'. $e->getMessage();
    exit();
  }
}
  
/**
 * DB登録メソッド
 * @param string
 * @param array
 */
function insert($sql, $params) {
  try {
    $dbh = dbConnect(DB_HOST, DB_NAME, DB_USER, DB_DEFAULT_PASSWORD);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($params);
  } catch (PDOException $e) {
    echo '登録失敗しました'. $e->getMessage();
    exit(); 
  }
}



