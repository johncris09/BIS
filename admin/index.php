
<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>	
      <title>Barangay</title>
      <?php include('../component/metadata.php'); ?>
			<?php include('../component/csslink.php'); ?>
			<link rel="stylesheet" href="../assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
			<link rel="stylesheet" href="../assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
			<link rel="stylesheet" href="../assets/vendor/morris/morris.css" />
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
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
						
						<div class="row">
							<div class="col-md-12 col-lg-12 col-xl-4">
                <h3 class="mt-lg">Dashboard</h3>
								<div class="row">
									<div class="col-md-6 col-xl-12">
										<section class="panel">
											<div class="panel-body bg-primary panel panel-featured-top panel-featured-primary">
												<div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
														<div class="summary-icon">
															<i class="fa fa-user"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">User</h4>
															<div class="info">
																<strong id="user_num" class="amount"></strong>
															</div>
														</div>
														<div class="summary-footer">
															<a href="all-users.php" class="text-uppercase">(view all)</a>
														</div>
													</div>
												</div>
											</div>
										</section>
									</div>
									<div class="col-md-6 col-xl-12">
										<section class="panel">
											<div class="panel-body bg-secondary panel panel-featured-top panel-featured-danger">
												<div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
														<div class="summary-icon">
															<i class="fa fa-map-marker"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">Barangay</h4>
															<div class="info">
																<strong id="barangay_num" class="amount"></strong>
															</div>
														</div>
														<div class="summary-footer">
															<a href="barangay.php" class="text-uppercase">(view all)</a>
														</div>
													</div>
												</div>
											</div>
										</section>
									</div>
                  <div class="col-md-6 col-xl-12">
										<section class="panel">
											<div class="panel-body bg-quartenary">
												<div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
														<div class="summary-icon">
															<i class="fa  fa-road"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">Barangay Steet</h4>
															<div class="info">
																<strong  id="barangay_street_num" class="amount"></strong>
															</div>
														</div>
														<div class="summary-footer">
															<a href="street.php" class="text-uppercase">(view all)</a>
														</div>
													</div>
												</div>
											</div>
										</section>
									</div>
									<div class="col-md-6 col-xl-12">
										<section class="panel">
											<div class="panel-body bg-tertiary">
												<div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
														<div class="summary-icon">
															<i class="fa fa-sitemap"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">Position</h4>
															<div class="info">
																<strong id="position_num" class="amount"></strong>
															</div>
														</div>
														<div class="summary-footer">
															<a href="position.php" class="text-uppercase">(view all)</a>
														</div>
													</div>
												</div>
											</div>
										</section>
									</div>
									
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-lg-6">
								<div class="row">
									<div class="col-md-12 col-xl-6">
										<section class="panel panel-group">
											<header class="panel-heading bg-primary">
						
												<div class="widget-profile-info">
													<div class="profile-picture">
														<img src="../assets/images/default-avatar.jpg">
													</div>
													<div class="profile-info">
														<h4 class="name text-semibold"><?php echo $name; ?></h4>
														<h5 class="role"><?php echo $role == 0 ? "Administration": ""; ?></h5>
														<h6 class="email"><?php echo $_SESSION['email']; ?></h6>
														<div class="profile-footer">
															<a href="profile.php">(edit profile)</a>
														</div>
													</div>
												</div>
						
											</header>
											<!-- <div id="accordion">
												<div class="panel panel-accordion panel-accordion-first">
													<div class="panel-heading">
														<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse1One">
																<i class="fa fa-check"></i> Tasks
															</a>
														</h4>
													</div>
													<div id="collapse1One" class="accordion-body collapse in">
														<div class="panel-body">
															<ul class="widget-todo-list">
																<li>
																	<div class="checkbox-custom checkbox-default">
																		<input type="checkbox" checked="" id="todoListItem1" class="todo-check">
																		<label class="todo-label" for="todoListItem1"><span>Lorem ipsum dolor sit amet</span></label>
																	</div>
																	<div class="todo-actions">
																		<a class="todo-remove" href="#">
																			<i class="fa fa-times"></i>
																		</a>
																	</div>
																</li>
																<li>
																	<div class="checkbox-custom checkbox-default">
																		<input type="checkbox" id="todoListItem2" class="todo-check">
																		<label class="todo-label" for="todoListItem2"><span>Lorem ipsum dolor sit amet</span></label>
																	</div>
																	<div class="todo-actions">
																		<a class="todo-remove" href="#">
																			<i class="fa fa-times"></i>
																		</a>
																	</div>
																</li>
																<li>
																	<div class="checkbox-custom checkbox-default">
																		<input type="checkbox" id="todoListItem3" class="todo-check">
																		<label class="todo-label" for="todoListItem3"><span>Lorem ipsum dolor sit amet</span></label>
																	</div>
																	<div class="todo-actions">
																		<a class="todo-remove" href="#">
																			<i class="fa fa-times"></i>
																		</a>
																	</div>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div> -->
										</section>
									</div>
								</div>
							</div>
						</div>

						
					<!-- end: page -->
				</section>
			</div>

			<aside id="sidebar-right" class="sidebar-right">
				<div class="nano">
					<div class="nano-content">
						<a href="#" class="mobile-close visible-xs">
							Collapse <i class="fa fa-chevron-right"></i>
						</a>
			
						<div class="sidebar-right-wrapper">
			
							<div class="sidebar-widget widget-calendar">
								<h6>Upcoming Tasks</h6>
								<div data-plugin-datepicker data-plugin-skin="dark" ></div>
			
								<ul>
									<li>
										<time datetime="2014-04-19T00:00+00:00">04/19/2014</time>
										<span>Company Meeting</span>
									</li>
								</ul>
							</div>
			
							<div class="sidebar-widget widget-friends">
								<h6>Friends</h6>
								<ul>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="../assets/images/default-avatar.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="../assets/images/default-avatar.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-offline">
										<figure class="profile-picture">
											<img src="../assets/images/default-avatar.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-offline">
										<figure class="profile-picture">
											<img src="../assets/images/default-avatar.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
								</ul>
							</div>
			
						</div>
					</div>
				</div>
			</aside>
		</section>
	
			</div>
			<?php include('../layout/sidebar-right.php'); ?>


		


		</section>
    <!-- Vendor -->
		<?php include('../component/jslink.php'); ?>
			<!-- Specific Page Vendor -->
		<?php include('../component/themejslink.php');  ?>
		<script src="../assets/vendor/jquery-ui/js/jquery-ui.1.12.1.js"></script> 
		
	</body>
</html>