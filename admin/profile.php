<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dasboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <?php include('../component/csslink.php'); ?>
  <!--

  Css
  -->


</head>
<body>
  <section class="body">
    

    <?php include('../layout/header.php'); ?>
    <div class="inner-wrapper">

      <?php include('../layout/sidebar-left.php'); ?>
			
			<section role="main" class="content-body">
					<header class="page-header">
						<h2>Profile</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
                <li><span>User</span></li>
                <li><span>Your Profile</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- Main Content -->

					

						
					
    </div>
    
    <?php include('../layout/sidebar-right.php'); ?>


  </section>
  <?php include('../component/jslink.php');  ?>
  
  <?php include('../component/themejslink.php');  ?>
</body>
</html>