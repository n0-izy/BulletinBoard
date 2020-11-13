<?php 
  require_once('dbHandler.php');
  var_dump($_POST);
  $errors = [];

  if(!empty($_POST)){
    if($_POST['post_content'] === "" ){
      $errors['post_content'] = "※必須項目です";
    }
    if(empty($errors)){
      $sql    = "INSERT INTO 
              posts(user_id, post_content, category, created, updated)
              VALUES
              (:user_id, :post_content, :category, :created, :updated)";
      $params = [
        ':user_id'      => 1,
        ':post_content' => $_POST['post_content'],
        ':category'     => $_POST['category'],
        ':created'      => date('Y-m-d H:i:s'),
        ':updated'      => date('Y-m-d H:i:s'),
      ];
      insert($sql, $params);
      header('Location: ./timeline.php');
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/earlyaccess/nicomoji.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Hello, world!</title>
    
  </head>
  <body>
    <div class="container">
      <div class="container  pt-5 mt-5 mb-5">
          <h1 class="mx-auto text-center font-weight-bold  wf-nicomoji">投稿<br>~form~</h1>
      </div>

      <form action="" method="post">
        <div class="container">
          <div class="row ">
            <div class="col-6 mx-auto rounded bg-light shadow-lg">
          <div class="form-group">
            <div class="row">
              <div class="col-12 mx-auto ">
                <textarea class="form-control  col-12 mt-5 mb-1" name="post_content" id="textmessage" cols="" rows="6"></textarea>
                <?php
                  if(isset($errors['post_content'])){
                    echo '<p id="errors">';
                    echo $errors['post_content'];
                    echo '</p>';
                  }
                ?>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row ">
              <div class="col-12 mx-auto">
                <select class="col-12 form-control mb-5" name="category">
                  <option value="">カテゴリー</option>
                  <option value="1">ゲーム</option>
                  <option value="2">音楽</option>
                  <option value="3">漫画</option>
                  <option value="4">車</option>
                  <option value="5">バイク</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        </div>
        </div>

        <div class="form-group">
          <div class="container mt-5">
            <div class="row">
              <div class="col-6 mx-auto">
                <button type="submit" class="col-12 form-control button-1" onclick="valid()" >投稿する</button>
              </div>
            </div>
         </div>
        </div>
      </form>

    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="js/post.js"></script>
  </body>
</html>