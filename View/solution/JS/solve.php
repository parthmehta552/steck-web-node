<?php
include "../../../Controller/Controller.php";

$jsondata = $_POST["jsondata"];
$ada = json_decode($jsondata,true);

$_SESSION['q_id']=$ada["id"];
echo $ada["query"];
?>
