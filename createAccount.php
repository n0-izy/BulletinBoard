<?php
session_start();
require_once('validation.php');
require_once('dbHandler.php');

if(!empty($_POST)){
  $SqlUsers = "SELECT user_name, password FROM users WHERE user_name = :user_name";
  $params = [
            ':user_name'  => $_POST['userName'],
   ];
  $userInfo =  getUsers($SqlUsers, $params);
  $errors = registerValidation($_POST, $userInfo);
  if(empty($errors)){
    $_SESSION["userName"] = $_POST["userName"];
    $_SESSION["password"] = $_POST["password"];
    header('Location: ./Confirmation.php');
    exit();
  }
}
?>

<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/createAccount.css">
    <title>アカウント登録</title>
    <script src="js/modalControl.js" defer></script>
  </head>
  
  <body>
    <div class="container">
      <h1 class="text-center title">アカウント登録</h1>
    </div>

    <div class="container w-50 formArea">
      <form action="" method="POST">
        <div class="form-group formItem">
          <div class="container-fulid">
            <div class="row">
              <div class="col-2">
                <label for="userName">ユーザー名</label>
              </div>
              <div class="col-6">
                <small class="form-text text-muted">※20文字以内で入力して下さい</small>
              </div>
            </div>
          </div>
          <input type="text" class="form-control" name="userName" id="userName" placeholder="ユーザー名を入力してください">
          <?php if(isset($errors["userName"])) :?>
          <p class="err"><?php echo $errors["userName"] ?></p>
          <?php endif; ?>
          <?php if(isset($errors["userNameErr"])) :?>
          <p class="err"><?php echo $errors["userNameErr"] ?></p>
          <?php endif; ?>
        </div>
        <div class="form-group formItem">
          <div class="container-fulid">
            <div class="row">
              <div class="col-2">
                <label for="password">パスワード</label>
              </div>
              <div class="col-6">
                <small class="form-text text-muted">※16文字以内で入力して下さい</small>
              </div>
            </div>
          </div>
          <input type="password" class="form-control" name="password" id="password" placeholder="パスワード入力して下さい">
          <?php if(isset($errors["password"])) :?>
          <p class="err"><?php echo $errors["password"] ?></p>
          <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">登録する！</button>
        <a href="login.php" class="btn btn-danger">登録済みの方はこちら！</a>
      </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>