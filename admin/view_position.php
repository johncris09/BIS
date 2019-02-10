<?php
  
  include_once '../classes/Database.php';
  include_once '../classes/Position.php';
  include_once '../classes/initial.php';
  
  $position = new Position($db);
  $prep_state = $position->getAllPosition();
  $fieldname = $position->getPositionFieldName();
  $fields = array_keys($fieldname->fetch(PDO::FETCH_ASSOC)); 
  $counter=1;
  $list = '
    <table class="table table-bordered table-striped mb-none" id="datatable-default" >
      <thead>
        <tr>
          <th>#</th>';
      // Iterate all selected fieldnames
      for( $i = 0 ; $i < sizeof($fields) ; $i++ ){
        $list .= '
          <th>'.$fields[$i].'</th> ';
      }     
  
   $list .='   
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
          <td>'.$row['position'].'</td>
          <td>
            <ul class="list-inline">
              <li><a id="' . $row['position_id'] . '" class="text-warning edit-position"> <i class="fa fa-pencil" aria-hidden="true"></i> Edit </a></li>
              <li><a id="' . $row['position_id'] . '"  class="text-danger delete-position"> <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></li>
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
    
    <!-- <script src="../../assets/app.js"></script> -->
		