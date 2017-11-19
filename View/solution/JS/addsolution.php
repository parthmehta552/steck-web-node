<?php
include "../../../Controller/Controller.php";
include "../../../Controller/URL.php";
$con = new Controller();

$qid=$_SESSION['q_id'];
$userid=$_SESSION['userdata']['id'];
$data_date= date("Y-m-d");
$data_time = date('h:i:s');
$content="";
$d=0;
$flname="";
$randomno =rand(000000,999999);

if(!empty($_POST['content']))
{


  $content =$_POST['content'];
  $filename = $con->write_file($content,$userid,$qid);

  $generate = array('content' => $filename, 'users_id' => $userid ,'queries_id' => $qid);
  $jsondata = json_encode($generate);
  $json = $con->cUrl_Call(Add_Solution,$jsondata);
  print $json["response"]["error_code"];


}
?>
