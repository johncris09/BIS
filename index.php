<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <?php include('assets/csslink.php'); ?>
  <link href="https://fonts.googleapis.com/css?family=Coiny|Lato|Montserrat|Open+Sans|Raleway|Roboto|Sarabun" rel="stylesheet">
  
  <style>
    h3.text-primary{
      font-family: 'Coiny', cursive;
    }
  </style>


</head>
<body>
  
		<!-- start: page -->
  <section class="body-sign">
    <div class="center-sign">
      <div class="logo pull-left">
        <h3 class=" text-primary ">Barangay Information System</h3>
        
      </div>
      

      <div class="panel panel-sign">
        <div class="panel-title-sign mt-xl text-right">
          <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
        </div>
        <div class="panel-body">
          <form action="admin/" method="post">
            <div class="form-group mb-lg">
              <label>Username</label>
              <div class="input-group input-group-icon">
                <input name="username" type="text" class="form-control input-lg" autofocus required/>
                <span class="input-group-addon">
                  <span class="icon icon-lg">
                    <i class="fa fa-user"></i>
                  </span>
                </span>
              </div>
            </div>

            <div class="form-group mb-lg">
              <div class="clearfix">
                <label class="pull-left">Password</label>
                <a href="pages-recover-password.html" class="pull-right">Lost Password?</a>
              </div>
              <div class="input-group input-group-icon">
                <input name="pwd" type="password" class="form-control input-lg" required/>
                <span class="input-group-addon">
                  <span class="icon icon-lg">
                    <i class="fa fa-lock"></i>
                  </span>
                </span>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-8">
                <div class="checkbox-custom checkbox-default">
                  <input id="RememberMe" name="rememberme" type="checkbox"/>
                  <label for="RememberMe">Remember Me</label>
                </div>
              </div>
              
              <div class="col-sm-4 text-right">
                <button type="submit" class="btn btn-primary hidden-xs"><i class="fa fa-user"></i> Sign In</button>
                <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg"><i class="fa fa-user"></i>  Sign In</button>
              </div>
              
            </div>

            <span class="mt-lg mb-lg line-thru text-center text-uppercase">
              <span>or</span>
            </span>
          </form>
        </div>
      </div>
      

      <p class="text-center text-muted mt-md mb-md">&copy; Copyright <?php echo date("Y");?>. All rights reserved. </p>
			
    </div>
  </section>
  

  <?php include('assets/jslink.php');  ?>
</body>
</html>