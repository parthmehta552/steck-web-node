<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Stecker Code</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php include "View/CSS_JS_Links/CSS_Links.php"; ?>
<script>
  var timerstart = Date.now();
</script>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
  <!-- The Right Sidebar -->

<div class="wrapper">

  <?php include "View/header_footer/header.php"; ?>

  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Activity
          <small id="time"></small>
        </h1>

      </section>
      <!-- Main content -->
      <section class="content">


        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Current Feed

</h3>
          </div>
          <div class="box-body">
            The great content goes here
          </div>
          <!-- /.box-body -->
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

<?php include "View/CSS_JS_Links/JS_Links.php"; ?>
<script src="View/home/JS/js.js"></script>
</body>
</html>
