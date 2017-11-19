<?php
include "../../Model.php";
$m = new Model;
if($_SESSION['limdans']==0)
{
$_SESSION['limdans']=3;
}else{
$cnt = $_SESSION['limdans'];

$cnt-=3;


$_SESSION['limdans']=$cnt;
}


 ?>
