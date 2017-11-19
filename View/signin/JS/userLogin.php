<?php

include "../../../Controller/Controller.php";
include "../../../Controller/URL.php";



$controller = new Controller();


if(!empty($_POST['jsondata'])){

$userjsondata = $_POST['jsondata'];
$json = $controller->cUrl_Call(User_Login,$userjsondata);

if($json["response"]["error_code"]==200){

    $userdata = array("id" => $json["response"]["data"]["_id"], "name" => $json["response"]["data"]["name"],"email" => $json["response"]["data"]["email"], "image" => $json["response"]["data"]["image"], "registerdate" => $json["response"]["data"]["registerdate"]);
    $_SESSION["userdata"] = $userdata;
    $json2 = $controller->cUrl_Call_GET(List_Languages);
    $dataArray = (array)$json2;
    $_SESSION["querydata"] = $dataArray;

    
}else{
    print $json["response"]["error_code"];
}


}
