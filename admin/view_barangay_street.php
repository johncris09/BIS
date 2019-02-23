
<?php
  
  include_once '../classes/Database.php';
  include_once '../classes/BarangayStreet.php';
  include_once '../classes/initial.php';
  
  
  $barangay_street = new BarangayStreet($db);
  $prep_state = $barangay_street->AllBarangayStreet();
  $fieldname = $barangay_street->getBarangayStreetFieldName();
  $fields = array_keys($fieldname->fetch(PDO::FETCH_ASSOC));  
  $counter=1;
  $list = '
    <table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">		
      <thead>
        <tr>
          <th>#</th>
          <th>Barangay</th>
          <th>Street</th>
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
          <td>'.$row['street_name'].'</td>
          <td>
            <ul class="list-inline">
              <li><a id="' . $row['street_id'] . '" class="text-warning edit-barangay-street"> <i class="fa fa-pencil" aria-hidden="true"></i> Edit </a></li>
              <li><a id="' . $row['street_id'] . '"  class="text-danger delete-barangay-street"> <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></li>
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


<?php include('../component/data-table.php');?>