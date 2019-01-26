<!DOCTYPE html>
<html>
<head>
  <title>Add New Resident</title>
  
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
						<h2>Add New  Residence </h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
                <li><span>Residence Profiling</span></li>
                <li><span>Add New Resident</span></li>
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
          
                  <h2 class="panel-title">Add New Resident</h2>
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
                        <a href="#w4-household" data-toggle="tab"><span>2</span>Household</a>
                      </li>
                    </ul>
                  </div>
          
                  <form class="form-horizontal" novalidate="novalidate">
                    <div class="tab-content">
                      
                      <!-- Person Information -->
                      <div id="w4-profile" class="tab-pane active">
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="FirstName">First Name</label>
                          <div class="col-sm-7">
                            <input type="text" class="form-control" placeholder="First Name" name="first_name" id="FirstName" required="" autofocus>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="MiddleName">Middle Name</label>
                          <div class="col-sm-7">
                            <input type="text" class="form-control"  placeholder="Midde Name" name="middle_name" id="MiddleName" >
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="LastName">Last Name</label>
                          <div class="col-sm-7">
                            <input type="text" class="form-control" placeholder="Last Name" name="last_name" id="LastName" required="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="Extension">Extension</label>
                          <div class="col-sm-3">
                            <input type="text" class="form-control"  placeholder="Extension" name="extension" id="Extension">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="HouseNumber">House Number</label>
                          <div class="col-sm-3">
                            <input type="text" class="form-control" placeholder="House Number" name="housenumber" id="HouseNumber">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="Birtplace">Birthplace</label>
                          <div class="col-sm-7">
                            <input type="text" class="form-control"  placeholder="Birthplace" name="birthplace" id="Birtplace">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="date">Birthdate</label>
                          <div class="col-sm-3">
                            <input id="date" data-plugin-masked-input="" data-input-mask="9999/99/99"  name="birthplace" placeholder="YYYY/MM/DD" class="form-control" required>
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
                          <label class="col-sm-3 control-label" for="status">Status</label>
                          <div class="col-sm-3">
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
                          <label class="col-sm-3 control-label" for="Citizenship">Citizenship</label>
                          <div class="col-sm-3">
                            <input type="text" class="form-control" placeholder="Citizenship" name="citizenship" id="Citizenship" required="">
                          </div>
                        </div>
                        <div class="form-group">
													<label class="col-md-3 control-label" for="PhoneNumber">Phone Number</label>
													<div class="col-sm-4">
															<input id="PhoneNumber" name="phone_number" data-plugin-masked-input="" data-input-mask="(+63) 999-999-9999" placeholder="(+63) 123-123-1234" class="form-control">
													</div>
                        </div>
                        <div class="form-group">
													<label class="col-md-3 control-label" for="occupation">Occupation</label>
													<div class="col-sm-4">
															<input id="occupation" name="occupation" placeholder="Occupation" class="form-control">
													</div>
												</div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="ProfilePicture">Profile Picture</label>
                          <div class="row">
                            <div class="col-md-4 col-xs-8 col-lg-3">
                              <section class="panel">
                                <div  class="panel-body">
                                  <div class="thumb-info mb-md">
                                    <img src="../assets/images/sample-user.jpg" name="profiel_pic" height="145" width="145" class="rounded img-responsive" alt="Sample User">
                                    <input id="ProfilePicture" type="file" class="btn btn-block btn-default mb-xs mt-xs mr-xs ">
                                  </div>
                                </div>
                              </section>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <!-- Household  -->
                      <div id="w4-household" class="tab-pane ">
                        <div class="form-group">
                          <label class="col-md-3 control-label" for="Street">Street </label>
                          <div class="col-md-7">
                            <select id="Street" name="street" data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='{ "placeholder": "Select a State", "allowClear": true }' required>
                              <optgroup label="Selected Barangay">
                                <option value="">Select Street</option>
                                <? for($i=1;$i<=5;$i++){?>
                                <option value="Purok <? echo $i;?>">Purok <? echo $i; ?></option>
                                <? } ?>
                              </optgroup>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="HouseholdNumber">Household Number</label>
                          <div class="col-sm-7">
                            <input type="text" class="form-control" placeholder="Household Number" name="household_number" id="HouseholdNumber" required="">
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
  <script src="../assets/vendor/jquery-maskedinput/jquery.maskedinput.js"></script>
  B
  <?php include('../component/themejslink.php');  ?>

  <!-- Examples -->
  <script src="../assets/javascripts/forms/examples.wizard.js"></script>

</body>
</html>