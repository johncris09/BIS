<!DOCTYPE html>
<html class="fixed">
	<head>
		<title>All Users</title>

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
                  <div id="list_of_user"></div>
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
		<script src="../assets/vendor/pnotify/pnotify.custom.js"></script>
		<script src="../assets/vendor/select2/select2.js"></script>
		<script src="../assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="../assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		
		

		<?php include('../component/themejslink.php');  ?>
		<script src="../assets/vendor/jquery-ui/js/jquery-ui.1.12.1.js"></script> 
		</body>
</html>