<?php  session_start(); ?>
<!DOCTYPE html>
<html class="fixed">
	<head>
		<title>All Resident</title>

		<!-- Specific Page Vendor CSS -->
    <?php include('../component/csslink.php'); ?>
    <link rel="stylesheet" href="../assets/vendor/jquery-datatables/media/css/jquery.dataTables.css">
		<link rel="stylesheet" href="../assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="../assets/vendor/pnotify/pnotify.custom.css" />
		<?php include('../component/cssthemelink.php'); ?>
  

	</head>
	<body>
		<section class="body">

		  	<!-- start: header -->
			<?php include('../layout/header.php'); ?>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php include('../layout/sidebar-left.php'); ?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>All Resident</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span> Residence Profiling</span></li>
								<li><span>All Resident</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
          </header>
          
          <section class="panel panel-featured panel-featured-primary">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<a href="#" class="fa fa-times"></a>
								</div>
						
								<h2 class="panel-title">List of All Resident</h2>
							</header>
							<div class="panel-body">
								<div class="row">
									<div class="col-sm-12 text-right">
										<a href="new-resident.php" title="Add New Resident" class="btn btn-primary mb-sm mt-xs mr-xs">Add New Resident</a>
									</div>
								</div>
								<div class="panel-body">
                  <table id="example" class="dislay" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>#</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Extension Name</th>
                        <th>Age</th>
                        <th>House #</th>
                        <th>Birthplace</th>
                        <th>Birthdate</th>
                        <th>Gender</th>
                        <th>Civil Status</th>
                        <th>Citizenship</th>
                        <th>Occupation</th>
                        <th>Household # </th>
                        <th>Street</th>
                        <th>Date Accomplished</th>
                        <th>Staff</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Id</th>
                        <th>#</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Extension Name</th>
                        <th>Age</th>
                        <th>House #</th>
                        <th>Birthplace</th>
                        <th>Birthdate</th>
                        <th>Gender</th>
                        <th>Civil Status</th>
                        <th>Citizenship</th>
                        <th>Occupation</th>
                        <th>Household # </th>
                        <th>Street</th>
                        <th>Date Accomplished</th>
                        <th>Staff</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
								</div>

								<div class="modal fade" id="deleteResidenceHouseholdModal" tabindex="-1" role="dialog" aria-labelledby="deleteResidenceHouseholdModal" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<div class="modal-wrapper">
													<div class="modal-icon center ">
														<i class="text-primary fa fa-question-circle"></i>
													</div>
													<div class="modal-text text-center">
														<h4>Are you sure?</h4>
														<p>Are you sure that you want to delete this Resident <span id="delete_residence_household_id"></span>?</p>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" id="confirm-delete-residen" class="btn btn-primary">Confirm</button>
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
								
							</div>
						</section>
						
					<!-- end: page -->
				</section>
			</div>

			<?php include('../layout/sidebar-right.php'); ?>
		</section>

		<!-- Vendor -->
		<?php include('../component/jslink.php'); ?>

    <!-- Specific Page Vendor -->
    
    <script src="../assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="../assets/vendor/pnotify/pnotify.custom.js"></script>
		<script src="../assets/vendor/select2/select2.js"></script>
		<?php include('../component/themejslink.php');  ?>
		<script src="../assets/vendor/jquery-ui/js/jquery-ui.1.12.1.js"></script>
		</body>
</html>