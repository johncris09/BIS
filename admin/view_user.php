
<?php

include_once '../classes/Database.php';
include_once '../classes/Account.php';
include_once '../classes/initial.php';

$account = new Account($db);
$prep_state = $account->getAllUser();
$numRows = $prep_state->rowCount();
$counter=1;


$list ='{
  "data": [
    ';
while ($row = $prep_state->fetch(PDO::FETCH_ASSOC))
{

  //Check the user if staff or admin
  $status = ($row['status'] == 1) ? "Staff": "Administration";

  // Convert date format 
  $date_registered = new DateTime($row['registered']);
  $date_registered = $date_registered->format('F j, Y');

  $list .='[
    '.  $row["account_id"].',
    '.  $counter.',
    "'. $row["Name"].'",
    "'. $row["username"].'",
    "'. $row["email"].'",
    "'. $date_registered.'",
    "'. $status .'",
    "'. $row["Name"].'",
    "'. $row["username"].'"
  ]';
  $numRows == $counter ? $list .='': $list .=',';
  
  $counter++;
}

$list .= '
  ]
}
';
echo $list;
