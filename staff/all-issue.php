<?php  session_start(); ?>
<!DOCTYPE html>
<html class="fixed">
	<head>
		<title>All Issue</title>

		<!-- Specific Page Vendor CSS -->
		<?php include('../component/csslink.php'); ?>
		<link rel="stylesheet" href="../assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="../assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
		<link rel="stylesheet" href="../assets/vendor/pnotify/pnotify.custom.css" />
		<?php include('../component/csslink.php'); ?>
  

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
						<h2>All Issue</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Barangay Issue</span></li>
								<li><span>All Issue</span></li>
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
								<h2 class="panel-title">List of All Barangay Issue</h2>
							</header>
							<div class="panel-body">
								<div class="row">
									<div class="col-sm-12 text-right">
                  <a href="new-issue.php" title="Add New Barangay Issue" class="btn btn-primary mb-sm mt-xs mr-xs">Add New Issue</a></div>
								</div>
								<div class="panel-body">
									<div id="lisf-of-issue"></div>
								</div>
								<!-- Modal -->
								<div class="modal fade" id="deleteBarangayIssueModal" tabindex="-1" role="dialog" aria-labelledby="deleteBarangayIssueModal" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<div class="modal-wrapper">
													<div class="modal-icon center ">
														<i class="text-primary fa fa-question-circle"></i>
													</div>
													<div class="modal-text text-center">
														<h4>Are you sure?</h4>
														<p>Are you sure that you want to delete this Issue<span id="delete_barangay_issue_id"></span>?</p>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" id="confirm-delete-Barangay-Issue" class="btn btn-primary">Confirm</button>
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
							</div>
							<div id="viewIssue" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
								<section class="panel">
									<header class="panel-heading bg-info" >
										<h2 class="panel-title ">Barangay Issue</h2>
									</header>
									<div class="panel-body">
									<div class="row">
										<div class="form-group">
											<label class="col-sm-4 control-label"> <strong>Date Filled</strong> </label>
											<div class="col-sm-7">
												<span  id="datefilled"> </span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label"> <strong>Complainant</strong></label>
											<div class="col-sm-7">
												<span  id="complainant"> </span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label" for="complained_resident"><strong>Complained Resident</strong></label>
											<div class="col-sm-7">
												<span id="complained_resident"> </span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label" for="status"><strong>Status</strong></label>
											<div class="col-sm-7">
												<span id="status"> </span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label" for="oic"><strong>OIC</strong></label>
											<div class="col-sm-7">
												<span id="oic"> </span>
											</div>
										</div>
										<div class="form-group" id="desc">
											<label class="col-sm-4 control-label" for="description"><strong>Description</strong></label>
											<div class="col-sm-8">
												<span id="description"> </span>
											</div>
											
										</div>
									</div>
												
									</div>
									<footer class="panel-footer bg-info">
										<div class="row">
											<div class="col-sm-12 text-right">
												<button class="btn btn-default modal-dismiss">Close</button>
											</div>
										</div>
									</footer>
								</section>
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
		<script src="../assets/vendor/pnotify/pnotify.custom.js"></script>
		<script src="../assets/vendor/select2/select2.js"></script>
		<script src="../assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="../assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		
		

		<?php include('../component/themejslink.php');  ?>
		<script src="../assets/vendor/jquery-ui/js/jquery-ui.1.12.1.js"></script> 
		</body>
</html>