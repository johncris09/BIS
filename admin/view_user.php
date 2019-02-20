<?php
  
  include_once '../classes/Database.php';
  include_once '../classes/Account.php';
  include_once '../classes/initial.php';
  
  $account = new Account($db);
  $prep_state = $account->getAllUser();
  $fieldname = $account->getUserAccountFieldName();
  
  // $fields = array_keys($fieldname->fetch(PDO::FETCH_ASSOC)); 
  $counter=1;
  $list = '
    <table class="table table-bordered table-striped mb-none" id="datatable-default" >
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Username</th>
          <th>Email</th>
          <th>Date Registered</th>
          <th>Status</th>
          <th>Action</th>    
        </tr>
      </thead>
      <tbody>
  ';
  while ($row = $prep_state->fetch(PDO::FETCH_ASSOC))
  {
    //Check the user if staff or admin
    $status = ($row['status'] == 1) ? "Staff": "Administration";

    // Convert date format 
    $date_registered = new DateTime($row['registered']);
    $result = $date_registered->format('F j, Y');
    
    $list .= '
        <tr>
          <td>'.$counter.'</td>
          <td>'.$row['Name'].'</td>
          <td>'.$row['username'].'</td>
          <td>'.$row['email'].'</td>
          <td>'.$result.'</td>
          <td>'.$status.'</td>
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
  $list .= '
      </tbody>
    </table>
  ';

  // $no_record = '
  //   <div class="alert alert-info">
  //     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  //     <strong>No record to display!</strong>  Click Add New User to Add.
  //   </div>
  // ';

  echo $list;
  

  // echo (!($fieldname->rowCount()<1)) ?$list: $no_record ;
?>
  

		<script src="../assets/javascripts/tables/examples.datatables.default.js"></script>
    
    <!-- <script src="../../assets/app.js"></script> -->
		