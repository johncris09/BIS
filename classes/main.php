<?php
  
  session_start();
  // Include all database and object files
  include_once '../classes/Database.php';
  include_once '../classes/Position.php';
  include_once '../classes/Barangay.php';
  include_once '../classes/BarangayStreet.php';
  include_once '../classes/initial.php';
  include_once '../classes/Account.php';
  include_once '../classes/BackUp.php';
  include_once '../classes/Person.php';
  include_once '../classes/Household.php';
  include_once '../classes/ResidenceHousehold.php';
  include_once '../classes/BarangayIssue.php';
  include_once '../classes/User.php';
  
  
  
  
  $position             = new Position($db);
  $barangay             = new Barangay($db);
  $barangay_street      = new BarangayStreet($db);
  $account	            = new Account($db);
  $user                 = new User($db);
  $backup               = new BackUp($db);
  $person	              = new Person($db);
  $household            = new Household($db);
  $residence_household  = new ResidenceHousehold($db);
  $barangay_issue	      = new BarangayIssue($db);

  /********************************************
  *
  * Back Up 
  *
  *********************************************/

  
  if(isset($_POST['admin_backup']))
  {
    $data['msg']=$backup->backup();
    echo json_encode($data);
  }

  /********************************************
  *
  * Login 
  *
  *********************************************/
   
 

  if(isset($_POST['log_out']))
  {
    if(session_destroy()) 
    {
      $data['msg'] = true;
    }
    echo json_encode($data);
  }

  if(isset($_POST['log_in']))
  {
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    $data       = array();
    $prep_state = $account->loginUser(trim($username),trim($password));
    if($prep_state->rowCount() >0){
      while ($row = $prep_state->fetch(PDO::FETCH_ASSOC))
      {
        $_SESSION['login_user_id']      = $row['user_id'];
        $_SESSION['last_name']          = $row['last_name'];
        $_SESSION['first_name']         = $row['first_name'];
        $_SESSION['middle_name']        = $row['middle_name'];
        $_SESSION['gender']             = $row['gender'];
        $_SESSION['civil_status']       = $row['civil_status'];
        $_SESSION['citizenship']        = $row['citizenship'];
        $_SESSION['barangay_id']        = $row['barangay_id'];
        $_SESSION['position_id']        = $row['position_id'];
        $_SESSION['login_account_id']   = $row['account_id'];
        $_SESSION['username']           = $row['username'];
        $_SESSION['password']           = $row['password'];
        $_SESSION['status']             = $row['status'];
        $data['status']                 = $row['status'];
        $_SESSION['email']              = $row['email'];
      }
    }else{
      $data['msg'] = "Invalid Login";
    }
    
    
    echo json_encode($data);
  }


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
      $_SESSION['edit_account_id']  = $row['account_id'];
      $_SESSION['edit_user_id']     = $row['user_id'];

    }
  }

  // Find the user id to delete
  if(isset($_POST['find_user_id']))
  {
    $account_id         = $_POST['account_id'];
    $data['account_id'] = $account_id;
    $prep_state         = $account->getAccount($account_id);
    while ($row = $prep_state->fetch(PDO::FETCH_ASSOC))
    { 
      $data['user_id']= $row['user_id'];
    }
    echo json_encode($data);
  }


  // delete selected user account
  if(isset($_POST['delete_user_account']))
  {
    $account_id	          = $_POST['account_id'];
    $user_id              = $_POST['user_id'];
    $data                 = array();
    $result               = $account->deleteUserAccount($account_id);
    if($result == "true"){
      $data['msg'] = $user->deleteUser($user_id);
    }else{
      $data['msg'] = "false";
    }
    echo json_encode($data);
  }


  // Edit Profile
  if(isset($_POST['check_password']))
  {
    
    $old_password     = $_POST['old_password'];
    $login_account_id = $_POST['login_account_id'];
    $login_user_id    = $_POST['login_user_id'];
    $data             = array();
    $result           = $account->checkPassword($login_account_id,$login_user_id,$old_password);
    $data['msg']      = $result->RowCount() ? true: false;
    echo json_encode($data);
  }
        

  // Edit User Account
  if(isset($_POST['edit_user_account']))
  {
    $user_id    = $_POST['user_id'];
    $account_id = $_POST['account_id'];
    $data       = array();
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
    $user_id        = $_POST['user_id'];
    $account_id     = $_POST['account_id'];
    $first_name     = $_POST['first_name'];
    $middle_names   = $_POST['middle_name'];
    $last_name      = $_POST['last_name'];
    $gender         = $_POST['gender'];
    $civil_status   = $_POST['civil_status'];
    $citizenship    = $_POST['citizenship'];
    $barangay_list  = $_POST['barangay_list'];
    $position_list  = $_POST['position_list'];
    $username       = $_POST['username'];
    $password       = $_POST['password'];
    $role           = $_POST['role'];
    $email          = $_POST['email'];

    // Update User information
    $data['msg_user'] = $user->updateUser($user_id,trim($first_name),trim($middle_names),trim($last_name),$gender,trim($civil_status),trim($citizenship),$barangay_list,$position_list);
    // Update User Account
    $data['msg_user_account'] = $account->updateUserAccount($account_id,$username,$password,$role,$email,$user_id);

    echo json_encode($data);
    
  }
  if(isset($_POST['update_profile']))
  {

    $user_id        = $_POST['user_id'];
    $account_id     = $_POST['account_id'];
    $first_name     = $_POST['first_name'];
    $middle_names   = $_POST['middle_name'];
    $last_name      = $_POST['last_name'];
    $gender         = $_POST['gender'];
    $civil_status   = $_POST['civil_status'];
    $citizenship    = $_POST['citizenship'];
    $username       = $_POST['username'];
    $password       = $_POST['password'];
    $role           = $_POST['role'];
    $email          = $_POST['email'];

    $updateprofile = $user->updateProfile($user_id,trim($first_name),trim($middle_names),trim($last_name),$gender,trim($civil_status),trim($citizenship));
    // $data['msgadf'] =  $updateprofile == "true";
    if($updateprofile == "true" ){
      $account->updateUserAccount($account_id,$username,$password,$role,$email,$user_id);
      $data['msg'] = true;
    }else{
      $data['msg'] = 'false';
    }
    
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
    $data               = array();
    $prep_state         = $barangay_street->getBarangayStreet($barangay_street_id);
    while ($row = $prep_state->fetch(PDO::FETCH_ASSOC))
    {
      $data['barangay_id']        = $row['barangay_id'];
      $data['barangay_street']    = $row['street_name'];
      $data['barangay_street_id'] = $row['street_id'];
    }
    echo json_encode($data);

  }

  // Delete Selected Barangay Street
  if(isset($_POST['delete_barangay_street']))
  {
    $barangay_street_id = $_POST['barangay_street_id'];
    $data['msg']        = $barangay_street->deleteBarangayStreet($barangay_street_id);
    echo json_encode($data);
  }

  // Add New Barangay Street
  if(isset($_POST['save_barangay_street']))
  {
    $new_barangay_street    = $_POST['barangay_street']; 
    $new_barangay_id        = $_POST['barangay_id']; 
    $data['msg']            = $barangay_street->saveBarangayStreet($new_barangay_id,trim($new_barangay_street));
    echo json_encode($data);
  }

  // Update Selecte Barangay Street
  if(isset($_POST['update_barangay_street']))
  {
    $barangay_street_id     = $_POST['barangay_street_id'];
    $update_barangay_street = $_POST['barangay_street'];
    $barangay_id            = $_POST['barangay_id'];
    $data['msg']            = $barangay_street->updateBarangayStreet( $barangay_street_id,trim($update_barangay_street),$barangay_id);
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
    $data['msg']  = $barangay->saveBarangay(trim($new_barangay));
    echo json_encode($data);
  }

  // Edit Barangay
  if(isset($_POST['edit_barangay']))
  {
    $barangay_id  = $_POST['barangay_id']; // Use to get Specific barangay
    $data	        = array();
    $prep_state   = $barangay->getBarangay($barangay_id);
    while ($row = $prep_state->fetch(PDO::FETCH_ASSOC))
    {
      $data['barangay_id']    = $row['barangay_id'];
      $data['barangay_name']  = $row['barangay_name'];
    }
    echo json_encode($data);
  }

  // Update Barangay
  if(isset($_POST['update_barangay']))
  {
    $barangay_id    = $_POST['barangay_id'];
    $barangay_name  = $_POST['barangay_name'];
    $data['msg']    = $barangay->updateBarangay($barangay_id,trim($barangay_name));
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
    $position_id  = $_POST['edit_id']; // Use to get Specific position
    $data         = array();
    $prep_state = $position->getPosition($position_id);
    while ($row = $prep_state->fetch(PDO::FETCH_ASSOC))
    {
      $data['position_id']  = $row['position_id'];
      $data['position']     = $row['position'];
    }
    echo json_encode($data);
  }
  
  // Update Position
  if(isset($_POST['update_position']))
  {
    $position_id    = $_POST['position_id'];
    $position_name  = $_POST['position'];
    $data['msg']    = $position->updatePosition($position_id,trim($position_name));
    echo json_encode($data);
  }

  // Delete Selected Position
  if(isset($_POST['delete_position']))
  {
    $position_id = $_POST['delete_id'];
    $data['msg'] = $position->deletePosition($position_id);
    echo json_encode($data);
  }

  // Add New Resident
  if(isset($_POST['save_new_resident']))
  {
    $first_name         = $_POST['first_name'];
    $middle_name        = $_POST['middle_name'];
    $last_name	        = $_POST['last_name'];
    $extension	        = $_POST['extension'];
    $house_number       = $_POST['house_number'];
    $birthplace         = $_POST['birthplace'];
    $birthdate          = $_POST['birthdate'];
    $gender             = $_POST['gender'];
    $status             = $_POST['status'];
    $citizenship        = $_POST['citizenship'];
    $occupation         = $_POST['occupation'];
    $street_id          = $_POST['street'];
    $household_number   = $_POST['household_number'];
    $date_accomplished  = date("Y-m-d");
    $account_id         = $_SESSION['login_account_id'];
    $person_id	        = $person->savePerson(trim($first_name),trim($middle_name),trim($last_name),trim($extension),trim($house_number),trim($birthplace),trim($birthdate),trim($gender),trim($status),trim($citizenship),trim($occupation));
    
    if($person_id > 0){
      $household_id     = $household->saveHousehold($street_id,$house_number,$date_accomplished,$account_id);
      if($household_id > 0){
        $data['msg'] = $residence_household->saveResidenceHousehold($household_id,$person_id);
      }else{
        $data['msg'] = false;
      }
    }else{
      $data['msg'] = false;
    }
     
    echo json_encode($data);
  }


  // Session with person_id to fetch residence
  if(isset($_POST['set_session_person_id'])){ 
    $person_id              = $_POST['person_id'];
    $_SESSION['person_id']  = $person_id;
  }

  // Select household with this person_id
  if(isset($_POST['fetc_residence_household'])){ 
    $person_id              = $_POST['person_id'];
    $prep_state= $residence_household->fetchSelectedResidenceHousehold($person_id);
    while ($row = $prep_state->fetch(PDO::FETCH_ASSOC))
    {
      $data['last_name']          = $row['last_name'];
      $data['first_name']         = $row['first_name'];
      $data['middle_name']        = $row['middle_name'];
      $data['extension']          = $row['extension'];
      $data['house_number']       = $row['house_number'];
      $data['birthplace']         = $row['birthplace'];
      $data['birthdate']          = $row['birthdate'];
      $data['sex']                = $row['sex'];
      $data['civil_status']       = $row['civil_status'];
      $data['citizenship']        = $row['citizenship'];
      $data['occupation']         = $row['occupation'];
      $data['household_id']       = $row['household_id'];
      $data['street_id']          = $row['street_id'];
      $data['household_number']   = $row['household_number'];
      $data['date_accomplished']  = $row['date_accomplished'];
      $data['account_id']         = $row['account_id'];

    }
    echo json_encode($data);
  
  }


  if(isset($_POST['update_residence_household'])){
    
    $person_id          = $_POST['person_id'];
    $first_name         = $_POST['first_name'];
    $middle_name        = $_POST['middle_name'];
    $last_name	        = $_POST['last_name'];
    $extension	        = $_POST['extension'];
    $house_number       = $_POST['house_number'];
    $birthplace         = $_POST['birthplace'];
    $birthdate          = $_POST['birthdate'];
    $gender             = $_POST['gender'];
    $status             = $_POST['status'];
    $citizenship        = $_POST['citizenship'];
    $occupation         = $_POST['occupation'];
    $street_id          = $_POST['street'];
    $household_number   = $_POST['household_number'];
    $household_id       = $_POST['household_id'];
    

    $result = $person->updatePerson($person_id,trim($last_name),trim($first_name),trim($middle_name),trim($extension),trim($house_number),trim($birthplace),trim($birthdate),trim($gender),trim($status),trim($citizenship),trim($occupation));
    
    if($result){
      $data['msg']=$household->updateHousehold($household_id,$street_id,$household_number);
    }else{
      $data['msg'] = false;
    }

    echo json_encode($data);

  }


  // add new issue for barangay
  if(isset($_POST['add_new_issue'])){
    
    $complainant         = $_POST['complainant'];
    $complained_resident = $_POST['complained_resident'];
    $status              = $_POST['status'];
    $description	       = $_POST['description'];
    $oic                 = $_SESSION['login_account_id'];
    $filleddate          = date("Y-m-d");

    $data['msg'] = $barangay_issue->saveIssue(trim($complainant),trim($complained_resident),$oic,trim($description),trim($status),$filleddate);
    echo json_encode($data);

  }

  // get the selected barangay issue
  if(isset($_POST['set_issue_id'])){
    $_SESSION['issue_id'] = $_POST['issue_id'];
  }

  //fetch selected barangay issue 
  if(isset($_POST['fetch_selected_issue'])){
    
    $prep_state = $barangay_issue->fecthSelectedBararangayIssue($_SESSION['issue_id']);
    while ($row = $prep_state->fetch(PDO::FETCH_ASSOC))
    {
      $data['issue_id']             = $row['issue_id'];
      $data['complainant']          = $row['complainant'];
      $data['complained_resident']  = $row['complained_resident'];
      $data['status']               = $row['status'];
      $data['Description']          = $row['Description'];
    }
    echo json_encode($data);
  }
  
  // Update Selected Issue
  if(isset($_POST['update_issue']))
  {
    $issue_id            = $_SESSION['issue_id'];
    $complainant         = $_POST['complainant'];
    $complained_resident = $_POST['complained_resident'];
    $status              = $_POST['status'];
    $description	       = $_POST['description'];
    $data['msg']         = $barangay_issue->updateBarangayIssue($issue_id,$complainant,$complained_resident,$status,$description);
    echo json_encode($data);
  }

  // Delete selected barangay Issue
  if(isset($_POST['confirm_delete_barangay_issue']))
  {
    $issue_id         = $_POST['delete_barangay_issue_id'];
    $data['msg']      = $barangay_issue->deleteBarangayIssue($issue_id);
    echo json_encode($data);
  }

  // View the selected barangay Issue
  if(isset($_POST['view_selected_issue']))
  {
    $issue_id         = $_POST['issue_id'];
    $prep_state	      = $barangay_issue->viewSelectedBarangayIssue($issue_id);
    while ($row = $prep_state->fetch(PDO::FETCH_ASSOC))
    {
      $date_of_filling = new DateTime($row['date_of_filling']);
      $date_of_filling = $date_of_filling->format('F j, Y');

      $data['issue_id']             = $row['issue_id'];
      $data['complainant']          = $row['complainant'];
      $data['complained_resident']  = $row['complained_resident'];
      $data['status']               = $row['status'];
      $data['oic']                  = $row['oic'];
      $data['date_of_filling']      = $date_of_filling;
      $data['description']          = $row['description'];
    }
    echo json_encode($data);
  }
 
