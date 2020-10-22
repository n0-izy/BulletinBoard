<?php
require_once ('dbHandler.php');
$sql_posts = "SELECT * FROM posts inner join users on posts.user_id = users.id";
$sql_posts .= " ORDER BY posts.id desc LIMIT 20";
$sql_post = getPostsAndUsers($sql_posts);
  echo '<pre>';
  var_dump($sql_post);
  echo '</pre>';


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
  </head>
  <body>

    <div class="col-12 clearfix">
      <button type="button" class="btn btn-outline-primary float-right mt-5 mr-5">logout</button>
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

          <?php foreach($sql_post as $post){
              echo  '<div class="  float-left db_color">'.
                      '<p class="font-weight-bold mt-1 mb-0">投稿者:'.
                      $post['user_name'].
                      '</p>'.
                      '</div>'.
                      '<div class="clearfix db_color">'.
                      '<button class=" DeleteButton float-right">'.
                      '削除'.
                      '</button>'.
                      "<p class='font-weight-bold float-right mt-1 mb-0'>投稿時間:".
                      $post["created"].
                      "</p>".
                      '</div>';
              echo  '<p class="m-1 d-block  PostContent">'.
                    $post['post_content'] .
                    '</p>';
          }
            ?>

      </div>
      

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>