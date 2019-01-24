<!DOCTYPE html>
<html>
<head>
  <title>Add New User</title>
  
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
          
                  <h2 class="panel-title">Add User</h2>
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
                        <a href="#w4-confirm" data-toggle="tab"><span>4</span>Confirmation</a>
                      </li>
                    </ul>
                  </div>
          
                  <form class="form-horizontal" novalidate="novalidate">
                    <div class="tab-content">
                      
                      <!-- Profile -->
                      <div id="w4-profile" class="tab-pane active">
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="w4-first-name">First Name</label>
                          <div class="col-sm-7">
                            <input type="text" class="form-control" placeholder="First Name" name="first_name" id="w4-first-name" required="" autofocus>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="w4-last-name">Last Name</label>
                          <div class="col-sm-7">
                            <input type="text" class="form-control" placeholder="Last Name" name="last_name" id="w4-last-name" required="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="w4-middle-name">Middle Name</label>
                          <div class="col-sm-7">
                            <input type="text" class="form-control" placeholder="Midde Name" name="middle_name" id="w4-middle-name" required="">
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
                          <label class="col-sm-3 control-label" for="w4-status">Status</label>
                          <div class="col-sm-4">
                            <select id="status" name="status" class="form-control" required="">
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
                          <label class="col-sm-3 control-label" for="w4-citizenship-name">Citizenship</label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="Citizenship" name="citizenship" id="w4-citizenship-name" required="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="w4-profile-pic">Profile Picture</label>
                          <div class="row">
                            <div class="col-md-1 col-xs-6 col-lg-3">

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
                          <!-- <div class="col-md-4" style="background-color:red;">
                            <img class="img-responsive" src="../assets/images/sample-user.jpg" width="100">
                            <input type="file" class="btn btn-block btn-primary"/>
                          </div> -->

                          <!-- <div class="col-sm-4">
                            <input type="text" class="form-control"  name="profile_pic" id="w4-profile-pic">
                          </div> -->
                        </div>
                      </div>
                      
                      <!-- Barangay Staff Position -->
                      <div id="w4-position" class="tab-pane">
                        <!-- Barangay -->
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="w4-barangay">Barangay</label>
                          <div class="col-sm-7">
                            <select id="barangay" class="form-control" required autofocus>
                              <option value="">Choose a Barangay</option>
                              <? for($i=1;$i<=10;$i++){ ?>
                              <option value="<? echo $i; ?>">Barangay <? echo $i; ?></option>
                              <? } ?>
                            </select>
                            <label class="error" for="w4-barangay"></label>
                          </div>
                        </div>
                        <!-- Position -->
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="w4-position">Position</label>
                          <div class="col-sm-7">
                            <select id="position" class="form-control"  required="">
                              <option value="">Choose a position</option>
                              <option value="Captain">Captain</option>
                              <option value="Council">Council</option>
                              <option value="Secretary">Secretary</option>
                              <option value="Treasurer">Treasurer</option>
                            </select>
                            <label class="error" for="w4-position"></label>
                          </div>
                        </div>
                        <!-- Role Type -->
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="w4-role">Role</label>
                          <div class="col-sm-7">
                            <select id="role" class="form-control" required>
                              <option value="">Choose a Role Type</option>
                              <option value="Administration">Administration</option>
                              <option value="Staff">Staff</option>
                            </select>
                            <label class="error" for="w4-role"></label>
                          </div>
                        </div>
                      </div> 

                      <!-- User Account -->
                      <div id="w4-account" class="tab-pane ">
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="w4-username" >Username</label>
                          <div class="col-sm-7">
                            <div class="input-group input-group-icon">
                              <span class="input-group-addon">
                                <span class="icon"><i class="fa fa-user"></i></span>
                              </span>
                              <input type="text" class="form-control" placeholder="Username" name="username" id="w4-username"  autofocus required="">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="w4-password">Password</label>
                          <div class="col-sm-7">
                            <div class="input-group input-group-icon">
                              <span class="input-group-addon">
                                <span class="icon"><i class="fa fa-key"></i></span>
                              </span>
                              <input type="password" class="form-control" placeholder="Password" name="password" id="w4-password" required="" minlength="6">
                            </div>
                          </div>
                        </div>
                        <!-- <div class="form-group">
                          <label class="col-sm-3 control-label" for="w4-confirm-password">Confirm Password</label>
                          <div class="col-sm-7">
                            <div class="input-group input-group-icon ">
                              <span class="input-group-addon">
                                <span class="icon"><i class="fa fa-key"></i></span>
                              </span>
                              <input type="password" class="form-control" name="confirm_password" id="w4-confirm-password" required="" minlength="6">
                            </div>
                          </div>
                        </div> -->
                      </div>

                      <!-- User Email -->
                      <div id="w4-confirm" class="tab-pane ">
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="w4-email">Email</label>
                          <div class="col-sm-7">
                            <div class="input-group input-group-icon ">
                              <span class="input-group-addon">
                                <span class="icon"><i class="fa fa-envelope"></i></span>
                              </span>
                              <input type="text" class="form-control" placeholder="you@email.com" name="email" id="w4-email" autofocus required="">
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

</body>
</html>