<?php 
	session_start();
	include_once '../classes/Database.php';
  include_once '../classes/ResidenceHousehold.php';
  include_once '../classes/initial.php';
  
	$complainant 					= new ResidenceHousehold($db);
	$complained_resident	= new ResidenceHousehold($db);
	$complainant 					= $complainant->fetchResidenceHouseholdWithinTheBarangay($_SESSION['barangay_id']);
	$complained_resident 	= $complained_resident->fetchResidenceHouseholdWithinTheBarangay($_SESSION['barangay_id']);
?>



<!DOCTYPE html>
<html class="fixed">
	<head>
		<title>Edit Issue</title>

		<?php include('../component/metadata.php'); ?>
		<?php include('../component/csslink.php'); ?>
  
		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="../assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<link rel="stylesheet" href="../assets/vendor/pnotify/pnotify.custom.css" />
		<link rel="stylesheet" href="../assets/vendor/summernote/summernote.css" />
		<link rel="stylesheet" href="../assets/vendor/summernote/summernote-bs3.css" />
		<link rel="stylesheet" href="../assets/vendor/select2/select2.css" /> 
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
						<h2>Edit Issue</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Barangay Issue</span></li>
								<li><span>Edit Issue</span></li>
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

								<h2 class="panel-title">Edit Issue</h2>
							</header>
							<div class="panel-body">
                <form id="issue-form" class="form-horizontal form-bordered" novalidate="novalidate">
                 	<div class="row">
										<div class="form-group">
											<label class="col-md-3 control-label">Complainant </label>
											<div class="col-md-5">
												<select id="complainant" class="form-control populate placeholder"  required="required">
													
											<?php 
												while ($row = $complainant->fetch(PDO::FETCH_ASSOC))
												{?>
													<option value="<?php echo $row['person_id'] ?>"><?php echo $row['first_name'] . ' ' . $row['middle_name'] . ' ' . $row['last_name']  ?></option>
											<?php
												}
											?>
													
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3  control-label" for="complained_resident">Complaineds Resident</label>
											<div class="col-md-5">
												<select id="complained_resident"  class="form-control populate placeholder" required="required">>
												
											<?php 
												$counter=1;
												while ($row = $complained_resident->fetch(PDO::FETCH_ASSOC))
												{?>
													<option value="<?php echo $row['person_id'] ?>"><?php echo $row['first_name'] . ' ' . $row['middle_name'] . ' ' . $row['last_name']  ?></option>
											<?php
												}
											?>
													
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label" for="status">Status</label>
											<div class="col-md-5">
												<select id="status" name="status" class="form-control mb-md " disabled>
													<option value="Pending">Pending</option>
													<option value="Ongoing">Ongoing</option>
													<option value="Resolve">Resolve Issue</option>
												</select>
											</div>
										</div>
										<div class="form-group" id="desc">
											<label id="description-label" class="col-md-3 control-label" for="description">Description</label>
											<div class="col-md-8">
												<div id="description" class="summernote" data-plugin-summernote data-plugin-options='{ "height": 300, "codemirror": { "theme": "ambiance" } }'></div>
												<label class="error" id="description_err"></label>
											</div>
											
										</div>
									</div>
							</div>
							<div class="panel-footer">
								<div class="row" style="display: block;">
									<div class="col-sm-12 text-right">
										<button type="button" id="update_issue" class="btn btn-primary mb-xs mt-xs mr-xs ">Update</button>
									</div>
								</div>
							</div>
						</section>
						
					<!-- end: page -->
				</section>
			</div>

			<?php include('../layout/sidebar-right.php'); ?>
		</section>

		<?php include('../component/jslink.php');  ?> 
		<!-- Specific Page Vendor -->
		<script src="../assets/vendor/jquery-validation/jquery.validate.js"></script>
		<script src="../assets/vendor/pnotify/pnotify.custom.js"></script>
		<script src="../assets/vendor/select2/select2.js"></script>
		<script src="../assets/vendor/summernote/summernote.js"></script>
		<?php include('../component/themejslink.php');  ?>
		<script src="../assets/vendor/jquery-ui/js/jquery-ui.1.12.1.js"></script> 
		</body>
</html>