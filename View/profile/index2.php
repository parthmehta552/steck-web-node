<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Stecker Code</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php include "View/CSS_JS_Links/CSS_Links.php"; ?>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <?php include "View/header_footer/header.php"; ?>

  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
        Profile

          <small></small>
        </h1>
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                <div class="modal-content img-circle">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="modal-body">
                      <center>
                    <img src="<?php echo "View/userimg/".$_SESSION["userdata"]["image"]; ?>" class="img-circle"  height="300px" width="300px" alt="User Image">
</center>
</div>

                </div>
                </div>
                </div>

      </section>

      <!-- Main content -->
      <section class="content">
<div class="row">

        <!-- left column -->
          <div class="col-md-6">
        <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">  Profile details</h3>
                      <small class="pull-right" id="refresh"></small>
                      </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <form role="form" id="form1" name="form1"  method="post">
                      <div class="box-body">

                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" maxlength="25" onkeyup="allLetter(document.form1.uname)" name="uname" id="uname" value="<?php echo $_SESSION['userdata']['name'];?>" placeholder="Full name" required="required">
                            <p id="msg2"></p>
                        </div>
                        <div class="form-group has-feedback">
                          <input type="email" class="form-control" maxlength="30" value="<?php echo $_SESSION['userdata']['email'];?>" name="email" id="email" placeholder="Email" required="required">

                        </div>
                     
                        <p id="msg4"></p>
          
                        </div>
                      <!-- /.box-body -->

                      <div class="box-footer">
                        <button type="submit" id="done" name="done" class="btn btn-primary">Submit</button>
                
                      </div>
                    </form>
                  </div>


                </div>
  <div class="col-md-6">
    <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"> Edit Profile Picture</h3>
                  <small class="pull-right" id="refreshimg"></small>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="frm2" action="final.php" enctype="multipart/form-data" method="post">
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-3">
                      <div class="form-group">
                      <img src="<?php echo "View/userimg/".$_SESSION["userdata"]["image"]; ?>" class="img-circle" data-toggle="modal" data-target="#exampleModal2" data-whatever="@mdo"  height="83px" width="83px" alt="User Image">
                     </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputFile">To update picture, Upload Picture</label>

                      <input type="file" name="sortpicture"  id="sortpicture" required="required">
                      </div>
                     </div>
                     </div>
                     <p id="msg3"></p>
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" id="upload" name="upload" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
  </div>
                        </div>



        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <?php include "View/header_footer/footer.php";?>
</div>
<!-- ./wrapper -->
<?php include "View/CSS_JS_Links/JS_Links.php"; ?>
<script src="View/profile/JS/js.js"></script>
<script>
function allLetter(inputtxt)
  {
   var letters = /^[A-Za-z\s]+$/;
   if(inputtxt.value.match(letters))
     {
      return true;
     }
   else
     {
       document.getElementById("msg2").innerHTML = "Please Enter only Letters in Full name";
       document.getElementById("uname").value = "";
       return false;
     }
  }
</script>
<script src="View/query/JS/other.js"></script>
<script>

$("#frm2").submit(function() { return false; });
</script>

<script>
$("#form1").submit(function(){
return false;

});
$('#done').hover(function(){

var x = $('#email').val();
  var atpos = x.indexOf("@");
  var dotpos = x.lastIndexOf(".");

  if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
    document.getElementById("msg4").innerHTML = "Invalid Email Address";
$('#email').val('');
      return false;
  }


});


</script>

</body>
</html>
