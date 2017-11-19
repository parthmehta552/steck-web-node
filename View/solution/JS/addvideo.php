<?php
include "../../Model.php";
$m = new Model;
$target_dir = "";
$target_file="";
$data_date= date("Y-m-d");
$data_time = date('h:i:s');
$sid = $_POST['id'];

$ffmpeg = "..\\..\\ffmpeg\\ffmpeg";
$paths = "..\\..\\thumbnails\\";
$filename = rand(0,99999).".jpg";
$size = "170x120";
$getfromsecond = 25;

$caption = $_POST['caption'];
$desc = $_POST['desc'];

$file="";
if(isset($_FILES['file'])){
 if ( 0 < $_FILES['file']['error'] ) {
   echo "<div class='alert alert-warning alert-dismissible'>
   <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
        <h4>Oops !</h4>
            <p>Something went wrong !</p>
      </div>";
    }
    else {
      $file = $_FILES['file']['name'];
      $target_file="../../s_video/" . $_FILES['file']['name'];
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      if($imageFileType != "mp4")
      {
        echo "<div class='alert alert-warning alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
             <h4>Ohhh !</h4>
                 <p>Your video should be MP4 file !</p>
           </div>";

      }else {
        if(!empty($_POST['caption']) && !empty($_POST['desc'])){

         move_uploaded_file($_FILES['file']['tmp_name'], $target_file);

          $videoFile = $_FILES['file']['tmp_name'];
          $cmd = "$ffmpeg -i "."..\\..\\s_video\\".$file." -an -ss $getfromsecond -s $size  ".$paths."$filename";
          //echo $cmd;
          shell_exec($cmd);
             

           mysql_query("insert into video_master (v_path,v_thmub,v_caption,v_desc,v_date,v_time,s_id,v_block) values('$file','$filename','$caption','$desc','$data_date','$data_time',$sid,0)");
           echo "<div class='alert alert-success alert-dismissible'>
           <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <h4>Great !</h4>
                    <p>Your video is uploaded !</p>
              </div>";
            }else{
              echo "<div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                   <h4>Error !</h4>
                       <p>You are missing something to fill or choose file !</p>
                 </div>";
            }
      }
}

}else{
  echo "<div class='alert alert-danger alert-dismissible'>
  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
       <h4>Error !</h4>
           <p>You are missing something to fill or choose file !</p>
     </div>";
}

?>
