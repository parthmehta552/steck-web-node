<?php
include "../../Model.php";
$m = new Model;
$vid =0;
$sid =0;
if(!empty($_POST['vid']) && !empty($_POST['sid'])){
    $vid =$_POST['vid'];
    $sid =$_POST['sid'];
    $video = mysql_query("select * from video_master where v_id=$vid and s_id=$sid");
    $rw = mysql_fetch_array($video);

    echo "<div class='box box-solid bg-teal-gradient'>
            <div class='box-header ui-sortable-handle'>
              <i class='fa fa-play'></i>

              <h3 class='box-title'>".$rw['v_caption']."</h3>

              <div class='box-tools pull-right'>
                <button type='button' class='btn bg-teal btn-sm' data-widget='collapse'><i class='fa fa-minus'></i>
                </button>
                <button type='button' class='btn bg-teal btn-sm' data-widget='remove'><i class='fa fa-times'></i>
                </button>
              </div>
            </div>
            <div class='box-body border-radius-none'>
            <center>
            <video  autoplay controls>
  <source src='View/s_video/".$rw['v_path']."' type='video/mp4'>
  Your browser does not support HTML5 video.
</video>
</center>
            </div>
            <!-- /.box-body -->
            <div class='box-footer no-border'>
              
            </div>
            <!-- /.box-footer -->
          </div>";    

}
?>