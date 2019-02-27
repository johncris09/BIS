<?php session_start(); ?>
<!doctype html>
<html class="fixed">
	<head>
		<title>Back Up Records</title>

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
						<h2>Back up Records</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Utilities</span></li>
								<li><span>Back up Records</span></li>
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

              <h2 class="panel-title">Back up</h2>
            </header>
            <div class="panel-body">
              <h4>Records should always have a back up&period;</h4>
              
              <div class="row">
                <div class="col-sm-12 text-right">  
                  <button id="back-up" class="mt-sm mb-sm btn text-right btn-success"><i class="fa fa-database"></i> Back up Here</button>
            
                  
                </div>
              </div>
            </div>
          </section>
				
					<!-- end: page -->
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