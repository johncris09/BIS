<?php
  session_start(); 
  include_once '../classes/Database.php';
  include_once  '../classes/Position.php';
  include_once  '../classes/Barangay.php'; 
  include_once  '../classes/initial.php'; 

  $position = new Position($db);
  $barangay = new Barangay($db);
  
  // Ternary Operator
  $edit_account_id  = isset($_SESSION['edit_account_id'])?$_SESSION['edit_account_id']: null ;
  $edit_user_id     =isset($_SESSION['edit_user_id'])?$_SESSION['edit_user_id']: null ;
?>
<!DOCTYPE html>
<html>
  <head>
		<title>Profile</title>
		<?php include('../component/metadata.php'); ?>
		<!-- Specific Page Vendor CSS -->
		<?php include('../component/csslink.php'); ?>
		<link rel="stylesheet" href="../assets/vendor/pnotify/pnotify.custom.css" />
		<?php include('../component/cssthemelink.php'); ?>
    
  </head>
  <body>
    <section class="body">
      

      <?php include('../layout/header.php'); ?>
      <div class="inner-wrapper">

        <?php include('../layout/sidebar-left.php'); ?>
        
        <section role="main" class="content-body">
            <header class="page-header">
              <h2>Profile</h2>
            
              <div class="right-wrapper pull-right">
                <ol class="breadcrumbs">
                  <li>
                    <a href="index.php">
                      <i class="fa fa-home"></i>
                    </a>
                  </li>
                  <li><span>User</span></li>
                  <li><span>Your Profile</span></li>
                </ol>
            
                <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
              </div>
            </header>

            <!-- Main Content -->
            <!-- <div class="row">
						  <div class="col-md-4 col-lg-3">

							<section class="panel">
								<div class="panel-body">
									<div class="thumb-info mb-md">
										<img src="../assets/images/sample-user.jpg" class="rounded img-responsive" alt="Profile Picture">
										<div class="thumb-info-title">
											<span class="thumb-info-inner">John Cris</span>
											<span class="thumb-info-type">Role Type</span>
										</div>
									</div>
									<div class="widget-toggle-expand mb-md">
										<div class="widget-header">
											<div class="row">
												<div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">
													<input type="file" class="form-control">
												</div>
											</div>
											
										</div>
									</div>
								</div>
							</section>
						</div> -->
						<div class="col-md-12 ">

							<div class="tabs tabs-primary">
								<ul class="nav nav-tabs tabs-primary">
									<li class="active">
										<a href="#overview" data-toggle="tab" aria-expanded="true">
											<i class="fa fa-file-text-o"></i> Profile</a>
									</li>
								</ul>
								<div class="tab-content">
									<div id="overview" class="tab-pane active">

										<!-- Personal Information -->
										<h4 class="mb-md">Personal Information</h4>
										<form class="form-horizontal" method="post">
											<fieldset>
												<div class="form-group">
													<label class="col-md-3 control-label" for="first_name">First Name</label>
													<div class="col-md-8">
														<input type="text" id="first_name" class="form-control" name="first_name" placeholder="First Name" autofocus required>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="middle_name">Middle Name</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="middle_name" id="middle_name"  placeholder="Middle Name">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="last_name">Last Name</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" required>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileGender">Gender</label>
													<div class="col-md-9">
                            <div class="radio-custom radio-primary">
                              <input id="male" name="gender" type="radio" value="Male" required="" checked="checked">
                              <label for="male">Male</label>
                            </div>
                            <div class="radio-custom radio-primary">
                              <input id="female" name="gender" type="radio" value="Female" required="">
                              <label for="female">Female</label>
                            </div>
                            <label class="error" for="gender"></label>
                          </div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="civil_status">Status</label>
                          <div class="col-md-4">
                            <select id="civil_status" name="status" class="form-control" required="">
                            	<option value="Single">Single</option>
                              <option value="Married">Married</option>
                              <option value="Widowed">Widowed</option>
                              <option value="Separated">Separated</option>
                            </select>
                            <label class="error" for="status"></label>
                          </div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="citizenship">Citizenship</label>
                          <div class="col-md-4">
                            <input type="text" id="citizenship" class="form-control"   placeholder="Citizenship" name="citizenship"  required="">
                          </div>
												</div>
											</fieldset>

											<!-- Contact Info -->
											<hr class="dotted tall">
											<h4 class="mb-xlg">Contact Info</h4>
											<fieldset>
												<div class="form-group">
												<label class="col-md-3 control-label" for="email">Email</label>
                          <div class="col-md-8">
                            <div class="input-group input-group-icon ">
                              <span class="input-group-addon">
                                <span class="icon"><i class="fa fa-envelope"></i></span>
                              </span>
                              <input type="text" class="form-control" placeholder="you@email.com" name="email" id="email"  required="">
                            </div>
                          </div>
                        </div>
											</fieldset>

											<!-- Role Managament -->
											<input type="hidden" id="role" value="0">
											<!-- <hr class="dotted tall">
											<h4 class="mb-xlg">Role Management</h4>
											<fieldset>
												<div class="form-group">
													<label class="col-sm-3 control-label" for="role">Role</label>
                          <div class="col-sm-8">
                            <select id="role" class="form-control" name="role" required>
                              <option value="0">Administration</option>
                              <option value="1">Staff</option>
                            </select>
                          </div>
												</div>
											</fieldset> -->

											<!-- Account Information -->
											<hr class="dotted tall">
											<h4 class="mb-xlg">Account Management</h4>
											<fieldset>
												<div class="form-group">
													<label class="col-md-3 control-label" for="usename" >Username</label>
                          <div class="col-md-7">
                            <div class="input-group input-group-icon">
                              <span class="input-group-addon">
                                <span class="icon"><i class="fa fa-user"></i></span>
                              </span>
                              <input type="text" id="username" class="form-control" placeholder="Username" name="username"   required="">
                            </div>
                          </div>
												</div>
											</fieldset>

											<!-- Change Password -->
											<hr class="dotted tall">
											<h4 class="mb-xlg">Change Password</h4>
											<fieldset class="mb-xl">
												<!-- Old Password -->
												<div class="form-group" id="old-password-form">
													<label class="col-md-3 control-label" for="old_password">Old Password</label>
													<div class="col-md-8">
														<div class="input-group mb-md">
														<div class="input-group input-group-icon">
                              <span class="input-group-addon">
                                <span class="icon"><i class="fa fa-key"></i></span>
                              </span>
															<input type="password" class="form-control" id="old_password" placeholder="Old Password"  >	
														</div>
															<!-- <span class="icon"><i class="fa fa-key"></i></span> -->
															<span  style="cursor: pointer" class="input-group-addon btn-primary" id="check_password"> <i class="fa fa-question" aria-hidden="true"></i> Check Password</span>
														</div>
														<label class="error" id="err_password"></label>
													</div>
												</div>
												<!-- New Password -->
												<div id="new-password-form">
													
												</div>
											</fieldset>
											<div class="panel-footer">

												<div class="row">
													<div class="col-sm-12 text-right">
													<button type="button" id="update_profile" class="btn btn-primary mb-xs mt-xs mr-xs ">Update Profile</button>
														
													</div>
													
													</div>
												</div>
											</div>
										</form>
									</div>

								</div>
							</div>
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
		<?php include('../component/themejslink.php');  ?>
		<script src="../assets/vendor/jquery-ui/js/jquery-ui.1.12.1.js"></script> 
  </body>
</html>