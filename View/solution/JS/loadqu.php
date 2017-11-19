<?php
include "../../../Controller/Controller.php";
include "../../../Controller/URL.php";
$con = new Controller();
$cnt=0;
$lim=0;
$cv=0;
if(empty($_SESSION["lim"])){$lim=5;}else{$lim = $_SESSION["lim"];}
$fj = "";
$langid =$_SESSION["lang_id"];

$generate = array('languages_id' => $langid, 'limit' => $lim);
$jsondata = json_encode($generate);
$json = $con->cUrl_Call(Get_QueryData_by_Language_ID_for_Solution,$jsondata);

if($json["response"]["error_code"]!=201){
  $arrayData = (array)$json["response"]["data"];
for($i=0;$i<count($arrayData);$i++){

  echo "<li style='width:305px;word-break:break-all'><a href='#' onclick='getqdata(".'"'.$json["response"]["data"][$i]["_id"].'"'.")' data-target='#exampleModal-".$json["response"]["data"][$i]["_id"]."' data-whatever='@mdo' data-toggle='modal'><small> <b>".($i+1)."</b>. " .$json["response"]["data"][$i]["content"] ." </small> </a><a href='#' onclick='getq(".'"'.$json["response"]["data"][$i]["_id"].'","'.$json["response"]["data"][$i]["content"].'"'.")'><i class='fa fa-question-circle pull-right'></i></a> </li>";
  echo "<div class='modal fade bs-example-modal-lg' id='exampleModal-".$json["response"]["data"][$i]["_id"]."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'>
  <div class='modal-dialog modal-lg' role='document'>


  <div class='modal-content'>
    <div class='modal-header'>

      <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  <h4 class='modal-title'>In Details</h4>
    </div>
    <div class='modal-body'>
  <div class='row'>

  <div class='col-md-4'>
    <div class='well'>
    <div class='box box-widget'>
                <div class='box-header with-border'>
                  <div class='user-block'>
                    <img class='img-circle' src='View/userimg/".$json["response"]["data"][$i]["userinfo"][0]["image"]."' alt='User Image'>
                    <span class='username'><a href='#'>".$json["response"]["data"][$i]["userinfo"][0]["name"]."</a></span>
                    <span class='description'>".$json["response"]["data"][$i]["userinfo"][0]["email"]."</span>
                  </div>
                  <!-- /.user-block -->

                  <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class='box-body' style='width:220px;word-break:break-all'>
                  <!-- post text -->
                ".$json["response"]["data"][$i]["content"]."
                <p>
                  <small class='text-muted'>".date('jS M y g:ia',strtotime($json["response"]["data"][$i]["datetime"]))."</small> </span>
                </p>

                </div>

              </div>
</div>
</div>
<div class='col-md-8' id='dataimg-".$json["response"]["data"][$i]["_id"]."'>

</div>




    </div>
  </div>
</div>
  </div>
  </div>";
}
}else{
  echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Nothing ! </strong> No Data Found</div>";
}

?>
