<?php
  
  include_once '../classes/Database.php';
  include_once '../classes/Barangay.php';
  include_once '../classes/initial.php';
  
  
  $barangay = new Barangay($db);
  $prep_state = $barangay->getAllBarangay();
  // $fieldname = $barangay->getBarangayFieldName();
  // $fields = array_keys($fieldname->fetch(PDO::FETCH_ASSOC)); 
  $counter=1;
  $list = '
    <table class="table table-bordered table-striped mb-none" id="datatable-default" >
      <thead>
        <tr>
          <th>#</th>
          <th>Barangay</th>   
          <th>Action</th>    
        </tr>
      </thead>
      <tbody>
  ';
  while ($row = $prep_state->fetch(PDO::FETCH_ASSOC))
  {
    $list .= '
        <tr>
          <td>'.$counter.'</td>
          <td>'.$row['barangay_name'].'</td>
          <td>
            <ul class="list-inline">
              <li><a id="' . $row['barangay_id'] . '" class="text-warning edit-barangay"> <i class="fa fa-pencil" aria-hidden="true"></i> Edit </a></li>
              <li><a id="' . $row['barangay_id'] . '"  class="text-danger delete-barangay"> <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></li>
            </ul>
          </td>
        </tr>
    ';
    $counter++;
  }
  $list = $list . '
      </tbody>
    </table>
  ';

  echo $list;

?>
  

		<script src="../assets/javascripts/tables/examples.datatables.default.js"></script>
		