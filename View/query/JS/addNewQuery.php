<?php
include "../../../Controller/Controller.php";
include "../../../Controller/URL.php";

$controller = new Controller();


if(!empty($_POST['jsondata'])){

$lang_id = $_SESSION["lang_id"];
$user_id = $_SESSION["userdata"]["id"];

$userjsondata = $_POST['jsondata'];
$decodedata = json_decode($userjsondata);
$alldata = array("content" => $decodedata->content,"languages_id" => $lang_id, "users_id" => $user_id, "query_answertime" => 0);
$userenjson = json_encode($alldata);

$json = $controller->cUrl_Call(Add_New_Query,$userenjson);
print $json["response"]["error_code"];
}


?>