<?php

$errors = [];
if(!empty($_POST)){
  if(mb_strlen($_POST["userName"]) < 1 || mb_strlen($_POST["userName"]) > 20){
    $errors["userName"] = "※1文字以上20文字以内で入力してください";
  }
  if(strlen($_POST["password"]) < 6 || strlen($_POST["password"]) > 16){
    $errors["password"] = "※6文字以上16文字以内で入力してください";
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
          <label for="userName">ユーザー名</label>
          <input type="text" class="form-control" name="userName" id="userName" placeholder="ユーザー名を入力してください">
          <small class="form-text text-muted">※20文字以内で入力して下さい</small>
          <?php if(isset($errors["userName"])){
            echo '<p class="err">';
            echo $errors["userName"];
            echo "</p>";

            } ?>
        </div>
        <div class="form-group formItem">
          <label for="password">パスワード</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="パスワード入力して下さい">
          <small class="form-text text-muted">※16文字以内で入力して下さい</small>
          <?php if(isset($errors["password"])){
            echo '<p class="err">';
            echo $errors["password"];
            echo "</p>";
            } ?>
        </div>
        <button type="submit" class="btn btn-primary">登録する！</button>
      </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>