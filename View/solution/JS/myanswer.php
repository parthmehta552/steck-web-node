<?php
include "../../../Controller/Controller.php";
include "../../../Controller/URL.php";
$con = new Controller();
$cnt=0;
$to="";
$f1 = '"';
$f2 = '"';

$limans=0;
if(!empty($_SESSION['limans'])){
  $limans = $_SESSION['limans'];
}else{
  $limans =3;
}
$langid=$_SESSION['lang_id'];
$userid = $_SESSION['userdata']['id'];
$generate = array('users_id' => $userid, 'languages_id' => $langid , 'limit' => $limans);
$jsondata = json_encode($generate);
$json = $con->cUrl_Call(Get_Solution_ByUser,$jsondata);
if($json["response"]["error_code"]!=201){
  $arrayData = $json["response"]["data"];
for($i=0;$i<count($arrayData);$i++)
{
  $cnt+=1;
if($cnt%2==0)
{
$to="default";
}else{
  $to="success";
}
?>



<li>
  <i class="glyphicon glyphicon-heart bg-blue"></i>

  <div class="timeline-item">

  <div class="box box-<?php echo $to; ?> collapsed-box box-solid">
              <div class="box-header with-border">
                <h6 class="box-title"><?php echo $json["response"]["data"][$i]["getSolution_info"]["content"];?></h6>
<div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
                <!-- /.box-tools -->
              </div>
              <!-- /.box-header -->
              <div class="box-body">






    <span class="time pull-right">&nbsp;&nbsp;<span data-toggle="tooltip" title="" data-original-title="<?php echo $json["response"]["data"][$i]["getSolution_info"]["query_answertime"]. " times answered" ?>"> <i class="glyphicon glyphicon-globe"></span></i> &nbsp;  <span data-toggle="tooltip" title="" data-original-title="<?php echo date("g:ia jS M y",strtotime($json["response"]["data"][$i]["datetime"])); ?>"> <i class="glyphicon glyphicon-time"></i></span>
    <div class='dropdown label'>
    <a id='dLabel' data-target='#' href='' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false' style='color:black;'><big><i class='glyphicon glyphicon-option-vertical'></i></big></span>
    </a>

    <ul class='dropdown-menu' aria-labelledby='dLabel' style='color:black'>
      <li id='View'><a href='#' data-toggle="modal" data-target="#exampleModal-<?php echo $json["response"]["data"][$i]["_id"];?>" data-whatever="@mdo"><i class="fa fa-eye"></i><small>View</small></a></li>

      <li id='editanswer'><a href='?sc=editsol&id=<?php echo $json["response"]["data"][$i]["_id"];?>'> <i class="fa fa-pencil"></i><small>Edit</small></a></li>
      <li id='videoupload'><a href='#' data-toggle="modal" onclick="listvideo(<?php echo $y[0];?>)" data-target="#exampleModalVU-<?php echo $y[0];?>" data-whatever="@mdo" ><i class="fa  fa-play-circle-o"></i><small>Add / View videos</small></a></li>

      <li id='deleteanswer'><a href='#' onclick="deleteans(<?php echo "'" .$json["response"]["data"][$i]["_id"]. "'"; ?>)"><i class="fa fa-trash-o"></i> <small>Delete</small></a></li>

    </ul>
    </div>


  </span>

    <h3 class="timeline-header"><img src="View/userimg/<?php echo $json["response"]["data"][$i]["getSolution_info"]["userinfo"][0]["image"]; ?>" height="40px" width="40px" class="img-circle"> <a href="#" >&nbsp;<?php echo $json["response"]["data"][$i]["getSolution_info"]["userinfo"][0]["name"];?> <small>Query owner</small></a></h3>
<hr>

    <div class="timeline-body" style="width:auto;height:auto;overflow:scroll;">
      <?php
      echo $con->read_file($json["response"]["data"][$i]["content"]);
        ?>
    </div>
    <div class="timeline-footer">

    </div>



</div>
<!-- /.box-body -->
</div>

</div>
<!--View Answer-->
<div class="modal fade bs-example-modal-lg" id="exampleModal-<?php echo $json["response"]["data"][$i]["_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
  <div class='modal-header'>
    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
<h4 class='modal-title'>Solution of : <?php echo $json["response"]["data"][$i]["getSolution_info"]["content"];?> </h4>
  </div>
  <div class="modal-body">
    <?php
    echo $con->read_file($json["response"]["data"][$i]["content"]);
            ?>
</div>
</div>
</div>
</div>
<!--End View Answer-->
<!--Upload Video-->
<div class="modal fade bs-example-modal-lg" id="exampleModalVU-<?php echo $y[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
  <div class='modal-header'>
    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
<h4 class='modal-title'>Video Upload of : <?php echo $y[4];?> </h4>
  </div>
  <div class="modal-body well">
<p id="videomsg-<?php echo $y[0]; ?>"></p>
<p id="videoplay-<?php echo $y[0]; ?>"></p>

<div class="row">
<div class="col-md-4">
  <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Video Upload</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->

                <div class="box-body">
                  <div class="form-group">
              <input type="text" class="form-control" required="required" id="caption-<?php echo $y[0]; ?>" placeholder="Enter caption" maxlength="100">
              </div>
              <div class="form-group">
              <textarea class="form-control" id="desc-<?php echo $y[0]; ?>" placeholder="Enter Description"></textarea>
              </div>
  <br>

                                  <div class="form-group">
                    <input type="file" name="videofile" id="videofile-<?php echo $y[0]; ?>">
                    <p class="help-block">MP4 Videos are allowed !</p>
                    </div>


                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <button type="submit" onclick="uploadvideo(<?php echo $y[0]; ?>)" class="btn btn-primary">Submit</button>
                </div>


</div>
</div>

<div class="col-md-8">
  <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Uploaded Videos</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form">
                <div class="box-body well">
                <div class="slimScrollDiv" style="overflow: scroll;overflow-x: hidden; width: auto; height: 250px;">
                <ul class="todo-list ui-sortable" id="listvideo-<?php echo $y[0]; ?>">

                </ul>
                </div>

                <!-- /.box-body -->

                              </form>
            </div>


</div>

</div>




</div>
</div>
</div>
</div>

<!--End Upload Video-->



<div class="modal fade bs-example-modal-lg" id="exampleModal1-<?php echo $y[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal-dialog modal-lg" role="document">


<div class="modal-content">
  <div class='modal-header'>

    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
<h4 class='modal-title'>Edit answer of : <?php echo $y[4];?></h4>
  </div>
  <div class="modal-body">
    <textarea id="w<?php echo $y[0]; ?>" class="editor" name="w<?php echo $y[0]; ?>" rows="40" cols="80" required="required">
      <?php
        $myfile = fopen("../../S_Files/".$y[1],"r") or die("Unable to open");
              echo fread($myfile,filesize("../../S_Files/".$y[1]));
              fclose($myfile);
              ?>


    </textarea>
    <p id="msgt"></p>
    <div class='modal-footer'>
      <p id="updatemsg"></p>
<button type='submit' id='dn' name='dn' onclick="updateans(<?php echo $y[0];?>)" class='btn btn-primary pull-right'>Submit</button>
  </div>
    </div>

</div>
</div>
</div>
</li>
<?php
}
}else{

  echo "<center><div class='well'>No data found !</div></center>";

  }
