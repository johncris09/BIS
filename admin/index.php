
<?php session_start(); ?>

<!DOCTYPE html>
<html>
	<head>	
			<title>Barangay</title>
			<?php include('../component/metadata.php'); ?>
		
			<?php include('../component/csslink.php'); ?>
			<?php include('../component/cssthemelink.php'); ?>

	</head>
	<body>
		<section class="body">
			

			<?php include('../layout/header.php'); ?>
			<div class="inner-wrapper">

				<?php include('../layout/sidebar-left.php'); ?>
				
				<section role="main" class="content-body">
						<header class="page-header">
							<h2>Dashboard</h2>
						
							<div class="right-wrapper pull-right">
								<ol class="breadcrumbs">
									<li>
										<a href="index.php">
											<i class="fa fa-home"></i>
										</a>
									</li>
									<li><span>Dashboard</span></li>
								</ol>
						
								<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
							</div>
						</header>

						<!-- Main Content -->

						

							
						
			</div>
			
			<?php include('../layout/sidebar-right.php'); ?>


		</section>
		<!-- Vendor -->
			
		<?php include('../component/jslink.php'); ?>
		<?php include('../component/themejslink.php');  ?>
		<script src="../assets/vendor/jquery-ui/js/jquery-ui.1.12.1.js"></script> 
		
	</body>
</html>