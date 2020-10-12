<?php
require_once('env/env.php');

//1データベース接続関数
function dbConnect() {
  $host       = DB_HOST;
  $dbname     = DB_NAME;
  $user       = DB_USER;
  $password   = DB_PASSWORD;
  $dsn        = "mysql:host=$host;dbname=$dbname;charset=utf8";
  try{
    $dbh = new PDO($dsn, $user, $password);
    } catch(PDOExetion $e){
      echo '接続失敗です'. $e->getMessage();
      exit();
    }
    return $dbh;
  }
  
// 2インサート関数
  function insert() {
    $dbh = dbConnect();
    $sql    = 'INSERT INTO 
                posts(user_id,post_content, category, created, updated)
                VALUES
                (:user_id, :post_content, :category, :created, :updated)';
    $stmt   = $dbh->prepare($sql);
    $params = array(
      ':user_id'      => 1,
      ':post_content' => $_POST['post_content'],
      ':category'     => $_POST['category'],
      ':created'      => date('Y-m-d H:i:s'),
      ':updated'      => date('Y-m-d H:i:s'),
    );
    $result = $stmt->execute($params);
    return $result;
  }



