<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Stecker Code</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php include "View/CSS_JS_Links/CSS_Links.php"; ?>
</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <?php include "View/header_footer/header.php"; ?>

  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Settings
          <small></small>
        </h1>
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- left column -->
<div class="row">
  <div class="col-md-6">
        <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Change Password</h3>
                      </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" id="form1"  method="post">
                      <div class="box-body">
                        <div class="form-group has-feedback">
                          <input type="password" class="form-control" id="oldpwd" name="oldpwd" placeholder="Enter Old Password" required="required">

                        </div>

                        <div class="form-group has-feedback">
                          <input type="password" class="form-control" id="newpwd" name="newpwd" placeholder="Enter New Password" required="required">

                        </div>

                        <div class="form-group">
                        <p class="help-block" id="msg"></p>
                          
                        </div>

                      </div>
                      <!-- /.box-body -->

                      <div class="box-footer">
                        <button type="submit" id="pwddone" name="pwddone" class="btn btn-primary">Submit</button>
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
<script src="View/settings/JS/js.js"></script>
<script src="View/query/JS/other.js"></script>
<script>


$("#form1").submit(function() { return false; });


</script>

</script>
</body>
</html>
