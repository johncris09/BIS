<?php   
	session_start();

	include_once '../classes/Database.php';
	include_once '../classes/BarangayStreet.php'; 
	include_once  '../classes/ResidenceHousehold.php'; 
	include_once  '../classes/initial.php'; 


	$barangay_street = new BarangayStreet($db); 
	$residence_household = new ResidenceHousehold($db);

	$prep_state = $barangay_street->fetchSpecificStreetName($_SESSION['login_user_id']); 
	while($row = $prep_state->fetch(PDO::FETCH_ASSOC)) { 
		$gender = $residence_household->ResidenceHouseholdGender($_SESSION['barangay_id'],$row['street_name']);
		$result = $gender->fetch(PDO::FETCH_ASSOC); 
		$data[$row['street_name']] = array('Male'=>$result['Male'],'Female'=>$result['Female']); 
	}     
	
	// var_dump($data);
?>
<!DOCTYPE html>
<html class="fixed">
  <head>
    
    <title>Dashboard</title>

    <?php include('../component/metadata.php'); ?>

    <?php include('../component/csslink.php'); ?>
    
    <?php include('../component/cssthemelink.php'); ?>
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
            
						<h3 class="mt-none">Dashboard</h3>
						<div class="row">
							<div class="col-md-6 col-lg-6 col-xl-3">
								<section class="panel panel-featured-left panel-featured-primary">
									<div class="panel-body">
										<div class="widget-summary">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-users"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title">Residence Household</h4>
													<div class="info">
														<strong id="residence_household_num" class="amount"></strong>
													</div>
												</div>
												<div class="summary-footer">
													<a  href="all-resident.php"  class="text-muted text-uppercase">(view all)</a>
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
							<div class="col-md-6 col-lg-6 col-xl-3">
								<section class="panel panel-featured-left panel-featured-primary">
									<div class="panel-body">
										<div class="widget-summary">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-folder-open"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title">Barangay Cases</h4>
													<div class="info">
														<strong id="issue_num" class="amount"></strong>
													</div>
												</div>
												<div class="summary-footer">
													<a href="all-issue.php" class="text-muted text-uppercase">(view all)</a>
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
							<div class="col-md-6 col-lg-6 col-xl-3">
								<section class="panel panel-featured-left panel-featured-primary">
									<div class="panel-body">
										<div class="widget-summary">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-male"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title">Male</h4>
													<div class="info">
														<strong id="male_num" class="amount"></strong>
													</div>
												</div>
												<div class="summary-footer">
													<a href="all-resident.php" class="text-muted text-uppercase">(view all)</a>
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
							<div class="col-md-6 col-lg-6 col-xl-3">
								<section class="panel panel-featured-left panel-featured-primary">
									<div class="panel-body">
										<div class="widget-summary">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-female"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title">Female</h4>
													<div class="info">
														<strong id="female_num" class="amount"></strong>
													</div>
												</div>
												<div class="summary-footer">
													<a href="all-resident.php" class="text-muted text-uppercase">(view all)</a>
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
						
										</header>
									<div class="panel-body">
										<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
									</div>
								</section>
							</div>
						</div>
						
            
						

              
              
            <!-- end: page -->
          </section>
      </div>
      
      <?php include('../layout/sidebar-right.php'); ?>


    </section>
    <?php include('../component/jslink.php'); ?>
		<?php include('../component/themejslink.php');  ?>
		<script src="../assets/vendor/jquery-ui/js/jquery-ui.1.12.1.js"></script> 
		 
		


		<script src="../assets/vendor/canvasjs-2.2/canvasjs.min.js"></script>
		<?php 
			$chart = '
			<script>
			
			window.onload = function () {

			var chart = new CanvasJS.Chart("chartContainer", {
				animationEnabled: true,
				title:{
					text: "Residence Household"
				},	
				axisY: {
					title: "Male",
					titleFontColor: "#4F81BC",
					lineColor: "#4F81BC",
					labelFontColor: "#4F81BC",
					tickColor: "#4F81BC"
				},
				axisY2: {
					title: "Female",
					titleFontColor: "#ff1a00",
					lineColor: "#ff1a00",
					labelFontColor: "#ff1a00",
					tickColor: "#ff1a00"
				},				
				toolTip: {
					shared: true
				},
				legend: {
					cursor:"pointer",
					itemclick: toggleDataSeries
				},
				data: [{
					type: "column",
					name: "Male",
					legendText: "Male",
					showInLegend: true, 
					dataPoints:[';
						$barangay_street = new BarangayStreet($db); 
						$prep_state = $barangay_street->fetchSpecificStreetName($_SESSION['login_user_id']); 
						while($row = $prep_state->fetch(PDO::FETCH_ASSOC)) { 
						
							$chart .= '{ label: "'.$row['street_name'].'", y:'.$data[$row['street_name']]['Male'].' },';
						} 	
			$chart .= ']
				},
				{
					type: "column",	
					name: "Female",
					legendText: "Female",
					axisYType: "secondary",
					showInLegend: true,
					dataPoints:[';
					$barangay_street = new BarangayStreet($db); 
					$prep_state = $barangay_street->fetchSpecificStreetName($_SESSION['login_user_id']); 
					while($row = $prep_state->fetch(PDO::FETCH_ASSOC)) { 
					
						$chart .= '{ label: "'.$row['street_name'].'", y:'.$data[$row['street_name']]['Female'].' },';
					} 	
			$chart .= ']
				}]
			});
			chart.render();

			function toggleDataSeries(e) {
				if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
					e.dataSeries.visible = false;
				}
				else {
					e.dataSeries.visible = true;
				}
				chart.render();
			}

			$("a.canvasjs-chart-credit").text("")

			}
			</script>';

			echo $chart;
		?>
		<script>
	
		</script>
  </body>
</html>