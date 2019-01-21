<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dasboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Specific Page Vendor CSS -->
  <link rel="stylesheet" href="../assets/vendor/pnotify/pnotify.custom.css" />
  <?php include('../component/csslink.php'); ?>
  <!--

  Css
  -->


</head>
<body>
  <section class="body">
    

    <?php include('../layout/header.php'); ?>
    <div class="inner-wrapper">

      <?php include('../layout/sidebar-left.php'); ?>
			
			<section role="main" class="content-body">
					<header class="page-header">
						<h2>Add New User</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
                <li><span>User</span></li>
                <li><span>Add New User</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

          <!-- Main Content -->
          <div class="row">
            <div class="col-xs-12">
              <section class="panel form-wizard" id="w4">
                <header class="panel-heading">
                  <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                    <a href="#" class="fa fa-times"></a>
                  </div>
          
                  <h2 class="panel-title">Form Wizard</h2>
                </header>
                <div class="panel-body">
                  <div class="wizard-progress wizard-progress-lg">
                    <div class="steps-progress">
                      <div class="progress-indicator" style="width: 0%;"></div>
                    </div>
                    <ul class="wizard-steps">
                      <li class="active">
                        <a href="#w4-account" data-toggle="tab"><span>1</span>Account Info</a>
                      </li>
                      <li>
                        <a href="#w4-profile" data-toggle="tab"><span>2</span>Profile Info</a>
                      </li>
                      <li>
                        <a href="#w4-billing" data-toggle="tab"><span>3</span>Barangay Position</a>
                      </li>
                      <li>
                        <a href="#w4-confirm" data-toggle="tab"><span>4</span>Confirmation</a>
                      </li>
                    </ul>
                  </div>
          
                  <form class="form-horizontal" novalidate="novalidate">
                    <div class="tab-content">
                      <div id="w4-account" class="tab-pane active">
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="w4-username" >Username</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="username" id="w4-username" autofocus required="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="w4-password">Password</label>
                          <div class="col-sm-9">
                            <input type="password" class="form-control" name="password" id="w4-password" required="" minlength="6">
                          </div>
                        </div>
                      </div>
                      <div id="w4-profile" class="tab-pane">
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="w4-first-name">First Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="first-name" id="w4-first-name" required="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="w4-last-name">Last Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="last-name" id="w4-last-name" required="">
                          </div>
                        </div>
                      </div>
                      <div id="w4-billing" class="tab-pane">
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="w4-cc">Barangay</label>
                          <div class="col-sm-9">
                            <select id="company" class="form-control" required="">
                              <option value="">Choose a Barangay</option>
                              <option value="brgy1">Barangay 1</option>
                              <option value="brgy2">Barangay 2</option>
                              <option value="brgy3">Barangay 3</option>
                            </select>
                            <label class="error" for="company"></label>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="inputSuccess">Position</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="exp-month" required="">
                            <option>Choose a position</option>
                              <option>Captain</option>
                              <option>Council</option>
                              <option>Secretary</option>
                              <option>Treasurer</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div id="w4-confirm" class="tab-pane">
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="w4-email">Email</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="email" id="w4-email" required="">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-3"></div>
                          <div class="col-sm-9">
                            <div class="checkbox-custom">
                              <input type="checkbox" name="terms" id="w4-terms" required="">
                              <label for="w4-terms">I agree to the terms of service</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="panel-footer">
                  <ul class="pager">
                    <li class="previous disabled">
                      <a><i class="fa fa-angle-left"></i> Previous</a>
                    </li>
                    <li class="finish hidden pull-right">
                      <a>Finish</a>
                    </li>
                    <li class="next">
                      <a>Next <i class="fa fa-angle-right"></i></a>
                    </li>
                  </ul>
                </div>
              </section>
            </div>
          </div>

					

						
					
    </div>
    
    <?php include('../layout/sidebar-right.php'); ?>


  </section>
  <?php include('../component/jslink.php');  ?>
  <!-- Specific Page Vendor -->
  <script src="../assets/vendor/jquery-validation/jquery.validate.js"></script>
  <script src="../assets/vendor/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
  <script src="../assets/vendor/pnotify/pnotify.custom.js"></script>

  <!-- Theme Base, Components and Settings -->
  <script src=" ../assets/javascripts/theme.js"></script>
		
  <!-- Theme Custom -->
  <script src=" ../assets/javascripts/theme.custom.js"></script>
  
  <!-- Theme Initialization Files -->
  <script src=" ../assets/javascripts/theme.init.js"></script>

  <!-- Examples -->
  <script src="../assets/javascripts/forms/examples.wizard.js"></script>

</body>
</html>