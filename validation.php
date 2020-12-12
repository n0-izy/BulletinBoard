<?php
function deleteValidation($input) {
  if(!empty($input['deleteId'])){
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
    if(!empty($result)) {
        $errors["userNameErr"] = "すでに登録済みです";
    }
  return $errors;
}

function logInValidation($userInfo){
  $errors = [];
  if(mb_strlen($userInfo["userName"]) < 1 || mb_strlen($userInfo["userName"]) > 20){
    $errors["userName"] = "※1文字以上20文字以内で入力してください";
  }
  if(strlen($userInfo["password"]) < 6 || strlen($userInfo["password"]) > 16){
      $errors["password"] = "※6文字以上16文字以内で入力してください";
  }
  return $errors;
}
