<!DOCTYPE html>
<html>
<head>
	<title>All Users</title>

	<?php include('../component/metadata.php'); ?>
	
	
	<!-- Specific Page Vendor CSS -->
	<link rel="stylesheet" href="../assets/vendor/select2/select2.css" />
	<link rel="stylesheet" href="../assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

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
						<h2>All Users</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Users</span></li>
								<li><span>All Users</span></li>
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
						
								<h2 class="panel-title">List of All User</h2>
							</header>
							<div class="panel-body">
								<div class="row">
									<div class="col-sm-12 text-right">
										<a href="new-user.php" title="Add New User" class="btn btn-primary mb-sm mt-xs mr-xs">Add New User</a>
									</div>
								</div>
								
								<table class="table table-bordered table-striped mb-none" id="datatable-default">
									<thead>
										<tr>
											<th>Name</th>
											<th>Username</th>
											<th>Password</th>
											<th>Email</th>
											<th>Registered</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										<?php for($i=1;$i<=20;$i++){ ?>
										<tr class="gradeA">
										<td>Juan Tamad</td>
											<td>john</td>
											<td>$897328hjehfjehwr889</td>
											<td>email@email.com</td>
											<td>2019-01-22 05:36:18</td>
											<td>Administrator</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
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
		<script src="../assets/vendor/select2/select2.js"></script>
		<script src="../assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="../assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="../assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		
		<?php include('../component/themejslink.php');  ?>


		<!-- Examples -->
		<script src="../assets/javascripts/tables/examples.datatables.default.js"></script>
		<script src="../assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
		<script src="../assets/javascripts/tables/examples.datatables.tabletools.js"></script>
	</body>
</html>