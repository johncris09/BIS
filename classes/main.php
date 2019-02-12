<?php
  
  session_start();
  // Include all database and object files
  include_once '../classes/Database.php';
  include_once  '../classes/Position.php';
  include_once  '../classes/Barangay.php';
  include_once  '../classes/BarangayStreet.php';
  include_once  '../classes/initial.php';
  include_once  '../classes/Account.php';
  include_once  '../classes/User.php';
  
  
  
  $position         = new Position($db);
  $barangay         = new Barangay($db);
  $barangay_street  = new BarangayStreet($db);
  $account	        = new Account($db);
  $user             = new User($db);

  /********************************************
  *
  * User Account
  *
  *********************************************/

  // get the user id and account to edit and update
  if(isset($_POST['edit_account']))
  {
    $account_id = $_POST['account_id'];
    $prep_state = $account->getAccount($account_id);
    while ($row = $prep_state->fetch(PDO::FETCH_ASSOC))
    {
      $_SESSION['edit_account_id'] = $row['account_id'];
      $_SESSION['edit_user_id'] = $row['user_id'];

    }
  }

  // Find the user id to delete
  if(isset($_POST['find_user_id']))
  {
    $account_id = $_POST['account_id'];
    $data['account_id'] =$account_id;
    $prep_state = $account->getAccount($account_id);
    while ($row = $prep_state->fetch(PDO::FETCH_ASSOC))
    { 
      $data['user_id']= $row['user_id'];
    }
    echo json_encode($data);
  }


  // delete selected user account
  if(isset($_POST['delete_user_account']))
  {
    $account_id = $_POST['account_id'];
    $user_id = $_POST['user_id'];
    // $data = array();
    $data['msg_account'] = $account->deleteUserAccount($account_id);
    $data['msg_user'] = $user->deleteUser($user_id);
    echo json_encode($data);
  }
        

  // Edit User Account
  if(isset($_POST['edit_user_account']))
  {
    $user_id = $_POST['user_id'];
    $account_id = $_POST['account_id'];
    $data = array();
    $prep_state = $account->getUserAccount($user_id,$account_id);
    while ($row = $prep_state->fetch(PDO::FETCH_ASSOC))
    {
      $data['user_id']      = $row['user_id'];
      $data['last_name']    = $row['last_name'];
      $data['first_name']   = $row['first_name'];
      $data['middle_name']  = $row['middle_name'];
      $data['gender']       = $row['gender'];
      $data['civil_status'] = $row['civil_status'];
      $data['citizenship']  = $row['citizenship'];
      $data['barangay_id']  = $row['barangay_id'];
      $data['position_id']  = $row['position_id'];
      $data['account_id']   = $row['account_id'];
      $data['username']     = $row['username'];
      $data['password']     = $row['password'];
      $data['status']       = $row['status'];
      $data['email']        = $row['email'];

    }
    echo json_encode($data);
  }


  // Update User Account
  if(isset($_POST['update_user_acccount']))
  {
    $user_id = $_POST['user_id'];
    $account_id = $_POST['account_id'];
    $first_name = $_POST['first_name'];
    $middle_names = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $civil_status = $_POST['civil_status'];
    $citizenship = $_POST['citizenship'];
    $barangay_list = $_POST['barangay_list'];
    $position_list = $_POST['position_list'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $email = $_POST['email'];

    // Update User information
    $data['msg_user'] = $user->updateUser($user_id,trim($first_name),trim($middle_names),trim($last_name),$gender,trim($civil_status),trim($citizenship),$barangay_list,$position_list);
    // Update User Account
    $data['msg_user_account'] = $account->updateUserAccount($account_id,$username,$password,$role,$email,$user_id);

    echo json_encode($data);
    
  }


  // Add new User Account
  if(isset($_POST['add_new_user_account']))
  {
    $first_name       = $_POST['first_name'];
    $middle_name      = $_POST['middle_name'];
    $last_name	      = $_POST['last_name'];
    $gender           = $_POST['gender'];
    $civil_status     = $_POST['civil_status'];
    $citizenship      = $_POST['citizenship'];
    $barangay_id      = $_POST['barangay_list'];
    $position_id      = $_POST['position_list'];
    $username         = $_POST['username'];
    $password         = $_POST['password'];
    $date_registered  = date("Y-m-d");
    $role             = $_POST['role'];
    $email            = $_POST['email'];
    
    $user_id = $user->saveUser($last_name,$first_name,$middle_name,$gender,$civil_status,$citizenship,$barangay_id,$position_id);
    $data['msg'] = $account->saveUserAccount($username,$password,$email,$date_registered,$role,$user_id);
    
    echo json_encode($data);

  }



  /********************************************
  *
  * Barangay Street
  *
  *********************************************/

  // Edit Barangay Street
  if(isset($_POST['edit_barangay_street']))
  {
    $barangay_street_id = $_POST['barangay_street_id']; // Use to get Specific barangay Street
    $data = array();
    $prep_state = $barangay_street->getBarangayStreet($barangay_street_id);
    while ($row = $prep_state->fetch(PDO::FETCH_ASSOC))
    {
      $data['barangay_id'] = $row['barangay_id'];
      $data['barangay_street'] = $row['street_name'];
      $data['barangay_street_id'] = $row['street_id'];
    }
    echo json_encode($data);

  }

  // Delete Selected Barangay Street
  if(isset($_POST['delete_barangay_street']))
  {
    $barangay_street_id = $_POST['barangay_street_id'];
    $data['msg'] = $barangay_street->deleteBarangayStreet($barangay_street_id);
    echo json_encode($data);
  }

  // Add New Barangay Street
  if(isset($_POST['save_barangay_street']))
  {
    $new_barangay_street = $_POST['barangay_street']; 
    $new_barangay_id = $_POST['barangay_id']; 
    $data['msg'] = $barangay_street->saveBarangayStreet($new_barangay_id,trim($new_barangay_street));
    echo json_encode($data);
  }

  // Update Selecte Barangay Street
  if(isset($_POST['update_barangay_street']))
  {
    $barangay_street_id = $_POST['barangay_street_id'];
    $update_barangay_street = $_POST['barangay_street'];
    $barangay_id = $_POST['barangay_id'];
    $data['msg'] = $barangay_street->updateBarangayStreet( $barangay_street_id,trim($update_barangay_street),$barangay_id);
    echo json_encode($data);
  }






  /********************************************
  *
  * Barangay
  *
  *********************************************/

  // Add New Barangay
  if(isset($_POST['save_barangay']))
  {
    $new_barangay = $_POST['barangay']; 
    $data['msg'] = $barangay->saveBarangay(trim($new_barangay));
    echo json_encode($data);
  }

  // Edit Barangay
  if(isset($_POST['edit_barangay']))
  {
    $barangay_id = $_POST['barangay_id']; // Use to get Specific barangay
    $data = array();
    $prep_state = $barangay->getBarangay($barangay_id);
    while ($row = $prep_state->fetch(PDO::FETCH_ASSOC))
    {
      $data['barangay_id'] = $row['barangay_id'];
      $data['barangay_name'] = $row['barangay_name'];
    }
    echo json_encode($data);
  }

  // Update Barangay
  if(isset($_POST['update_barangay']))
  {
    $barangay_id = $_POST['barangay_id'];
    $barangay_name = $_POST['barangay_name'];
    $data['msg'] = $barangay->updateBarangay($barangay_id,trim($barangay_name));
    echo json_encode($data);
  }
  
  // Delete Selected Barangay
  if(isset($_POST['delete_barangay']))
  {
    $barangay_id = $_POST['barangay_id'];
    $data['msg'] = $barangay->deleteBarangay($barangay_id);
    echo json_encode($data);
  }
  /********************************************
  *
  * Position
  *
  *********************************************/
  
  // Add New Position
  if(isset($_POST['save_position']))
  {
    $new_postision = $_POST['position'];
    $data['msg'] = $position->savePosition(trim($new_postision));
    echo json_encode($data);
    
  }
  
  if(isset($_GET['get_position']))
  {
    $prep_state = $position->getAllPosition();
    $data = array();
    while ($row = $prep_state->fetch(PDO::FETCH_ASSOC))
    {
      $data[] = $row;
    }
    echo json_encode($data);
  }
  
  // Edit Position
  if(isset($_POST['edit_position']))
  {
    $position_id = $_POST['edit_id']; // Use to get Specific position
    $data = array();
    $prep_state = $position->getPosition($position_id);
    while ($row = $prep_state->fetch(PDO::FETCH_ASSOC))
    {
      $data['position_id'] = $row['position_id'];
      $data['position'] = $row['position'];
    }
    echo json_encode($data);
  }
  
  // Update Position
  if(isset($_POST['update_position']))
  {
    $position_id = $_POST['position_id'];
    $position_name = $_POST['position'];
    $data['msg'] = $position->updatePosition($position_id,trim($position_name));
    echo json_encode($data);
  }

  // Delete Selected Position
  if(isset($_POST['delete_position']))
  {
    $position_id = $_POST['delete_id'];
    $data['msg'] = $position->deletePosition($position_id);
    echo json_encode($data);
  }
