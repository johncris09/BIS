<?php
  session_start();
  include_once '../classes/Database.php';
  include_once '../classes/BarangayIssue.php';
  include_once '../classes/initial.php';
  
  $barangay_issue = new BarangayIssue($db);
  $prep_state = $barangay_issue->fetchAllIssue($_SESSION['barangay_id']);
  
  // $fields = array_keys($fieldname->fetch(PDO::FETCH_ASSOC)); 
  $counter=1;
  $list = '
    <table class="table table-bordered table-striped mb-none" id="datatable-default" >
      <thead>
        <tr>
          <th>#</th>
          <th>Complainant</th>
          <th>Complained Resident</th>
          <th>Date of Filling</th>
          <th>OIC</th>
          <th>Status</th>
          <th>Action</th> 
        </tr>
      </thead>
      <tbody>
  ';
  while ($row = $prep_state->fetch(PDO::FETCH_ASSOC))
  {
    

    // Convert date format 
    $date_of_filling = new DateTime($row['date_of_filling']);
    $date_of_filling = $date_of_filling->format('F j, Y');
    
    $list .= '
        <tr>
          <td>'.$counter.'</td>
          <td>'.$row['complainant'].'</td>
          <td>'.$row['complained_resident'].'</td>
          <td>'.$date_of_filling.'</td>
          <td>'.$row['oic'].'</td>
          <td>'.$row['status'].'</td>
          <td>
            <ul class="list-inline">
              <li><a href="#viewIssue" id="' . $row['issue_id'] . '" class="text-primary view-issue"> <i class="fa fa-eye" aria-hidden="true"></i> View </a></li>
              <li><a id="' . $row['issue_id'] . '" class="text-warning edit-issue"> <i class="fa fa-pencil" aria-hidden="true"></i> Edit </a></li>
              <li><a id="' . $row['issue_id'] . '"  class="text-danger delete-issue"> <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></li>
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
    
   