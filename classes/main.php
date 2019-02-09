<?php
  
  // Include all database and object files
  include_once '../classes/Database.php';
  include_once  '../classes/Position.php';
  include_once  '../classes/Barangay.php';
  include_once  '../classes/BarangayStreet.php';
  include_once  '../classes/initial.php';
  
  
  
  $position = new Position($db);
  $barangay = new Barangay($db);
  $barangay_street = new BarangayStreet($db);
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
