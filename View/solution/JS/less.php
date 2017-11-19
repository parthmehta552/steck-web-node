<?php
include "../../Model.php";
$m = new Model;
if($_SESSION['lim']==0)
{
  $_SESSION['lim']=5;

}else{
$cnt = $_SESSION['lim'];

$cnt-=5;

$_SESSION['lim']=$cnt;


}
?>
