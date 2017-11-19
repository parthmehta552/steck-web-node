<?php
include '../../../Controller/Controller.php';
include '../../../Controller/URL.php';
$con = new Controller;

$jsondata = $_POST["jsondata"];
$json = $con->cUrl_Call(Block_UnBlock_Query,$jsondata);
print $json["response"]["error_code"];

?>
