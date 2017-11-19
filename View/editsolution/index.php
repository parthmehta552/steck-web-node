<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Stecker Code</title>
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="View/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="View/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="View/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="View/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  
</head>
<body class="hold-transition skin-blue layout-top-nav">
<!-- Automatic element centering -->
<div class="wrapper">
 <?php include "View/header_footer/header.php"; ?>
   
    <div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Edit your answer
           
              </h3>
              <!-- tools box -->
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad" id="data">
                 <textarea id="war" name="war" rows="10" cols="80"> 
                <?php echo $_SESSION['solution'];?>
                 </textarea>
                   <p id="msgt"></p>
         <div class="pull-right box-tools">
             <a href="?sc=solution"> <button type="button" id="cancel" class="btn btn-danger btn-sm" >
                  Cancel and Back </button></a>
                  <a href="#"><button type="button" id="savebtn" class="btn btn-success btn-sm">Save </button> </a>
              </div>
            </div>
               
              
            </div>
			
            
            
        </div> 
        
    </div>
    
    </div>
  
    </div>



<script src="View/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="View/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="View/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="View/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="View/dist/js/demo.js"></script>
<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="View/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
    <?php include 'JS/js.php';?>
        </script>
        
</body>
</html>
