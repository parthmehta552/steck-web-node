<?php
include "../../Model.php";
$m = new Model;
if($_SESSION['limans']==0)
{
$_SESSION['limans']=3;
}else{
$cnt = $_SESSION['limans'];

$cnt-=3;


$_SESSION['limans']=$cnt;
}


 ?>
