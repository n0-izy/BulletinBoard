<?php
require_once('redirect.php');

function validation ($postDeleteId) {
  if(!empty($_POST['deleteId'])){
    return false;
  }else{
    return true;
  }
}