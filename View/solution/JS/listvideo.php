<?php
include "../../Model.php";
$m = new Model;
$id=0;
if(!empty($_POST['id']))
{
  $id = $_POST['id'];
  $rty = mysql_query("select * from video_master where s_id=$id and v_block=0");
if(mysql_num_rows($rty)>0){
  while($rs = mysql_fetch_array($rty)){
    echo "
      <div class='box-tools dropdown pull-right label'>
  <a id='dLabel' data-target='#' href='' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false' style='color:black;'><small><big><big><b><i class='fa fa-gear'></i></b></big></big></small>
   
  </a>

  <ul class='dropdown-menu' aria-labelledby='dLabel' style='color:black'>
  <li id='ed' data-toggle='modal' data-target='#exampleModal-51' data-whatever='@mdo'><a href='#'><small><i class='glyphicon glyphicon-pencil'></i> &nbsp;&nbsp; Edit Video</small></a></li>
  <li id='edr' onclick='getdelimg(51);loadingmsg2(51)' data-toggle='modal' data-target='#exampleModal22-51' data-whatever='@mdo'><a href='#'><small><i class='glyphicon glyphicon-trash'></i> &nbsp;&nbsp;  Trash Video</small></a></li>
  </ul>
    <span class='text'> 
</div>
    <li style='background-color:white;'>
    <br />
    
   <div class='attachment-block clearfix'>
                 <div class='itemsContainer'>

    <div class='image'> <a href='#'>  <img src='View/thumbnails/".$rs['v_thmub']."' height='100px' width='150px' /> </a></div>
    <div class='play'> <a href='#' onclick='playvideo(".$rs['v_id'].",".$id.")'><img src='View/userimg/play2.png' height='50px' width='50px' /> </a> </div>
</div>

                <div class='attachment-pushed'>
                  <h4 class='attachment-heading'> &nbsp;&nbsp;  <a href='#'><b>".$rs['v_caption']."</b></a>  </h4>
                   <p></p> 
                  
                  <div class='attachment-text' style='margin-left:10px'>
                    
                      ".$rs['v_desc']."
                  <br>
                  <small class='pull-right'>".date("g:ia",strtotime($rs['v_time']))." on ".date("jS M y",strtotime($rs['v_date']))."</small>
                   </div>
                  <!-- /.attachment-text -->
                </div>
                <!-- /.attachment-pushed -->
              </div>

      </span>
    </li>
    <p></p>";



  }
}else
{echo "No Video Uploaded !";}
}
else{

}


?>
