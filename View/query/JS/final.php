<?php
include '../../../Controller/Controller.php';
$con = new Controller;


$query="";
$langid = $_SESSION["lang_id"];
$userid = $_SESSION['userdata']['user_id'];
$data_date= date("Y-m-d");
$data_time = date('h:i:s');
if(!empty($_POST['query']))
{
$query = $_POST['query'];
if($con->Add_Data("insert into query_master (q_content,q_date,q_time,lang_id,user_id,q_answered,q_block) values('$query','$data_date','$data_time',$langid,$userid,0,0)"))
{
echo "<div class='alert alert-warning alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Posted ! </strong> Your query is posted </div>";

}
else {

  echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Nothing ! </strong> No Data Found</div>";

}
}



?>
