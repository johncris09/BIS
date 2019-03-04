<?php session_start(); ?>
<!doctype html>
<html class="fixed">
	<head>
		<title>404</title>

		<!-- Specific Page Vendor CSS -->
		<?php include('../component/csslink.php'); ?>
		<link rel="stylesheet" href="../assets/vendor/pnotify/pnotify.custom.css" />
		<?php include('../component/cssthemelink.php'); ?>
    

	</head>
	<body>
		<section class="body">

      <?php include('../layout/header.php'); ?>
			<!-- end: header -->

			<div class="inner-wrapper">
        
        <?php include('../layout/sidebar-left.php'); ?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>404</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Pages</span></li>
								<li><span>404</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
						<section class="body-error error-inside">
							<div class="center-error">

								<div class="row">
									<div class="col-md-8">
										<div class="main-error mb-xlg">
											<h2 class="error-code text-dark text-center text-semibold m-none">404 <i class="fa fa-file"></i></h2>
											<p class="error-explanation text-center">We're sorry, but the page you were looking for doesn't exist.</p>
										</div>
									</div>
									<div class="col-md-4">
										<h4 class="text">Here are some useful links</h4>
										<ul class="nav nav-list primary">
											<li>
												<a href="index.php"><i class="fa fa-caret-right text-dark"></i> Dashboard</a>
											</li>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</section>
					<!-- end: page -->
				</section>
          
				</section>
			</div>

			<?php include('../layout/sidebar-right.php'); ?>
		</section>

    
    <?php include('../component/jslink.php'); ?>
		<!-- Specific Page Vendor -->
		<script src="../assets/vendor/pnotify/pnotify.custom.js"></script>
		<?php include('../component/themejslink.php');  ?>
		<script src="../assets/vendor/jquery-ui/js/jquery-ui.1.12.1.js"></script> 
	</body>
</html>