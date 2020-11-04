<?php
function redirect ($server){
  header("Location: http://localhost{$server}");
  exit;
}