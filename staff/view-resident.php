<?php
  session_start();
  include_once '../classes/Database.php';
  include_once '../classes/ResidenceHousehold.php';
  include_once '../classes/initial.php';
  
  $residence_household = new ResidenceHousehold($db);
  $prep_state = $residence_household->fetchResidenceHouseholdWithinTheBarangay($_SESSION['barangay_id']);
  
  $counter=1;
  $list = '
    <table class="table table-bordered table-striped mb-none" id="datatable-default" >
      <thead>
        <tr>
          <th>#</th>
          <th>Last Name</th>
          <th>First Name</th>
          <th>Middle Name</th>
          <th>Extension</th>
          <th>House Number</th>
          <th>Birthplace</th>
          <th>Birthdate</th>
          <th>Status</th>
          <th>Civil Status</th>
          <th>Citizenship</th>
          <th>Occupation</th>
          <th>Household #</th>
          <th>Date Accomplished</th>
          <th>Staff</th>
          <th>Action</th> 
        </tr>
      </thead>
      <tbody>
  ';
  while ($row = $prep_state->fetch(PDO::FETCH_ASSOC))
  {
    

    // Convert date format 
    $birthdate = new DateTime($row['birthdate']);
    $birthdate = $birthdate->format('F j, Y');
    
    $list .= '
        <tr>
          <td>'.$counter.'</td>
          <td>'.$row['last_name'].'</td>
          <td>'.$row['first_name'].'</td>
          <td>'.$row['middle_name'].'</td>
          <td>'.$row['extension'].'</td>
          <td>'.$row['house_number'].'</td>
          <td>'.$row['birthplace'].'</td>
          <td>'.$birthdate.'</td>
          <td>'.$row['sex'].'</td>
          <td>'.$row['civil_status'].'</td>
          <td>'.$row['citizenship'].'</td>
          <td>'.$row['occupation'].'</td>
          <td>'.$row['household_number'].'</td>
          <td>'.$row['date_accomplished'].'</td>
          <td>'.$row['staff'].'</td>
          <td>
            <ul class="list-inline">
              <!--
              <li><a id="' . $row['person_id'] . '" class="text-primaru view-person"> <i class="fa fa-eye" aria-hidden="true"></i> View </a></li>
              -->
              <li><a id="' . $row['person_id'] . '" class="text-warning edit-person"> <i class="fa fa-pencil" aria-hidden="true"></i> Edit </a></li>
              <li><a id="' . $row['person_id'] . '"  class="text-danger delete-person"> <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></li>
            </ul>
          </td>
        </tr>
    ';
    $counter++;
  }
  $list .= '
      </tbody>
    </table>
  ';

  echo $list;
  

?>
  

		<script src="../assets/javascripts/tables/examples.datatables.default.js"></script>
    
   