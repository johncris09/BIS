
<?php session_start(); ?>
<?php
	// Include all database and object files
  include_once '../classes/Database.php';
  include_once '../classes/ResidenceHousehold.php';
  include_once  '../classes/initial.php';

  $residence_household = new ResidenceHousehold($db);
  $prep_state = $residence_household->fetchAllPopulation();
  ?>
  
<!DOCTYPE html>
<html>
	<head>	
	  <title>Population</title>
		<?php include('../component/metadata.php'); ?>
		<?php include('../component/csslink.php'); ?>
			
	  <!-- Specific Vendor Page -->
    <link rel="stylesheet" href="../assets/vendor/jquery-datatables/media/css/jquery.dataTables.css"> 
    <link rel="stylesheet" href="../assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
		<link rel="stylesheet" href="../assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="../assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />

		<?php include('../component/cssthemelink.php'); ?>
	</head>
	<body>
		<section class="body">
			<?php include('../layout/header.php'); ?>

		  <div class="inner-wrapper">
				<?php include('../layout/sidebar-left.php'); ?>

        
			<section role="main" class="content-body">
			  <header class="page-header">
			    <h2>Population</h2>
			    <div class="right-wrapper pull-right">
			      <ol class="breadcrumbs">
						<li>
							<a href="index.html">
								<i class="fa fa-home"></i>
							</a>
						</li>
						<li><span>Population</span></li>
					</ol>

					<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
				  </div>
				</header>


       
        <section class="col-sm-6 panel panel-featured panel-featured-primary">
          <header class="panel-heading">
            <div class="panel-actions">
              <a href="#" class="fa fa-caret-down"></a>
              <a href="#" class="fa fa-times"></a>
            </div>
        
            <h2 class="panel-title">List of All User</h2>
          </header>
          <div class="panel-body"> 
            <div class="panel-body">

            <table id="example" class="display table table-hover table-striped" cellspacing="0" width="100%">
              <thead>
                  <tr>
                    <th>#</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Extension Name</th>
                    <th>House #</th>
                    <th>Birthplace</th>
                    <th>Birthdate</th>
                    <th>Sex</th>
                    <th>Civil Status</th>
                    <th>Citizenship</th>
                    <th>Occupation</th>
                    <th>Street Name</th>
                    <th>Barangay</th>
                    <th>Household #</th>
                    <th>Date Registered</th>
                    <th>Staff</th>
                  </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Last Name</th>
                  <th>First Name</th>
                  <th>Middle Name</th>
                  <th>Extension Name</th>
                  <th>House #</th>
                  <th>Birthplace</th>
                  <th>Birthdate</th>
                  <th>Sex</th>
                  <th>Civil Status</th>
                  <th>Citizenship</th>
                  <th>Occupation</th>
                  <th>Street Name</th>
                  <th>Barangay</th>
                  <th>Household #</th>
                  <th>Date Registered</th>
                  <th>Staff</th>
                </tr>
              </tfoot>

              <tbody>
              <?php
              $counter =  1;
              while ($row = $prep_state->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                  <td><?php echo $counter; ?></td>
                  <td><?php echo $row['last_name']; ?></td>
                  <td><?php echo $row['first_name']; ?></td>
                  <td><?php echo $row['middle_name']; ?></td>
                  <td><?php echo $row['extension']; ?></td>
                  <td><?php echo $row['house_number']; ?></td>
                  <td><?php echo $row['birthplace']; ?></td>
                  <td><?php echo $row['birthdate']; ?></td>
                  <td><?php echo $row['sex']; ?></td>
                  <td><?php echo $row['civil_status']; ?></td>
                  <td><?php echo $row['citizenship']; ?></td>

                  <td><?php echo $row['occupation']; ?></td>
                  <td><?php echo $row['street_name']; ?></td>
                  <td><?php echo $row['barangay_name']; ?></td>
                  <td><?php echo $row['household_number']; ?></td>
                  <td><?php echo $row['date_accomplished']; ?></td>
                  <td><?php echo $row['staff']; ?></td>
                </tr>

              
              <?php

              $counter++;
              }
              
              ?>
              </tbody>
          </table>
            </div>
            
          </div>
          
        </section>
		
    
    <?php include('../layout/sidebar-right.php'); ?>
		</section>
    <!-- Vendor -->
		<?php include('../component/jslink.php'); ?>
    <!-- Specific Page Vendor --> 
    <script src="../assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>

		<script src="../assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
		<script src="../assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="../assets/vendor/select2/select2.js"></script>
		<script src="../assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>

    <?php include('../component/themejslink.php');  ?>
    <script src="../assets/vendor/jquery-ui/js/jquery-ui.1.12.1.js"></script> 
 
<script>
$(document).ready(function() { 
    // $('#example').dataTable( {
    //     "scrollY": 500,
    //     "scrollX": true
    // } );
  var table = $('#example').DataTable();

  $("#example tfoot th").each( function ( i ) {

      var select = $('<select data-plugin-selectTwo class="form-control" ><option value=""></option></select>')
          .appendTo( $(this).empty() )
          .on( 'change', function () {
              var val = $(this).val();

              table.column( i )
                  .search( val ? '^'+$(this).val()+'$' : val, true, false )
                  .draw();
          } );

      table.column( i ).data().unique().sort().each( function ( d, j ) {
          select.append( '<option value="'+d+'">'+d+'</option>' )
      } );
  } );

  
  

} );

</script>
		
	</body>
</html>