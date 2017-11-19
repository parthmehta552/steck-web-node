<?php
include '../../../Controller/Controller.php';
include '../../../Controller/URL.php';

$con = new Controller;
$jsondata = $_POST['jsondata'];
$json = $con->cUrl_Call(Get_Images_By_Id,$jsondata);
$arryData = (array)$json["response"]["data"];

if($json["response"]["error_code"]=='200'){

echo "<div class='slimScrollDiv well' style='overflow: scroll;overflow-x:scroll;width:auto; height: 500px;'>
  <div class='row'>";


  for($i=0;$i<count($arryData);$i++){

      echo "<div class='col-md-12' id='undoimgdiv-".$json["response"]["data"][$i]["_id"]."'>
      <div class='box box-default collapsed-box'>
            <div class='box-header with-border'>
              <div class='row'>
              <div class='col-sm-6'>
                <img src='"."View/userimg/".$json['response']['data'][$i]['path']."' id='upimg-".$json["response"]["data"][$i]["_id"]."' class='img-thumbnail'  style='height:300px;width:300px' alt='ALT NAME'>
              </div>
              <div class='col-sm-5 well' id='upcaption-".$json["response"]["data"][$i]["_id"]."'>
                ".$json['response']['data'][$i]['caption']."</p>
               </div>
               </div>
              <div class='box-tools pull-right'>
                <button type='button' onclick='undoimg(".'"'.$json["response"]["data"][$i]["_id"].'"'.")' class='btn btn-box-tool'><i class='fa fa-undo'></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class='box-body' style='display: none;'>

              </div>
            <!-- /.box-body -->
          </div></div>";


}

}else{
  echo "<center>No images are deleted for this query !</center>";
}
?>
