<!DOCTYPE html>
<html class="fixed">
	<head>
		<title>All Resident</title>

		<?php include('../component/metadata.php'); ?>

		<?php include('../component/csslink.php'); ?>
		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="../assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="../assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

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
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Resident Profiling</span></li>
								<li><span>All Resident</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
						<section class="panel">
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
								<table class="table table-bordered table-striped mb-none" id="datatable-default">
									<thead>
										<tr>
											<th>#</th>
											<th>Last Name</th>
											<th>First Name</th>
											<th>Middle Name</th>
											<th>Extension</th>
											<th>House Number</th>
											<th>Street</th>
											<th>Birthplace</th>
											<th>Birthdate</th>
											<th>Status</th>
											<th>Civil Status</th>
											<th>Citizenship</th>
											<th>Phone Number</th>
											<th>Occupation</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<? for($i=1;$i<50;$i++){ ?>
										<tr class="gradeX">
											<th><? echo $i;?></th>
											<td>Manabo</td>
											<td>John Cris</td>
											<td>Calamongay</td>
											<td>II</td>
											<td>238423</td>
											<td>Purok 1</td>
											<td>MOPH</td>
											<td>1999-01-01</td>
											<td>Male</td>
											<td>Single</td>
											<td>Filipino</td>	
											<td>082903123</td>
											<td>Student</td>
											<td>View Delete Edit</td>
										</tr>
										<? } ?>
									</tbody>
								</table>
							</div>
						</section>
						
					<!-- end: page -->
				</section>
			</div>

			<?php include('../layout/sidebar-right.php'); ?>
		</section>

		<?php  include('../component/jslink.php'); ?>
		<!-- Specific Page Vendor -->
		<script src="../assets/vendor/select2/select2.js"></script>
		<script src="../assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="../assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		
		<?php include('../component/themejslink.php'); ?>

		<!-- Examples -->
		<script src="../assets/javascripts/tables/examples.datatables.default.js"></script>
		</body>
</html>