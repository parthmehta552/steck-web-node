<?php

include '../../../Controller/Controller.php';
include '../../../Controller/URL.php';

$con = new Controller;

$target_dir = "";
$target_file="";
$qid = $_POST['id'];
$caption = $_POST['caption'];
$pathname = $_POST['pathname'];

$file="";

if(isset($_FILES['file'])){
  if( 0 < $_FILES['file']['error']){
    echo "567";
  }else{
    $file = $_FILES['file']['name'];
  $target_file="../../userimg/" . $_FILES['file']['name'];
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if($imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "jpeg" && $imageFileType != "JPEG")
{
echo "277";
}else {

 move_uploaded_file($_FILES['file']['tmp_name'], $target_file);

 $generate = array("path" => $file , "_id" => $qid , "caption" => $caption);
 $jsondata = json_encode($generate);
 $json = $con->cUrl_Call(Update_Image_By_Id,$jsondata);
 print $json["response"]["error_code"];



}  }

}else{
  $generate = array("path" => $pathname , "_id" => $qid , "caption" => $caption);
  $jsondata = json_encode($generate);
  $json = $con->cUrl_Call(Update_Image_By_Id,$jsondata);
  print $json["response"]["error_code"];
}



?>
