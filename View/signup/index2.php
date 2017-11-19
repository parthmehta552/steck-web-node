<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Stecker Code</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php include "View/CSS_JS_Links/CSS_Links.php"; ?>
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="?sc=Blank"><b>Stecker</b>Code</a>
  </div>
 <p id="msg"></p>
  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>
     <div class="form-group has-feedback">
     <form name="form1" id="form1">
        <input type="text" class="form-control" maxlength="25"  name="uname" id="uname" placeholder="Full name" required="required">
          
       

      </div>
        <div id="ins11">
          <ul>
            <li><div class="text-xs-center" id="cap4">Only Letters are allowed</div></li>
           </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" maxlength="30" name="email" id="email" placeholder="Email" required="required">
      </div>
       <div id="ins12">
          <ul>
            <li><div class="text-xs-center" id="cap4">Please enter email in valid format</div></li>
           </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" maxlength="50" name="pwd" id="pwd"  placeholder="Password" required="required">
        </div>
        <div id="ins">
          <ul>

            <li><div class="text-xs-center" id="cap">Minimum with 8 length  </div></li>
            <li><div class="text-xs-center" id="cap1">Minimum One letter </div></li>
            <li><div class="text-xs-center" id="cap2">Minimum One capital letter</div></li>
            <li><div class="text-xs-center" id="cap3">Minimum One digit</div></li>

        </div>
        <div class="form-group has-feedback">
        <input type="password" class="form-control" maxlength="50" name="pwd" id="cpwd"  placeholder="Confirm Password" required="required">
        </div>
        <div id="ins1">
          <ul>
            <li><div class="text-xs-center" id="cap4">Password and Confirm password not matched</div></li>
           </div>
        </form>
        

        <br>
      <div class="row">

        <!-- /.col -->
        <div class="col-xs-6">
       
         <a href="#" id="done" name="done"> <button type="button" class="btn btn-sm btn-primary btn-block btn-flat">Sign up</button></a>
        </div>
        <!-- /.col -->
      </div>
      <br>
      <div class="row">
        <div class="col-xs-6 pull-right">
  <a href="?sc=signin" id="other" class="text-center"><button type="button" class="btn btn-sm bg-purple btn-block btn-flat">Sign in</button></a>

      </div>
</div>




  </div>

  <br>

 <p id="msg2"></p>

  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.3 -->
<?php include "View/CSS_JS_Links/JS_Links.php"; ?>
<script src="View/signup/JS/js.js"></script>

</body>
</html>
