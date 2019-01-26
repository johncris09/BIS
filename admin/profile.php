<!DOCTYPE html>
<html>
  <head>
    <title>Profile</title>
    <?php include('../component/metadata.php'); ?>
    
    <?php include('../component/csslink.php'); ?>
    
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
            <div class="row">
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
						</div>
						<div class="col-md-10 col-lg-9">

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
													<label class="col-md-3 control-label" for="profileFirstName">First Name</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="first_name" id="profileFirstName" value="John Cris" placeholder="First Name" required>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileMiddleName">Middle Name</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="middle_name" id="profileMiddleName" value="Calamongay" placeholder="Middle Name">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileLastName">Last Name</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="last_name" id="profileLastName" value="Manabo" placeholder="Last Name" required>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileGender">Gender</label>
													<div class="col-md-3">
														<select id="profileGender" class="form-control" name="gender" required>
															<option value="Male">Male</option>
															<option value="Female">Female</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileStatus">Status</label>
													<div class="col-md-3">
														<select id="profileStatus" class="form-control" name="status" required>
															<option value="Single">Single</option>
															<option value="Married">Married</option>
															<option value="Widowed">Widowed</option>
															<option value="Separated">Separated</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileCitizenship">Citizenship</label>
													<div class="col-md-3">
														<input type="text" class="form-control" name="citizenship" id="profileCitizenship" value="Filipino" placeholder="Citizenship" required>
													</div>
												</div>
											</fieldset>

											<!-- Contact Info -->
											<hr class="dotted tall">
											<h4 class="mb-xlg">Contact Info</h4>
											<fieldset>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileEmail">Email</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="email" id="profileEmail" value="jcmanabo@gmail.com" required>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profilePhoneNumber">Phone Number</label>
													<div class="col-md-8">
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-phone"></i>
															</span>
															<input id="profilePhoneNumber" name="phone_number" data-plugin-masked-input="" data-input-mask="(+63) 999-999-9999" placeholder="(+63) 123-123-1234" class="form-control">
													</div>
													</div>
												</div>
											</fieldset>

											<!-- Role Managament -->
											<hr class="dotted tall">
											<h4 class="mb-xlg">Role Management</h4>
											<fieldset>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileRoleType">Role Type</label>
													<div class="col-md-5">
														<select id="profileRoleType" class="form-control" name="status" required>
															<option value="Administration">Administration</option>
															<option value="Staff">Staff</option>
														</select>
													</div>
												</div>
											</fieldset>

											<!-- Account Information -->
											<hr class="dotted tall">
											<h4 class="mb-xlg">Account Management</h4>
											<fieldset>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileUsername">Username</label>
													<div class="col-md-8">
														<input type="text" class="form-control" placeholder="Username" name="username" id="profileUsername" value="johncris" required>
													</div>
												</div>
											</fieldset>

											<!-- Change Password -->
											<hr class="dotted tall">
											<h4 class="mb-xlg">Change Password</h4>
											<fieldset class="mb-xl">
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileNewPassword">New Password</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="profileNewPassword" minlength="6">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileConfirmNewPassword">Confirm New Password</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="profileConfirmNewPassword" >
													</div>
												</div>
											</fieldset>
											<div class="panel-footer">
												<div class="row">
													<div class="col-md-9 col-md-offset-3">
														<button type="submit" class="btn btn-primary">Submit</button>
														<button type="reset" class="btn btn-default">Reset</button>
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
		<script src="../assets/vendor/jquery-maskedinput/jquery.maskedinput.js"></script>
    
    <?php include('../component/themejslink.php');  ?>
  </body>
</html>