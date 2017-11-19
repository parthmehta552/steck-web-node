<?php
include '../../../Controller/Controller.php';
include "../../../Controller/URL.php";

$con = new Controller;

$langid =$_SESSION["lang_id"];

$data_arr = array("languages_id" => $langid);
$jsondata = json_encode($data_arr);
$json = $con->cUrl_Call(Get_QueryData_by_Language_ID,$jsondata);
if($json["response"]["error_code"]!='201'){
  $totaldataarray = (array)$json["response"]["data"];
  for($i=0;$i<count($totaldataarray);$i++){
    echo "<option value='".$json["response"]["data"][$i]["content"]."'>By ".$json["response"]["data"][$i]["userinfo"][0]["name"]."</option>";
  }
}else{
  echo "<option value='No query found'>No user found</option>";
}



?>
