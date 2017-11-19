<?php
include '../../../Controller/Controller.php';
include '../../../Controller/URL.php';
$con = new Controller;

$userid = $_SESSION['userdata']['id'];
$decodedata  = json_decode($_POST['jsondata']);
$generate = array("_id" => $userid , "oldPassword" => $decodedata->oldpassword , "newPassword" => $decodedata->newpassword);
$jsondata = json_encode($generate);
$json = $con->cUrl_Call(Update_Password_ID,$jsondata);
print $json["response"]["error_code"];

?>
