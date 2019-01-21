<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dasboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	

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
						<h2>All Barangay</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
                <li><span>Barangay &amp; Streets</span></li>
								<li><span>Barangay</span></li>
								
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					
					<div class="row">
							<div class="col-md-5">
								<form id="form1" class="form-horizontal">
									<section class="panel">
										<header class="panel-heading">
											<div class="panel-actions">
												<a href="#" class="fa fa-caret-down"></a>
												<a href="#" class="fa fa-times"></a>
											</div>
											<h2 class="panel-title">Add Barangay</h2>
										</header>
										<div class="panel-body" style="display: block;">
											<div class="form-group">
												<label class="col-sm-4 control-label">Barangay </label>
												<div class="col-sm-8">
													<input type="text" name="name" class="form-control" required autofocus>
												</div>
											</div>
										</div>
										<footer class="panel-footer" style="display: block;">
											<button type="submit" class="btn btn-primary mb-xs mt-xs mr-xs ">Save</button>
											<button type="reset" class="btn btn-default">Reset</button>
										</footer>
									</section>
								</form>
							</div>
						<div class="col-md-7">
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>
							
									<h2 class="panel-title">List of All Barangay</h2>
								</header>
								<div class="panel-body">
									<table class="table table-bordered table-striped mb-none" id="datatable-default">
										<thead>
											<tr>
												<th>Rendering engine</th>
												<th>Browser</th>
												<th>Platform(s)</th>
												<th class="hidden-phone">Engine version</th>
												<th class="hidden-phone">CSS grade</th>
											</tr>
										</thead>
										<tbody>
											
											<tr class="gradeX">
												<td>Misc</td>
												<td>Dillo 0.8</td>
												<td>Embedded devices</td>
												<td class="center hidden-phone">-</td>
												<td class="center hidden-phone">X</td>
											</tr>
											<tr class="gradeX">
												<td>Misc</td>
												<td>Links</td>
												<td>Text only</td>
												<td class="center hidden-phone">-</td>
												<td class="center hidden-phone">X</td>
											</tr>
											<tr class="gradeX">
												<td>Misc</td>
												<td>Lynx</td>
												<td>Text only</td>
												<td class="center hidden-phone">-</td>
												<td class="center hidden-phone">X</td>
											</tr>
											<tr class="gradeC">
												<td>Misc</td>
												<td>IE Mobile</td>
												<td>Windows Mobile 6</td>
												<td class="center hidden-phone">-</td>
												<td class="center hidden-phone">C</td>
											</tr>
											<tr class="gradeC">
												<td>Misc</td>
												<td>PSP browser</td>
												<td>PSP</td>
												<td class="center hidden-phone">-</td>
												<td class="center hidden-phone">C</td>
											</tr>
											<tr class="gradeU">
												<td>Other browsers</td>
												<td>All others</td>
												<td>-</td>
												<td class="center hidden-phone">-</td>
												<td class="center hidden-phone">U</td>
											</tr>
										</tbody>
									</table>
								</div>
							</section>
						</div>

					</div>
						
						
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
		
		<!-- Theme Base, Components and Settings -->
		<script src=" ../assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src=" ../assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src=" ../assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="../assets/javascripts/tables/examples.datatables.default.js"></script>
		<script src="../assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
		<script src="../assets/javascripts/tables/examples.datatables.tabletools.js"></script>
	</body>
</html>