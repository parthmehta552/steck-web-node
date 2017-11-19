<?php
include '../../../Controller/Controller.php';
include '../../../Controller/URL.php';

$con = new Controller;


$target_dir = "";
$target_file="";
$userid=0;
$file="";
//$uplfile = $_POST['uplfile'];
//$userid = $_SESSION['userdata']['user_id'];
if(isset($_FILES['file'])){
 if ( 0 < $_FILES['file']['error'] ) {
        echo 'Something Wrong';
    }
    else {
      $file = $_FILES['file']['name'];
  	$target_file="../../userimg/" . $_FILES['file']['name'];
		  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if($imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "jpeg" && $imageFileType != "JPEG")
{
  echo 277;
  
}else {

   move_uploaded_file($_FILES['file']['tmp_name'], $target_file);

   $generate = array("_id" => $_SESSION["userdata"]["id"], "image" => $file);
   $encodejson = json_encode($generate);
   $json = $con->cUrl_Call(Update_Image_ID,$encodejson);
   print $json["response"]["error_code"];
   $_SESSION["userdata"]["image"]=$file;
   
  
}
    }
	}
?>
