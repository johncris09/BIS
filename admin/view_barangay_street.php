
<?php

include_once '../classes/Database.php';
include_once '../classes/BarangayStreet.php';
include_once '../classes/initial.php';


$barangay_street = new BarangayStreet($db);
$prep_state = $barangay_street->AllBarangayStreet();
$numRows = $prep_state->rowCount();
$counter=1;


$list ='{
  "data": [
    ';
while ($row = $prep_state->fetch(PDO::FETCH_ASSOC))
{
  $list .='[
    '. $row["street_id"].',
    '. $counter.',
    "'. $row["barangay_name"].'",
    "'. $row["street_name"].'"
  ]';
  $numRows == $counter ? $list .='': $list .=',';
  
  $counter++;
}

$list .= '
  ]
}
';
echo $list;