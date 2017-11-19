<?php
include '../../../Controller/Controller.php';
$con = new Controller;

$id = 0;
if(!empty($_POST['id']))
{
$id = $_POST['id'];
if($con->Add_Data("update image_master set i_block=0 where i_id=$id"))
{
  echo "Done !";


}else {
  echo "Something Wrong";

}


}

 ?>
