<?php
$id=0;
$lang="";
include_once './Controller/Controller.php';
$con = new Controller();

if(isset($_REQUEST['id']))
{
  $id = $_REQUEST['id'];
  $lang = $_REQUEST['lang'];

unset($_SESSION['lang_id']);
unset($_SESSION['lang_name']);
//echo $id ." - ".$lang;
  $_SESSION['lang_id'] = $id;
  $_SESSION['lang_name'] = $lang;
//echo $_SESSION['lang_id'] ." ^ ".$_SESSION['lang_name'];
  
header("location:?sc=query");
}




?>
