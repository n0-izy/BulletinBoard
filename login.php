<?php
  session_start();
  require_once('validation.php');
  require_once('dbHandler.php');

  if(!empty($_POST)){
    $errors = logInValidation($_POST);
    if(empty($errors)){
      $SqlUsers = "SELECT * FROM users WHERE user_name = :user_name";
      $params = [
        ":user_name" => $_POST["userName"],
      ];
      $hash = getUsersValidation($SqlUsers, $params);
      $_SESSION['login_user'] = $hash;
      if(password_verify($_POST['password'], $hash['password'])){
        $_SESSION['login_user'] = $hash;
        $_SESSION['login_user']['password'] = "";
        header("Location: timeline.php");
        exit();
      } else {
        $errors['passErr'] = 'パスワードが違います';
      }
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
    <link rel="stylesheet" href="css/login.css">
    <title>ログインページ</title>
  </head>

  <body>
    <div class="container">
      <h1 class="text-center title">ローカル掲示板</h1>
    </div>

    <div class="container farst-Title">
      <form action="" method="POST">
        <div class="form-group w-75 form-Items">
          <label for="userName">ユーザー名</label>
          <input type="text" class="form-control" name="userName" id="userName" placeholder="ユーザー名を入力してください">
          <!-- <small class="form-text text-muted">※20文字以内で入力して下さい</small> -->
          
        </div>
        <div class="form-group w-75 form-Items">
          <label for="password">パスワード</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="パスワード入力して下さい">
          <?php if(isset($errors['passErr'])) : ?>
            <p class="err"><?php echo $errors['passErr'] ?></p>
          <?php endif; ?>
          <!-- <small class="form-text text-muted">※16文字以内で入力して下さい</small> -->
          
        </div>
        <div class="form-button">
          <button type="submit" class="btn btn-primary">ログインする</button>
        </div>
      </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>