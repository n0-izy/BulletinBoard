<?php 
session_start();
$userName = $_SESSION['userName'];
$password = $_SESSION['password'];
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
      <form action="thanks.php" method="POST">
        <div class="form-group formItem">
          <p>ユーザー名</p>
          <?php if(isset($userName)) :?>
          <p><?php echo $userName ?></p>
          <?php endif; ?>
        </div>
        <div class="form-group formItem">
          <p>パスワード</p>
          <?php if(isset($password)) :?>
          <p><?php echo str_repeat("*",mb_strlen($password, "UTF-8")); ?></p>
          <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">登録する！</button>
        <a href="createAccount.php">
            <button type="button" class="btn btn-danger">戻る</button>
        </a>
      </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>