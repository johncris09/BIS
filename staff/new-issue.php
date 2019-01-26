<!DOCTYPE html>
<html class="fixed">
	<head>
		<title>New Issue</title>

		<?php include('../component/metadata.php'); ?>

		<?php include('../component/csslink.php'); ?>
    <!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="../assets/vendor/summernote/summernote.css" />

		<?php include('../component/cssthemelink.php'); ?>

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
						<h2>New Issue</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Barangay Issue</span></li>
								<li><span>Add New User</span></li>
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
						
								<h2 class="panel-title">Add New Issue</h2>
							</header>
							<div class="panel-body">
                <form class="form-horizontal form-bordered">
                 <div class="row">
                    <div class="col-sm-5">
                      <div class="form-group">
												<label class="col-md-5 control-label" for="Complained">Complained</label>
												<div class="col-md-7">
													<select id="Complained" name="complained" class="form-control" required>
                            <option value="">Choose Complained</option>
                            <? for($i=1;$i<=5;$i++){?>
                            <option value="Person <? echo $i; ?>">Person <? echo $i; ?></option>
                            <? } ?>
													</select>
												</div>
                      </div>
                      <div class="form-group">
												<label class="col-md-5 control-label" for="ComplainedResident">Complained Resident</label>
												<div class="col-md-7">
													<select id="ComplainedResident" name="complained_resident" class="form-control " required>
                            <option value="">Choose Complained</option>
                            <? for($i=1;$i<=5;$i++){?>
                            <option value="Person <? echo $i; ?>">Person <? echo $i; ?></option>
                            <? } ?>
													</select>
												</div>
                      </div>
                      <div class="form-group">
												<label class="col-md-5 control-label" for="Status">Status</label>
												<div class="col-md-7">
													<select id="Status" name="status" class="form-control mb-md " disabled>
                            <option value="Pending">Pending</option>
                            <option value="Ongoing">Ongoing</option>
                            <option value="Resolve">Resolve Issue</option>
													</select>
												</div>
                      </div>
                    </div>
                    <div class="col-sm-7">
                      <div class="form-group">
												<label class="col-sm-2 control-label " for="description">Description</label>
												<div class="col-sm-12">
													<div class="summernote" id="description" name="description" data-plugin-summernote data-plugin-options='{ "height": 250, "codemirror": { "theme": "ambiance" } }'>
                            Description here . . .
                          </div>
												</div>
											</div>
                    </div>
                  </div>
                  
                
              </div>
              <div class="panel-footer">
                <div class="row">
                  <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                  </div>
                </div>
              </div>
						</section>
						
					<!-- end: page -->
				</section>
			</div>

			<?php include('../layout/sidebar-right.php'); ?>
		</section>

		<?php  include('../component/jslink.php'); ?>
		<!-- Specific Page Vendor -->
		<script src="../assets/vendor/summernote/summernote.js"></script>
		
		<?php include('../component/themejslink.php'); ?>

		<!-- Examples -->
		<script src="../assets/javascripts/tables/examples.datatables.default.js"></script>
		</body>
</html>