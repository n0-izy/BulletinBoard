<?php
function deleteValidation($postDeleteId) {
  if(!empty($_POST['deleteId'])){
    return false;
  }else{
    return true;
  }
}
function registerValidation($post, $result){
  $errors = [];
    if(mb_strlen($_POST["userName"]) < 1 || mb_strlen($_POST["userName"]) > 20){
      $errors["userName"] = "※1文字以上20文字以内で入力してください";
    }
    if(strlen($_POST["password"]) < 6 || strlen($_POST["password"]) > 16){
        $errors["password"] = "※6文字以上16文字以内で入力してください";
    }
    if($result == true ){
        $errors["userNameErr"] = "すでに登録済みです";
    }
  return $errors;
}

function logInValidation($post){
  $errors = [];
  if(mb_strlen($_POST["userName"]) < 1 || mb_strlen($_POST["userName"]) > 20){
    $errors["userName"] = "※1文字以上20文字以内で入力してください";
  }
  if(strlen($_POST["password"]) < 6 || strlen($_POST["password"]) > 16){
      $errors["password"] = "※6文字以上16文字以内で入力してください";
  }
  return $errors;
}
