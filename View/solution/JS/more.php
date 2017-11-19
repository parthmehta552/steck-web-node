<?php
include "../../Model.php";
$m = new Model;
$cnt = $_SESSION['lim'];

$cnt+=5;


$_SESSION['lim']=$cnt;


?>
