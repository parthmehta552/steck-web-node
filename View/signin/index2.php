<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Stecker Code</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<?php include "View/CSS_JS_Links/CSS_Links.php"; ?>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="?sc=Blank"><b>Stecker</b>Code</a>
  </div>
  <!-- /.login-logo -->
  <p id="msg"></p>
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
	<center>
	<img src="View/userimg/avatar5.png" id="imgs" height="100px" width="100px" class="img-circle" alt="">
<p id="res"></p><p id="username"></p>
	</center>
  <form id="frm" name="frm"  method="post">
      <div class="form-group has-feedback">
        <input type="email"  class="form-control" maxlength="30" placeholder="Email" name="email" id="email"  required="required">
	<p id="msg33"></p>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control"  placeholder="Password" name="pwd" id="pwd" required="required">
      </div>
      <div class="row">
        <div class="col-xs-6">
          <button type="submit" id="done" name="done" class="btn btn-sm btn-primary btn-block btn-flat">Sign In</button>
          </div>
  
      </div>
</form>
      <br>
      <div class="row">
        <div class="col-xs-6 pull-right">
  <a href="?sc=signup" id="other" class="text-center"><button type="button" class="btn btn-sm bg-purple btn-block btn-flat">Sign up</button></a>
  </div>
      <div class="col-xs-6">
    <button type="button" class="btn btn-sm btn-block btn-default btn-flat">Forgot password ?</button>
    </div>
</div>
    <br>
<div class="row">
  </div>
  </div>
  <br>
  
</div>
<?php include "View/CSS_JS_Links/JS_Links.php"; ?>
<script src="View/signin/JS/js.js"></script>
<script>

$('#frm').submit(function(){
return false;
});
	$('#email').blur(function(){
	var x = $('#email').val();
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");

    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
      document.getElementById("msg33").innerHTML = "Invalid Email Address";
	$('#email').val('');
        return false;
    }
});
</script>
</body>
</html>
