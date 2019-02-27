
<?php

session_start();
include_once '../classes/Database.php';
include_once '../classes/ResidenceHousehold.php';
include_once '../classes/initial.php';

$residence_household = new ResidenceHousehold($db);
$prep_state = $residence_household->fetchResidenceHouseholdWithinTheBarangay($_SESSION['barangay_id']);
$numRows = $prep_state->rowCount();
$counter=1;


$list ='{
  "data": [
    ';
while ($row = $prep_state->fetch(PDO::FETCH_ASSOC))
{
  // Convert date format 
  $birthdate = new DateTime($row['birthdate']);
  $getAge = $birthdate->format('Y');
  $birthdate = $birthdate->format('F j, Y');

  $list .='[
    '.  $row["person_id"].',
    '.  $counter.',
    "'. $row["last_name"].'",
    "'. $row["first_name"].'",
    "'. $row["middle_name"].'",
    "'. $row["extension"].'",
    "'. (date('Y')- $getAge).'",
    "'. $row["house_number"].'",
    "'. $row["birthplace"].'",
    "'. $birthdate.'",
    "'. $row["sex"].'",
    "'. $row["civil_status"].'",
    "'. $row["citizenship"].'",
    "'. $row["occupation"].'",
    "'. $row["household_number"].'",
    "'. $row["street_name"].'",
    "'. $row["date_accomplished"].'",
    "'. $row["staff"].'"
  ]';
  $numRows == $counter ? $list .='': $list .=',';
  
  $counter++;
}

$list .= '
  ]
}
';
echo $list;