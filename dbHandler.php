<?php
require_once('env/env.php');
date_default_timezone_set('Asia/Tokyo');

/**
 * DB接続メソッド
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
    $dbh = dbConnect(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($params);
  } catch (PDOException $e) {
    echo '登録失敗しました'. $e->getMessage();
    exit(); 
  }
}

/**
 * DBpostsとDBusersデータ取得
 * @param string 
 */
function getPostsAndUsers($SqlPostsUsers){
  try{
    $dbh = dbConnect(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
    $stmt = $dbh->prepare($SqlPostsUsers);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }catch(PDOException $e){
    echo '取得失敗です';
    exit();
  }
}

/**
 * DBpostsデータ取得
 * @param string 
 */
function getPosts($SqlPosts){
  try{
    $dbh = dbConnect(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
    $stmt = $dbh->prepare($SqlPosts);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }catch(PDOException $e){
    echo '取得失敗です';
    exit();
  }
}

/**
 * DBuserデータ取得
 */
function getUsers($SqlUsers, $params){
  try{
    $dbh = dbConnect(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
    $stmt = $dbh->prepare($SqlUsers);
    $stmt->execute($params);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }catch(PDOException $e){
    echo '取得失敗です';
    exit();
  }
}

//DB削除
function deleteData($delete, $id){
  try{
    $dbh = dbConnect(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
    $stmt = $dbh->prepare($delete);
    $params = array(':id' => $id);
    $stmt->execute($params);
  }catch(PDOException $e){
    echo '削除失敗です';
    exit();
  }
}

