<?php
  
  include_once '../classes/Database.php';
  include_once '../classes/Account.php';
  include_once '../classes/initial.php';
  
  $account = new Account($db);
  $prep_state = $account->getAllUser();
  $fieldname = $account->getUserAccountFieldName();
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
          <td>'.$row['Name'].'</td>
          <td>'.$row['username'].'</td>
          <td>'.$row['email'].'</td>
          <td>'.$row['registered'].'</td>
          <td>'.$row['status'].'</td>
          <td>
            <ul class="list-inline">
              <li><a id="' . $row['account_id'] . '" class="text-warning edit-account"> <i class="fa fa-pencil" aria-hidden="true"></i> Edit </a></li>
              <li><a id="' . $row['account_id'] . '"  class="text-danger delete-account"> <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></li>
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
		