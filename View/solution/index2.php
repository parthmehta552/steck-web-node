<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Stecker Code</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php include "View/CSS_JS_Links/CSS_Links.php"; ?>

  <style>
 .itemsContainer {
    background:red;
    float:left;
    position:relative
}
.itemsContainer:hover .play{display:block}
.play{
  position : absolute;
    display:none;
    top:20%;
    width:40px;
    margin:0 auto; left:0px;
    right:0px;
    z-index:100
}

video{
    min-width:100%;
    min-height:100%;
}
  </style>


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
            Solution for <?php echo $_SESSION["lang_name"]; ?>
          <small></small>
        </h1>

      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">

          <div class="col-md-4">
            <div class="box">
              <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
      <li class=""><a aria-expanded="false" href="#tab_1" data-toggle="tab"> Most Discussed</a></li>
      <li class="active"><a aria-expanded="true" href="#tab_2" data-toggle="tab"> Queries</a></li>

      </ul>
      <div class="tab-content">
      <div class="tab-pane" id="tab_1">

        <div class="box-body">
          <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="#"><i class="fa fa-inbox"></i> Inbox
                <span class="label label-primary pull-right">12</span></a></li>
            </ul>
          </div>

        </div>




      </div>
      <!-- /.tab-pane -->
      <div class="tab-pane active" id="tab_2">
        <div class="box-header with-border">
          <div class="input-group">
                <div class="input-group-btn">
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Search
                    <span class="fa fa-caret-down"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="#" id="inquerybtn">in Query</a></li>


                  </ul>
                </div>
                <!-- /btn-group -->
                <input type="text" id="querycontent" class="form-control">
              </div>
              <small><a href="#" id='getallq' class="pull-right">Get All Queries</a></small>
        </div>
        <div class="box-body">
          <div class="box-body no-padding">
            <div class="slimScrollDiv" style="overflow: scroll;overflow-x: hidden; width: auto; height: 295px;">
            <ul class="todo-list ui-sortable" id="q">



            </ul>

          </div>
          </div>

          <br>
          <a href="#">  <i class="label pull-right bg-green pull-left" id="less">Less</i></a>
<a href="#">         <i class="label pull-right bg-green pull-right" id="more">More</i></a>

          </div>




      </div>
      <!-- /.tab-pane -->

      <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
      </div>



                      </div>

          <!-- /. box -->



          <!-- /.box -->

        </div>
        <!-- Editor -->
        <div class="col-md-8">

                  <div class="box">
                    <!-- /.box-header -->

                      <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a aria-expanded="true" href="#tab_3" data-toggle="tab"> Solve Here</a></li>
              <li class=""><a aria-expanded="false" href="#tab_4" data-toggle="tab"> Your solutions</a></li>
              <li class=""><a aria-expanded="false" href="#tab_5" data-toggle="tab"> Trash solutions</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_3">

                <form method="post" name="form1" id="form1">
                  <b><span class="glyphicon glyphicon-question-sign"></span>&nbsp;<big id="query" style="width:450px;word-break:break-all">No Selected Query</big></b>
                  <br><br>
                      <textarea id="war" name="war" placeholder="Describe your solution in proper way that the other can understand and more exploer it" rows="10" cols="80" required="required">


                      </textarea>
                      <small class="pull-right">Minimum 50 letters</small>

                      <i id="msg"></i>
                      <br>
                    <div id="btn"></div>

                </form>
                <br>
                <div class="box box-primary">
                  <div class="box-header">Preview</div>
                  <div class="box-body" id="preview" ></div>

                 </div>


        </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_4">
                <p id="msgr"></p>
                <small>

                <ul class="timeline" id="answer">


                          </ul>
</small>




<div class="box-footer">
 <center><a href="#"><small class="label pull-left bg-green" id="lessans" ><i>Less</i></small></a> <a href="#"><small class="label pull-right bg-green" id="moreans"><i>More</i></small></a></center>
</div>




              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_5">

                <p id="msgrs"></p>
                <small>
                <ul class="timeline" id="deletedanswer">
                            <!-- timeline time label -->
                            <!-- END timeline item -->
                            <!-- timeline item -->

                            <!-- END timeline item -->

                          </ul>
                </small>




                <div class="box-footer">
                <center><a href="#"> <small class="label pull-left bg-green" id="lessdans" ><i>Less</i></small></a> <a href="#"><small class="label pull-right bg-green" id="moredans"><i>More</i></small></a></center>
              </div>
                </div>

              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>

</div>
  <!-- /.box-body -->

</div>



                </div>



        </div>



        <!-- The sidebar's background -->
        <!-- This div must placed right after the sidebar for it to work-->





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
<script src="View/solution/JS/js.js"></script>
<script src="View/query/JS/other.js"></script>
<script>
$('#editor1').focusout(function(){
var test = $('#editor1').val();
$('#e1').html(test);

});
$("#form1").submit(function() { return false; });


</script>
</body>
</html>
