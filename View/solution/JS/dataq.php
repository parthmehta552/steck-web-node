<?php
include "../../../Controller/Controller.php";
include "../../../Controller/URL.php";

$con = new Controller();
$id =0;
$jsondata = $_POST["jsondata"];
$json = $con->cUrl_Call(Get_Images_By_Id,$jsondata);
$arrayData = (array)$json["response"]["data"];
if($json["response"]["error_code"]!="201"){
  echo "<div class='well'><div id='carousel-example-generic' class='carousel slide' data-ride='carousel'>


                <div class='carousel-inner'>";



for($i=0;$i<count($arrayData);$i++){
    if($i==0)
    {
      echo "
    <div class='item active'>
      <img src='View/userimg/".$json["response"]["data"][$i]["path"]."' style='height:500px;width:1500px' alt='First slide'>
        <br>
        <div class='box box-primary' style='width:525px;word-break:break-all'><div class='well'><b> Caption : ".$json["response"]["data"][$i]["caption"]."</b></div></div>
    </div>
    ";
  }else{
    echo "
  <div class='item'>
    <img src='View/userimg/".$json["response"]["data"][$i]["path"]."' style='height:500px;width:1500px' alt='First slide'>
<br>
    <div class='box box-primary' style='width:525px;word-break:break-all'><div class='well'><b> Caption : ".$json["response"]["data"][$i]["caption"]."</b></div></div>

  </div>
  ";
  }

}
  echo "</div>
                  <a class='left carousel-control' href='#carousel-example-generic' data-slide='prev'>
                    <span class='fa fa-angle-left'></span>
                  </a>
                  <a class='right carousel-control' href='#carousel-example-generic' data-slide='next'>
                    <span class='fa fa-angle-right'></span>
                  </a>
                </div></div>";

}else{
  echo "<center>No Images for this query</center>";
}
?>
