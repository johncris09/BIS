<? 
  session_start(); 
  include_once '../classes/Database.php';
  include_once  '../classes/Position.php';
  include_once  '../classes/Barangay.php'; 
  include_once  '../classes/initial.php'; 

  $position = new Position($db);
  $barangay = new Barangay($db);
  
  // Ternary Operator
  $account_id = isset($_SESSION['edit_account_id'])?$_SESSION['edit_account_id']: null ;
  $user_id =isset($_SESSION['edit_user_id'])?$_SESSION['edit_user_id']: null ;
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit User</title>
  
  <?php include('../component/metadata.php'); ?>
  
  <!-- Specific Page Vendor CSS -->
  <link rel="stylesheet" href="../assets/vendor/pnotify/pnotify.custom.css" />
  <?php include('../component/csslink.php'); ?>
</head>
<body>
  <section class="body">
    

    <?php include('../layout/header.php'); ?>
    <div class="inner-wrapper">

      <?php include('../layout/sidebar-left.php'); ?>
			
			<section role="main" class="content-body">
					<header class="page-header">
						<h2>Edit User</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
                <li><span>User</span></li>
                <li><span>Edit User</span></li>
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
          
                  <h2 class="panel-title">Edit User</h2>
                </header>
                <div class="panel-body">
                  <div class="wizard-progress wizard-progress-lg">
                    <div class="steps-progress">
                      <div class="progress-indicator" style="width: 0%;"></div>
                    </div>
                    
                    <ul class="wizard-steps">
                      
                      <li class="active">
                        <a href="#w4-profile" data-toggle="tab"><span>1</span>Profile Info</a>
                      </li>
                      <li>
                        <a href="#w4-position" data-toggle="tab"><span>2</span> Position</a>
                      </li>`
                      <li>
                        <a href="#w4-account" data-toggle="tab"><span>3</span>Account Info</a>
                      </li>
                      <li>
                        <a href="#w4-role" data-toggle="tab"><span>4</span>Role Type</a>
                      </li>
                      <li>
                        <a href="#w4-confirm" data-toggle="tab"><span>5</span>Confirmation</a>
                      </li>
                    </ul>
                  </div>
          
                  <form class="form-horizontal" novalidate="novalidate">
                    <div class="tab-content">
                      
                      <!-- Profile -->
                      <div id="w4-profile" class="tab-pane active">
                        <!-- this fields is used to edit and update the user account -->
                        <!-- account_id -->
                        <input type="hidden" value="<?php echo $account_id ?>" id="account_id">
                        <!-- user_id -->
                        <input type="hidden" value="<?php echo $user_id ?>" id="user_id">
                        
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="first-name">First Name</label>
                          <div class="col-sm-7">
                            <input type="text" id="first_name" class="form-control"  placeholder="First Name" name="first_name" required="" autofocus>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="middle_name">Middle Name</label>
                          <div class="col-sm-7">
                            <input type="text" id="middle_name" class="form-control"  placeholder="Midde Name" name="middle_name" >
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="last_name">Last Name</label>
                          <div class="col-sm-7">
                            <input type="text" id="last_name" class="form-control"  placeholder="Last Name" name="last_name"  required="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="w4-gender">Gender</label>
                          <div class="col-sm-9">
                            <div class="radio-custom radio-primary">
                              <input id="male" name="gender" type="radio" value="Male" required="">
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
                          <label class="col-sm-3 control-label" for="civil_status">Status</label>
                          <div class="col-sm-4">
                            <select id="civil_status" name="status" class="form-control" required="">
                            <option value="">Choose Status</option>
                              <option value="Single">Single</option>
                              <option value="Married">Married</option>
                              <option value="Widowed">Widowed</option>
                              <option value="Separated">Separated</option>
                            </select>
                            <label class="error" for="status"></label>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="citizenship">Citizenship</label>
                          <div class="col-sm-4">
                            <input type="text" id="citizenship" class="form-control"   placeholder="Citizenship" name="citizenship"  required="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="w4-profile-pic">Profile Picture</label>
                          <div class="row">
                            <div class="col-md-4 col-xs-8 col-lg-3">
                              <section class="panel">
                                <div class="panel-body">
                                  <div class="thumb-info mb-md">
                                    <img src="../assets/images/sample-user.jpg" name="profiel_pic" height="145" width="145" class="rounded img-responsive" alt="Sample User">
                                    <input type="file" class="btn btn-block btn-default mb-xs mt-xs mr-xs ">
                                  </div>
                                </div>
                              </section>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <!-- Barangay Staff Position -->
                      <div id="w4-position" class="tab-pane ">
                        <!-- Barangay -->
                        
                        <div class="form-group">

                          <label class="col-sm-3 control-label" for="barangay">Barangay</label>
                          <div class="col-sm-7">
                            <select id="barangay-list" class="form-control" required="">
                              
                              <option value="">Choose a Barangay</option>
                            
                            <?php $prep_state = $barangay->getAllBarangay(); while ($row = $prep_state->fetch(PDO::FETCH_ASSOC)) { ?>

                              <option value="<?php echo $row['barangay_id'];?>"><?php echo $row['barangay_name']; ?></option>
                            
                            <?php 	} ?>

                            </select>
                          </div>
                        </div>
                        <!-- Position -->
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="position">Position</label>
                          <div class="col-sm-7">
                            <select id="position-list" class="form-control" required="">
                              
                              <option value="">Choose a Position</option>
                            
                            <?php $prep_state = $position->getAllPosition(); while ($row = $prep_state->fetch(PDO::FETCH_ASSOC)) { ?>

                              <option value="<?php echo $row['position_id'];?>"><?php echo $row['position']; ?></option>
                            
                            <?php 	} ?>

                            </select>

                          </div>
                        </div>
                        
                      </div> 

                      <!-- User Account -->
                      <div id="w4-account" class="tab-pane">
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="usename" >Username</label>
                          <div class="col-sm-7">
                            <div class="input-group input-group-icon">
                              <span class="input-group-addon">
                                <span class="icon"><i class="fa fa-user"></i></span>
                              </span>
                              <input type="text" id="username" class="form-control" placeholder="Username" name="username"  autofocus required="">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="password">Password</label>
                          <div class="col-sm-7">
                            <div class="input-group input-group-icon">
                              <span class="input-group-addon">
                                <span class="icon"><i class="fa fa-key"></i></span>
                              </span>
                              <input type="password" id="password" class="form-control" placeholder="Password" name="password" required="" minlength="6">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="confirm_password">Confirm Password</label>
                          <div class="col-sm-7">
                            <div class="input-group input-group-icon ">
                              <span class="input-group-addon">
                                <span class="icon"><i class="fa fa-key"></i></span>
                              </span>
                              <input type="password" id="confirm_password" class="form-control" placeholder="Confirm Password" name="confirm_password" required="" >
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Role Type -->
                      <div id="w4-role" class="tab-pane">
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="role">Role</label>
                          <div class="col-sm-7">
                            <select id="role" class="form-control" name="role" required>
                              <option value="0">Administration</option>
                              <option value="1">Staff</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <!-- User Email -->
                      <div id="w4-confirm" class="tab-pane ">
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="email">Email</label>
                          <div class="col-sm-7">
                            <div class="input-group input-group-icon ">
                              <span class="input-group-addon">
                                <span class="icon"><i class="fa fa-envelope"></i></span>
                              </span>
                              <input type="text" class="form-control" placeholder="you@email.com" name="email" id="email" autofocus required="">
                            </div>
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

 
  <?php include('../component/themejslink.php');  ?>

  <!-- Examples -->
  <script src="../assets/javascripts/forms/examples.wizard.js"></script>
  <script src="../assets/vendor/jquery-ui/js/jquery-ui.1.12.1.js"></script> 
  

</body>
</html>