<?php
include '../../../Controller/Controller.php';
include "../../../Controller/URL.php";
$con = new Controller;

$langid =$_SESSION["lang_id"];
$fj="";
$data_arr = array("languages_id" => $langid);
$jsondata = json_encode($data_arr);
$json = $con->cUrl_Call(Get_QueryData_by_Language_ID,$jsondata);

if($json["response"]["error_code"]!='201'){
  $totaldataarray = (array)$json["response"]["data"];
  for($i=0;$i<count($totaldataarray);$i++){

    if($json["response"]["data"][$i]["query_answertime"]==0)
    {
      $fj = "No Answered";
    }else {
      $fj = "Answered";
    }

    echo "<li class='item' id='qu-".$json["response"]["data"][$i]["_id"]."'>
    <div class='product-img '>
      <img src='"."View/userimg/".$json["response"]["data"][$i]["userinfo"][0]["image"]."' class='offline user-image' alt='User Image'>
    </div>
    <div class='product-info'>
      <a href='javascript:void(0)' class='product-title '>".$json["response"]["data"][$i]["userinfo"][0]["name"]."
      <span data-toggle='tooltip'  data-placement='left' title='' class='pull-right' data-original-title='Posted : ".date("jS M y g:ia",strtotime($json["response"]["data"][$i]["datetime"]))." Status : ".$fj."'>&nbsp;&nbsp;  <i class='glyphicon glyphicon-info-sign'></i>  &nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;

      </a>
        <br>
          <span class='p'>
          ".$json["response"]["data"][$i]["content"]."
          </span>

          </div>
  </li>";


  }

}else{
  echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Nothing ! </strong> No Data Found</div>";
}





?>
