<?php
  
  
class BarangayStreet
{
  // table name definition and database connection
  private $conn;
  private $table_name = "street";
  
  // object properties
  
  public function __construct($db)
  {
    $this->conn = $db;
  }
  
  
  // Select all Barangay
  public function AllBarangayStreet(){
    $query = "SELECT street.street_id, barangay.barangay_name, barangay.barangay_id,street.street_name 
              FROM street ,barangay 
              Where street.barangay_id = barangay.barangay_id";
  
    // $query = "Select * from " .$this->table_name;

    $stmnt = $this->conn->prepare($query);
    
    $stmnt->execute();


    return $stmnt;
    $conn= NULL;
    
  }

  // Add New Barangay Street
  public function saveBarangayStreet($barangay_id,$street_name){
    
    // insert query
    $sql = "INSERT INTO " . $this->table_name . " (street_name,barangay_id) VALUES (:street_name,:barangay_id)";
    
    $stmnt = $this->conn->prepare($sql);
    
    // prepared statement
    $stmnt->bindParam(':street_name', $street_name);
    $stmnt->bindParam(':barangay_id', $barangay_id);
    
    if($stmnt->execute()){
      return true;
    }else{
      return $stmnt->errorInfo()[2];
      // return false;
    }
  }

  // get Selected Barangay Street
  public function getBarangayStreet($street_id){
      $sql = "SELECT * FROM " . $this->table_name . " WHERE `street_id`= :street_id";

      $stmnt = $this->conn->prepare($sql);
      $stmnt->bindParam(':street_id', $street_id);
      $stmnt->execute();

      return $stmnt;
      $conn= NULL;
  
  }

  // Update Selected Barangay Street
  public function updateBarangayStreet($street_id,$street_name,$barangay_id)
  {
    $sql = "
      UPDATE " . $this->table_name . "
      SET  `street_name` = :street_name, `barangay_id`= :barangay_id
      WHERE `street_id`= :street_id";
      
    $stmnt = $this->conn->prepare($sql);
    $stmnt->bindParam(':street_id',$street_id);
    $stmnt->bindParam(':street_name',$street_name);
    $stmnt->bindParam(':barangay_id',$barangay_id);

    // execute the query
    if ($stmnt->execute()) {
      return true;
    } else {
      return $stmnt->errorInfo()[2];
      // return false;
    }
    
  }
  
  // Delete selected Barangay Street
  public function deleteBarangayStreet($street_id){
    $sql = "
      DELETE FROM " . $this->table_name . "
      WHERE street_id = :street_id";

    $stmnt = $this->conn->prepare($sql);
    $stmnt->bindParam(':street_id',$street_id);
    // execute the query
    if ($stmnt->execute()) {
      return true;
    } else {
      return $stmnt->errorInfo()[2];
      // return false;
    }
  }

  // Get the barangay Id in the street table
  public function getBarangayID($street_id){
    $sql = "SELECT * FROM " . $this->table_name . " WHERE `street_id`= :street_id";

    $stmnt = $this->conn->prepare($sql);
    $stmnt->bindParam(':street_id', $street_id);
    $stmnt->execute();

    return $stmnt;
    $conn= NULL;

  }


  // Get fieldnames for barangay street
  public function getBarangayStreetFieldName(){
    $sql = "SELECT
              barangay.barangay_name as Barangay,
              street.street_name as Street
            FROM
              barangay,
              street
            WHERE
              street.barangay_id = barangay.barangay_id";
              
    $stmnt = $this->conn->prepare($sql);
    $stmnt->execute();
    return $stmnt;
    $conn= NULL;
  }

  // Use to display the street name for specific staff/user
  public function fetchSpecificStreetName($user_id){
    $sql = "
      SELECT 
      street.street_id,street.street_name
      FROM 
        street, barangay,user
      WHERE
      user.barangay_id = barangay.barangay_id AND street.barangay_id= barangay.barangay_id AND user.user_id = :user_id";

    $stmnt = $this->conn->prepare($sql);
    $stmnt->bindParam(':user_id', $user_id);
    $stmnt->execute();

    return $stmnt;
    $conn= NULL;

  }
}

  

  
