
<?php
  
  include_once '../classes/Database.php';
  include_once '../classes/Barangay.php';
  include_once '../classes/initial.php';
  
  
  $barangay = new Barangay($db);
  $prep_state = $barangay->getAllBarangay();
  $numRows = $prep_state->rowCount();
  $counter=1;
  

  $list ='{
    "data": [
      ';
  while ($row = $prep_state->fetch(PDO::FETCH_ASSOC))
  {
    $list .='[
      "'. $row["barangay_id"].'",
      "'. $counter.'",
      "'. $row["barangay_name"].'"
    ]';
    $numRows == $counter ? $list .='': $list .=',';
    
    $counter++;
  }

  $list .= '
    ]
  }
  ';
  echo $list;
  
  
