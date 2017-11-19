<?php
$id=0;
$lang="";
include '../../../Controller/Controller.php';
$con = new Controller;
if(isset($_REQUEST['id']))
{
  $id = $_REQUEST['id'];
  $lang = $_REQUEST['lang'];
unset($_SESSION['lang_id']);
unset($_SESSION['lang_name']);
  $_SESSION['lang_id'] = $id;
  $_SESSION['lang_name'] = $lang;

  $_SESSION['lim'] = 5;
  $_SESSION['limans'] = 3;
  $_SESSION['limdans'] = 3;




header("location:?sc=solution");
}




?>
