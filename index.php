<?php
  session_start();
  if(isset($_SESSION['login_account_id'])){
    if($_SESSION['status'] == 0){
      header('location: admin/index.php');
    }else{
      header('location: staff/index.php');
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->

    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="assets/stylesheets/theme.css" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

    <!-- Head Libs -->
    <script src="assets/vendor/modernizr/modernizr.js"></script>
    <link rel="stylesheet" href="assets/stylesheets/animate.css">
    <link href="https://fonts.googleapis.com/css?family=Coiny|Lato|Montserrat|Open+Sans|Raleway|Roboto|Sarabun" rel="stylesheet">
    
    <style>
      h3.text-primary{
        font-family: 'Coiny', cursive;
      }
      
    </style>
  </head>
  <body>
    <!-- start: page -->
    <section  class="body-sign">
      <div class="center-sign">
        <div class="logo pull-left">
          <h3 class=" text-primary animated rubberBand infinite">Barangay Information System</h3>
        </div>
        
        <div class="panel panel-sign ">
          <div class="panel-title-sign mt-xl text-right">
            <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
          </div>
          <div class="panel-body">
            <form  method="post">
              <div class="form-group mb-lg">
                <label for="username" id="label-username">Username</label>
                <div class="input-group input-group-icon">
                  <input id="username" type="text" class="form-control input-lg" autofocus/>
                  <span class="input-group-addon">
                    <span class="icon icon-lg text-primary">
                      <i class="fa fa-user"></i>
                    </span>
                  </span>
                </div>
                <label id="err_username" class="error"></label>
              </div>
              <div class="form-group mb-lg">
                <label for="password" id="label-password">Password</label>
                <div class="input-group input-group-icon">
                  <input id="password" type="password" class="form-control input-lg"/>
                  <span class="input-group-addon">
                    <span class="icon icon-lg text-primary">
                      <i class="fa fa-lock"></i>
                    </span>
                  </span>
                </div>
                <label id="err_password" class="error"></label>
              </div>
              <div class="row">
                <div class="col-sm-12 text-right">
                  <button type="button" id="log_in" class="btn btn-primary mt-lg btn-lg	 btn-block "><i class="fa fa-user"></i>  Log In</button>
                </div>
              </div>
            </form>
            <!-- Modal -->
            <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <div class="modal-wrapper">
                      <div class="modal-icon center ">
                        <i class="text-danger fa fa-exclamation-triangle"></i>
                      </div>
                      <div class="modal-text text-center">
                        <h4>Log In Failed</h4>
                        <p>Invalid Username/Password, Please Try Again</p>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <p class="text-center text-primary mt-md mb-md"><strong>  &copy; Copyright <?php echo date("Y");?>. All rights reserved. </strong></p>
      </div>
    </section>
    <!-- Vendor -->
    <script src=" assets/vendor/jquery/jquery.js"></script>
    <script src=" assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
    <script src=" assets/vendor/bootstrap/js/bootstrap.js"></script>
    <script src="assets/login.js"></script>
    <script src="assets/vendor/jquery-ui/js/jquery-ui.1.12.1.js"></script> 
    <script>
    $(document).ready(function(){
      // $('.icon').addClass('text-primary animated swing infinite fast');
      // $('.title').addClass('animated flipInX infinite slower');
    });
    </script>
  </body>
</html>