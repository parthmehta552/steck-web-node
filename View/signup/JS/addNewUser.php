<?php

include "../../../Controller/Controller.php";
include "../../../Controller/URL.php";

$controller = new Controller();


if(!empty($_POST['jsondata'])){

$userjsondata = $_POST['jsondata'];
$json = $controller->cUrl_Call(Add_New_User,$userjsondata);
print $json["response"]["error_code"];

}
?>