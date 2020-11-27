<?php
  session_start();
  var_dump($_SESSION);
  require_once('dbHandler.php');
  $user_name = $_SESSION['userName'];
  $password  = $_SESSION['password'];

  $sql = "INSERT INTO users 
                      (user_name, password, created, updated)
                      VALUE
                      (:user_name, :password, :created, :updated)";
  $params = [
    ':user_name' => $user_name,
    ':password'  => password_hash($password, PASSWORD_DEFAULT),
    ':created'   => date('Y-m-d H:i:s'),
    ':updated'   => date('Y-m-d H:i:s'),
  ];
  insert($sql, $params);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>登録画面</title>
  <link rel="stylesheet" href="./css/regist.css">
</head>
<body>

  <h1>送信完了</h1>
  <h2>お問合せありがとうございます!!!!</h2>
  <div class="content">
    <a href="login.php">ログインする</a>
  </div>
  
</body>
</html>