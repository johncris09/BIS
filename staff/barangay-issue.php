<?php session_start(); ?>
<!DOCTYPE html>
<html class="fixed">
	<head>
		<title>All Issue</title>

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

					<!-- start: page -->
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
										<a href="new-issue.php" title="Add New Barangay Issue" class="btn btn-primary mb-sm mt-xs mr-xs">Add New Issue</a>
									</div>
								</div>
								<table class="table table-bordered table-striped mb-none" id="datatable-default">
									<thead>
										<tr>
											<th>#</th>
											<th>Case Number</th>
											<th>Complainant</th>
											<th>Complained Resident</th>
											<th>Date Filed</th>
											<th>OIC</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<? for($i=1;$i<50;$i++){ ?>
										<tr class="gradeX">
											<th><? echo $i;?></th>
											<td><? echo $i;?></td>
											<td>Cris John</td>
											<td>John Cris</td>
											<td>2019-01-01</td>
											<td>II</td>
											<td>Staff I</td>
											<td>
												<ul class="list-inline">
													<li><a class=" text-primary" href="view-issue.php"> <i class="fa fa-eye" aria-hidden="true"></i> View </a></li>
													<li><a class=" text-warning" href="edit-issue.php"> <i class="fa fa-pencil" aria-hidden="true"></i> Edit </a></li>
													<li><a class=" text-danger" href="#"> <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></li>
												</ul>
											</td>
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