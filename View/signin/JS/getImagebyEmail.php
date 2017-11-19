<?php

include "../../../Controller/Controller.php";
include "../../../Controller/URL.php";



$controller = new Controller();


if(!empty($_POST['jsondata'])){

$userjsondata = $_POST['jsondata'];

$json = $controller->cUrl_Call(Get_ImageBy_Email,$userjsondata);
if($json["response"]["error_code"]==200){

    print $json["response"]["data"]["image"];

}else{
    print $json["response"]["error_code"];
}
   

}


?>