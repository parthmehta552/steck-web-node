<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Stecker Code</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <?php include "View/CSS_JS_Links/CSS_Links.php"; ?>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
<?php include "View/header.php"; ?>

  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <br>
<div class="alert alert-warning alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Hello Testing User ! </strong> This website is underconstruction so you are the testing user, if you have any valueable advise for improve this website then give it to us on this email address steckeradvise@gmail.com  Thanks !</div>
      <section class="content-header">
        <h1>
          Inside Activity
          <small></small>
        </h1>

      </section>

      <!-- Main content -->
      <section class="content col-md-8">

        <div class="box box-widget">
        <div class="box-header with-border">
          <div class="user-block">
            <img class="img-circle" src="View/userimg/avatar5.png" alt="User Image">
            <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
            <span class="description">Shared publicly - 7:30 PM Today</span>
          </div>
          <!-- /.user-block -->
          <div class="box-tools">
            <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Mark as read">
              <i class="fa fa-circle-o"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <img class="img-responsive pad" style="height:300px;width:300px" src="View/userimg/Desert.jpg" alt="Photo">

          <p>I took this photo this morning. What do you guys think?</p>
          <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
          <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
          <span class="pull-right text-muted">127 likes - 3 comments</span>
        </div>
        <!-- /.box-body -->
        <div class="box-footer box-comments">
          <div class="box-comment">
            <!-- User image -->
            <img class="img-circle img-sm" src="View/userimg/avatar3.png" alt="User Image">

            <div class="comment-text">
                  <span class="username">
                    Maria Gonzales
                    <span class="text-muted pull-right">8:03 PM Today</span>
                  </span><!-- /.username -->
              It is a long established fact that a reader will be distracted
              by the readable content of a page when looking at its layout.
            </div>
            <!-- /.comment-text -->
          </div>
          <!-- /.box-comment -->
          <div class="box-comment">
            <!-- User image -->
            <img class="img-circle img-sm" src="View/userimg/avatar5.png" alt="User Image">

            <div class="comment-text">
                  <span class="username">
                    Luna Stark
                    <span class="text-muted pull-right">8:03 PM Today</span>
                  </span><!-- /.username -->
              It is a long established fact that a reader will be distracted
              by the readable content of a page when looking at its layout.
            </div>
            <!-- /.comment-text -->
          </div>
          <!-- /.box-comment -->
        </div>
        <!-- /.box-footer -->
        <div class="box-footer">
          <form action="#" method="post">
            <img class="img-responsive img-circle img-sm" src="View/userimg/avatar04.png" alt="Alt Text">
            <!-- .img-push is used to add margin to elements next to floating images -->
            <div class="img-push">
              <input type="text" class="form-control input-sm" placeholder="Press enter to post comment">
            </div>
          </form>
        </div>
        <!-- /.box-footer -->
      </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <?php include "View/footer.php"; ?>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<?php include "View/CSS_JS_Links/JS_Links.php"; ?>
</body>
</html>
