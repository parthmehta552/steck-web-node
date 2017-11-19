<?php
include "../../Model.php";
$m = new Model;

$cnt = $_SESSION['limdans'];

$cnt+=3;


$_SESSION['limdans']=$cnt;



 ?>
