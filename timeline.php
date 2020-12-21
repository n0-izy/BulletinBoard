<?php
require_once ('dbHandler.php');
require_once ('validation.php');
require_once ('redirect.php');
session_start();

// データ取得
  $SqlPosts = "SELECT posts.id, users.user_name, posts.post_content, posts.created, posts.category
                FROM posts inner join users on posts.user_id = users.id
                ORDER BY posts.id desc LIMIT 20";
  $SqlPost = getPostsAndUsers($SqlPosts);

  // データ削除
  if(!deleteValidation($_POST)){ //falseだったら
    $serverURL = $_SERVER['REQUEST_URI'];
    $delete = 'DELETE FROM posts WHERE id = :id';
    deleteData($delete, $_POST['deleteId']);
    redirect($serverURL);
  }
  if(!empty($_POST["logout"])){
    $_SESSION = [];
    setcookie(session_name(), '', time() -10);
    session_destroy();
    header("Location: login.php");
    exit();
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
    <link rel="stylesheet" href="css/timeLine.css">
    <title>Hello, world!</title>
    <script src="js/modalControl.js" defer></script>
  </head>

  <body>
    <div class="col-12 clearfix">
    <form action="" method="POST">
      <button type="submit" name="logout" value="logout" class="btn btn-outline-primary float-right mt-5 mr-5">logout</button>
    </form>
    </div>

    <div class="container">
      <h1 class="text-center mb-5">ローカル掲示板</h1>
    </div>

    <div class="container">
      <div class="">
        <select class="mb-5" name="category">
          <option value="">カテゴリー</option>
          <option value="1">ゲーム</option>
          <option value="2">音楽</option>
          <option value="3">漫画</option>
          <option value="4">車</option>
          <option value="5">バイク</option>
        </select>
      </div>

      <div class="container">
        <a href="post.php" class="">投稿する</a>
      </div>

      <div id="backColor"class="border border-dark">
        <?php foreach ($SqlPost as $post) : ?>
          <div class="  float-left db_color">
            <p class="font-weight-bold mt-1 mb-0"><?php echo "投稿者=". $post["user_name"] ; ?></p>
          </div>
          <div class="clearfix db_color">
            <form action="" method="POST" class="m-0 p-0">
              <button type="submit" class="DeleteButton float-right" id="delete">削除</button>
              <input type="hidden" name="deleteId" value="<?php echo $post['id'] ; ?>">
            </form>
            <p class='font-weight-bold float-right mt-1 mb-0'><?php echo "投稿時間". $post["created"] ; ?></p>
          </div>
          <p class="m-1 d-block PostContent"><?php echo $post["post_content"] ; ?></p>
        <?php endforeach; ?>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>