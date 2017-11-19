<?php
include "../../Model.php";
$m = new Model;

$cnt = $_SESSION['limans'];

$cnt+=3;


$_SESSION['limans']=$cnt;



 ?>
