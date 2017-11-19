<?php
include '../../../Controller/Controller.php';
$con = new Controller;


$fj = "";

$langid =$_SESSION["lang_id"];
if(!empty($_POST['QU'])){
$qur = $_POST['QU'];
$data = $con->Get_Data("select * from query_master where (q_block=0 and lang_id=$langid) and q_content LIKE '%$qur%' ORDER BY q_id desc");
if(mysql_num_rows($data) > 0){
while($r1 = mysql_fetch_array($data))
{
  $data1 = $con->Get_Data("select user_name,user_image from user_master where user_id=".$r1['user_id']);
  while($r2 = mysql_fetch_array($data1))
  {
    if($r1['q_answered']==0)
    {
      $fj = "No Answered";
    }else {
      $fj = "Answered";
    }
    echo "
    <li class='item'>
      <div class='product-img'>
        <img src='"."View/userimg/".$r2['user_image']."'  alt='Product Image'>
      </div>
      <div class='product-info'>
        <a href='javascript:void(0)' class='product-title'>".$r2['user_name']."
        <span data-toggle='tooltip'  data-placement='left' title='' class='pull-right' data-original-title='Posted : ".date("g:ia",strtotime($r1['q_time']))." on ".date("jS F Y",strtotime($r1['q_date']))." Status : ".$fj."'>&nbsp;&nbsp;  <i class='glyphicon glyphicon-info-sign'></i>  &nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;

        </a>
          <br>
            <span class='p'>
            ".$r1['q_content']."
            </span>
            <br>
            <span class='badge bg-green pull-right'>Matched Here</span>
            </div>
    </li>";



  }
}
}else{

  echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Nothing ! </strong> No Data Found</div>";








}
}else {
  $data = $con->Get_Data("select * from query_master where q_block=0 and lang_id=$langid ORDER BY q_id desc");
  while($r1 = mysql_fetch_array($data))
  {
    $data1 = $con->Get_Data("select user_name,user_image from user_master where user_id=".$r1['user_id']);
    while($r2 = mysql_fetch_array($data1))
    {
      if($r1['q_answered']==0)
      {
        $fj = "No Answered";
      }else {
        $fj = "Answered";
      }
      echo "
      <li class='item'>
        <div class='product-img'>
          <img src='"."View/userimg/".$r2['user_image']."'  alt='Product Image'>
        </div>
        <div class='product-info'>
          <a href='javascript:void(0)' class='product-title'>".$r2['user_name']."
          <span data-toggle='tooltip'  data-placement='left' title='' class='badge bg-light-blue pull-right' data-original-title='Posted : ".date("g:ia",strtotime($r1['q_time']))." on ".date("jS F Y",strtotime($r1['q_date']))." Status : ".$fj."'>&nbsp;&nbsp;  Info  &nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;

          </a>
            <br>
              <span class='p'>
              ".$r1['q_content']."
              </span>

              </div>
      </li>";



    }
  }




}

?>
