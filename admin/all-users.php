<?php session_start(); ?>
<!DOCTYPE html>
<html class="fixed" lang="en">
	<head>
		<title>All Users</title>

		<!-- Specific Page Vendor CSS -->
		<?php include('../component/csslink.php'); ?>
		<link rel="stylesheet" href="../assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="../assets/vendor/jquery-datatables/media/css/jquery.dataTables.css">
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
						<h2>All User</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>User</span></li>
								<li><span>All User</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
						<section class="panel panel-featured panel-featured-primary">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<a href="#" class="fa fa-times"></a>
								</div>
						
								<h2 class="panel-title">List of All User</h2>
							</header>
							<div class="panel-body">
								<div class="row">
									<div class="col-sm-12 text-right">
										<a href="new-user.php" title="Add New User" class="btn btn-primary mb-sm mt-xs mr-xs">Add New User</a>
									</div>
								</div>
								<div class="panel-body">

									<table id="example" class="dislay table table-hover table-striped																																																																																																														" cellspacing="0" width="100%">
										<thead>
												<tr>
												<th>ID</th>
                        <th>#</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Date Registered</th>
                        <th>Status</th>
                        <th>Action</th>
												</tr>
										</thead>
										<tfoot>
												<tr>						
												<th>ID</th>
                        <th>#</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Date Registered</th>
                        <th>Status</th>
                        <th>Action</th>
												</tr>
										</tfoot>
                  </table> 
								</div>
								
							</div>
							
						</section>
						
					<!-- end: page -->
				</section>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="deleteUserAccountModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserAccountModal" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<div class="modal-wrapper">
								<div class="modal-icon center ">
									<i class="text-primary fa fa-question-circle"></i>
								</div>
								<div class="modal-text text-center">
									<h4>Are you sure?</h4>
									<p>Are you sure that you want to delete this User Account  <span id="delete_account_id"></span> <span id="delete_user_id"></span>?</p>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" id="confirm-delete-user-account" class="btn btn-primary">Confirm</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>

			<?php include('../layout/sidebar-right.php'); ?>
		</section>

		<!-- Vendor -->
			
			<?php include('../component/jslink.php'); ?>
      <!-- Specific Page Vendor -->
      <script src="../assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
      <script src="../assets/vendor/pnotify/pnotify.custom.js"></script>
      <script src="../assets/vendor/select2/select2.js"></script>
          
          
    <!-- Theme Base, Components and Settings -->
		<script src=" ../assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src=" ../assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src=" ../assets/javascripts/theme.init.js"></script>
      <script src="../assets/vendor/jquery-ui/js/jquery-ui.1.12.1.js"></script> 
		</body>
</html>