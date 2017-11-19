<?php

include "../../../Controller/Controller.php";
include "../../../Controller/URL.php";

$controller = new Controller();

for($i=145374;$i<=150000;$i++){
$userdata = array("name" => "abr".$i ,"email" => "qoer".$i."@yahoo.com","password" => "ghjk".$i); 
$userjsondata = json_encode($userdata);
$json = $controller->cUrl_Call(Add_New_User,$userjsondata);
print $json["response"]["error_code"];
}
?>