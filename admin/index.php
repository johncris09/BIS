
<?php session_start(); ?>
<?php
	// Include all database and object files
	include_once '../classes/Database.php';
	include_once  '../classes/Barangay.php';
	include_once  '../classes/initial.php';

	$barangay = new Barangay($db);
  $prep_state = $barangay->getAllBarangay();
?>
<!DOCTYPE html>
<html>
	<head>	
	  <title>Barangay</title>
		<?php include('../component/metadata.php'); ?>
		<?php include('../component/csslink.php'); ?>
			
	  <!-- Specific Vendor Page -->
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
					<h3 class="mt-lg">Dashboard</h3>
						<div class="row">
							<div class="col-md-12 col-lg-12 col-xl-12">
								<section class="panel panel-primary ">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
										<h2 class="panel-title">Barangay</h2>
									</header>
									<div class="panel-body"> 
											<div class="row">
												<label class="col-sm-4 col-md-3 col-lg-2 control-label"><h5>Select Barangay</h5></label>
												<div class="col-sm-8 col-md-8 col-lg-8">
													<select id="barangay-list" data-plugin-selectTwo class="form-control populate">
														<option value="">Choose Barangay</option>
														<?php while ($row = $prep_state->fetch(PDO::FETCH_ASSOC)) { ?>

														<option value="<?php echo $row['barangay_id'];?>"><?php echo $row['barangay_name']; ?></option>

														<?php 	} ?>
													</select>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-10 col-sm-offset-1">
												<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>

												</div>
											</div> 
                    
									</div>
								</section>
							</div> 
						</div>
						<div class="row">
							<div class="col-md-12 col-lg-12 col-xl-4">
                
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
							<!-- <div class="row">
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
										<div id="accordion">
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
											</div> 
										</section>
									</div>
								</div>
							</div>
						</div>-->

						


						
					<!-- end: page -->
				</section>
			</div>
			


			
		</section>
	
			</div>
			<?php include('../layout/sidebar-right.php'); ?>


		


		</section>
    <!-- Vendor -->
		<?php include('../component/jslink.php'); ?>
			<!-- Specific Page Vendor -->
		<?php include('../component/themejslink.php');  ?>
    <script src="../assets/vendor/jquery-ui/js/jquery-ui.1.12.1.js"></script> 
    <script src="../assets/vendor/canvasjs-2.2/canvasjs.min.js"></script>
		 
    <script>
		$(document).ready(function(){
			var chart = new CanvasJS.Chart("chartContainer", {
				theme:"light2",
				zoomEnabled: true,
				animationEnabled: true,
				animationEnabled: true,
				axisX: {
					title: "Street Name",
					gridThickness: .9,
					lineThickness: .9,
					titleFontSize: 14,
					labelFontSize: 12,
					
				},
				axisY :{
					includeZero: true,
					title: "Number of Population",
					gridThickness: .9,
					lineThickness: .9,
					titleFontSize: 14,
					labelFontSize: 12
				},
				toolTip: {
					shared: "true"
				},
				legend:{
					cursor:"pointer",
					itemclick : toggleDataSeries,
					verticalAlign: "bottom",
					horizontalAlign: "center"
				},
				data: [{
					type: "spline", 
					showInLegend: true,
					name: "Populaltion Number",
					dataPoints: []
						 
				}]
			}); 
			chart.render();
	
			function toggleDataSeries(e) {
				if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible ){
					e.dataSeries.visible = false;
				} else {
					e.dataSeries.visible = true;
				}
				chart.render();
			}
		}); 
    </script>


		
	</body>
</html>