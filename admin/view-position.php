
<?php
  
  include_once '../classes/Database.php';
  include_once '../classes/Position.php';
  include_once '../classes/initial.php';
  
  $position = new Position($db);
  $prep_state = $position->getAllPosition();
  $numRows = $prep_state->rowCount();
  $counter=1;
  $list ='{
    "data": [
      ';
  while ($row = $prep_state->fetch(PDO::FETCH_ASSOC))
  {
    $list .='[
      "'. $row["position_id"].'",
      "'. $counter.'",
      "'. $row["position"].'"
    ]';
    $numRows == $counter ? $list .='': $list .=',';
    
    $counter++;
  }

  $list .= '
    ]
  }
  ';
  echo $list;
  
  
