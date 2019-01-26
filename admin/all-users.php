<!DOCTYPE html>
<html class="fixed">
	<head>
		<title>All Users</title>

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
								<table class="table table-bordered table-hover table-striped mb-none" id="datatable-default">
								<thead>
									<tr>
                    <th>#</th>
										<th>Name</th>
										<th>Username</th>
										<th>Email</th>
										<th>Registered</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php for($i=1;$i<=20;$i++){ ?>
									<tr class="gradeA">
                    <th><? echo $i; ?></th>
                    <td>Juan Tamad</td>
										<td>john</td>
										<td>email@email.com</td>
										<td>2019-01-22 05:36:18</td>
										<td>Administrator</td>
										<td>
											<ul class="list-inline">
												<li><a class="btn text-warning" href="edit-user.php"> <i class="fa fa-pencil" aria-hidden="true"></i> Edit </a></li>
												<!-- on:click('delete'){Call Modal} -->
												<li><a class="btn text-danger" href="#"> <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></li>
											</ul>
										</td>
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