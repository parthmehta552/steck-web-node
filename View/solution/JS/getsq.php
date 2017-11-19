<?php
include "../../Model.php";
$m = new Model;
$cnt=0;
$q="";
$fj = "";
$langid =$_SESSION["lang_id"];
if(!empty($_POST['q'])){
  $q=$_POST['q'];
$data = mysql_query("select * from query_master where (q_block=0 and lang_id=$langid) and q_content LIKE '%$q%'");
if(mysql_num_rows($data)>0){
while($r1 = mysql_fetch_array($data))
{
  $cnt+=1;

?>

<a href="#" onclick="getq(<?php echo $r1['q_id'];?>)"><small class="btn btn btn-xs pull-right" ><i class="glyphicon glyphicon-share-alt"></i></small></a>
<li><a href="#" data-toggle="modal" onclick="getqdata(<?php echo $r1['q_id'];?>);getqdataloading(<?php echo $r1['q_id'];?>);" data-target="#exampleModal-<?php echo $r1['q_id'];?>" data-whatever="@mdo"><i class="fa fa-lightbulb-o text-yellow"></i><small> <?php echo $cnt." : ".$r1['q_content']; ?></small> </a></li>


<div class="modal fade bs-example-modal-lg" id="exampleModal-<?php echo $r1['q_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal-dialog modal-lg" role="document">


<div class="modal-content">
  <div class='modal-header'>

    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
<h4 class='modal-title'>In Details</h4>
  </div>
  <div class="modal-body" id="data-<?php echo $r1['q_id']; ?>">






    </div>

</div>
</div>
</div>






<?php
  }

}else {
  echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Nothing ! </strong> No Data Found</div>";

}


}else{

echo "<script>refre();refre2();</script>";

}

?>
