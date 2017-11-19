<?php
include '../../../Controller/Controller.php';
include '../../../Controller/URL.php';

$con = new Controller;

  if(!empty($_POST['jsondata'])){
    
    $userjsondata = $_POST['jsondata'];
    $decodedata = json_decode($userjsondata);
    
    $regenrate = array("name" => $decodedata->name , "email" => $decodedata->email, "_id" => $_SESSION["userdata"]["id"]);
    $userencode = json_encode($regenrate);
    $json = $con->cUrl_Call(Update_Email_Name_ID,$userencode);
    print $json["response"]["error_code"];
    $_SESSION["userdata"]["name"] = $decodedata->name;
    $_SESSION["userdata"]["email"] = $decodedata->email;
    
  }

?>
