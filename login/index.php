<?php 
  include_once '../controller/session_functions.php';
  login_page_session_check();
 ?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="" content="" />
  <meta names="" content="" />

  <title>Dinesh Billing Software</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- icheck -->
  <link rel="stylesheet" href="css/plugins/icheck/all.css">
  <!-- Theme CSS -->
  <link rel="stylesheet" href="css/style.css">
  <!-- Color CSS -->
  <link rel="stylesheet" href="css/themes.css">


  <!-- jQuery -->
  <script src="js/jquery.min.js"></script>

  <!-- Nice Scroll -->
  <script src="js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
  <!-- Validation -->
  <script src="js/plugins/validation/jquery.validate.min.js"></script>
  <script src="js/plugins/validation/additional-methods.min.js"></script>
  <!-- icheck -->
  <script src="js/plugins/icheck/jquery.icheck.min.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/eakroko.js"></script>

  <script type="text/javascript" src="js/login.js"></script>

 

</head>

<body class='login'>
  <div class="wrapper">

    <div class="login-body" id="login">
      <h2>Sign In</h2>
      <form action=""  class='form-validate' id="login_form">
        <div class="form-group">
          <div class="email controls">
            <input type="text" name='' id="ph_no" placeholder="Mobile Number" class='form-control' data-rule-required="true" required="" >
          </div>
        </div>

        <div class="submit">
          <div class="remember">
            <input type="checkbox" name="remember" class='icheck-me' data-skin="square" data-color="blue" id="remember">
            <label for="remember">Remember me</label>
          </div>
          <input type="submit" id="buttonlogintoregister" value="Sign me in" class='btn btn-primary'>
        </div>
      </form>
      <div class="forget">
        <a href="#">
          <span>Forgot password?</span>
        </a>
      </div>
      <p  id="response"></p>
    </div>
        <div class="login-body" id="otp">
      <h2>OTP</h2>
      <form action=""  class='form-validate' id="otp_form">
        <div class="form-group">
          <div class="email controls">
            <input type="password" name='' placeholder="Password" id="otp_content" class='form-control'  required="">
          </div>
        </div>

        <div class="submit">
          <input type="submit" id="buttontologin"  value="Submit" class='btn btn-primary'>
        </div>
        <div id="mobile">
        <p id="mobile_otp"> </p>
        </div>
      </form>
      <div class="forget">
        <a href="#">
          <span></span>
        </a>
      </div>
      <p  id="footer_response"></p>

    </div>
  </div>
</body>

</html>