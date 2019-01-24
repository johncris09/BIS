<!DOCTYPE html>
<html>
	<head>
		<title>Position</title>
		<?php include('../component/metadata.php'); ?>
		

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
						<h2>All Position</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
                <li><span>Barangay Position</span></li>
								<li><span>Position</span></li>
								
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
											<h2 class="panel-title">Add Position</h2>
										</header>
										<div class="panel-body" style="display: block;">
											<div class="form-group">
												<label class="col-sm-4 control-label">Position Name </label>
												<div class="col-sm-8">
													<input type="text" name="position" placeholder="Position Name" class="form-control" required autofocus>
												</div>
											</div>
										</div>
										<footer class="panel-footer" style="display: block;">
											<div class="row">
												<div class="col-sm-12 text-right">
													<button type="submit" class="btn btn-primary hidden-xs mb-xs mt-xs mr-xs "><i class="fa fa-save"></i> Save</button>
													<button type="submit" class="btn btn-default hidden-xs mb-xs mt-xs mr-xs "> Reset</button>
													<button type="submit" class="btn btn-primary btn-block  visible-xs mb-xs mt-xs mr-xs"><i class="fa fa-save"></i>  Save</button>
													<button type="submit" class="btn btn-default btn-block  visible-xs mb-xs mt-xs mr-xs"> Reset</button>
												</div>
											</div>
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
							
									<h2 class="panel-title">List of All Position</h2>
								</header>
								<div class="panel-body">
									<table class="table table-bordered table-striped mb-none" id="datatable-default">
										<thead>
											<tr>
												<th>Position</th>
											</tr>
										</thead>
										<tbody>
                      <?php for($i=1;$i<=5;$i++){ ?>
											<tr>
												<td>Position <?php echo $i; ?></td>
											</tr>
                      <?php } ?>
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
		
		
		<?php include('../component/themejslink.php');  ?>


		<!-- Examples -->
		<script src="../assets/javascripts/tables/examples.datatables.default.js"></script>
		<script src="../assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
		<script src="../assets/javascripts/tables/examples.datatables.tabletools.js"></script>
	</body>
</html>