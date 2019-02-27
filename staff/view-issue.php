
<?php

session_start();
include_once '../classes/Database.php';
include_once '../classes/BarangayIssue.php';
include_once '../classes/initial.php';

$barangay_issue = new BarangayIssue($db);
$prep_state = $barangay_issue->fetchAllIssue($_SESSION['barangay_id']);
$numRows = $prep_state->rowCount();
$counter=1;


$list ='{
  "data": [
    ';
while ($row = $prep_state->fetch(PDO::FETCH_ASSOC))
{
  // Convert date format 
  $date_of_filling = new DateTime($row['date_of_filling']);
  $date_of_filling = $date_of_filling->format('F j, Y');

  $list .='[
    '.  $row["issue_id"].',
    '.  $counter.',
    "'. $row["complainant"].'",
    "'. $row["complained_resident"].'",
    "'. $date_of_filling.'",
    "'. $row["status"].'",
    "'. $row["oic"].'"
  ]';
  $numRows == $counter ? $list .='': $list .=',';
  
  $counter++;
}

$list .= '
  ]
}
';
echo $list;

