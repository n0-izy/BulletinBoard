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
    // $dbh = dbConnect(DB_HOST, DB_NAME, DB_USER, DB_DEFAULT_PASSWORD);
    $dbh = dbConnect(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($params);
  } catch (PDOException $e) {
    echo '登録失敗しました'. $e->getMessage();
    exit(); 
  }
}

/**
 * DBpostsデータ取得
 * @param string 
 */
function select_posts($sql_posts_users){
  try{
    // $dbh = dbConnect(DB_HOST, DB_NAME, DB_USER, DB_DEFAULT_PASSWORD);
    $dbh = dbConnect(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
    $stmt = $dbh->prepare($sql_posts_users);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
  }catch(PDOException $e){
    echo '取得失敗です';
    exit();
  }
}
/**
 * DBuserデータ取得
 */
function select_users($sql_users){
  try{
    // $dbh = dbConnect(DB_HOST, DB_NAME, DB_USER, DB_DEFAULT_PASSWORD);
    $dbh = dbConnect(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
    $stmt = $dbh->query($sql_users);
    return $stmt;
  }catch(PDOException $e){
    echo '取得失敗です';
    exit();
  }
}





