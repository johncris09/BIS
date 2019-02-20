<?php
  
  
  class Barangay
  {
    
    // table name definition and database connection
    private $conn;
    private $table_name = "barangay";
    
    // object properties
    
    public function __construct($db)
    {
      $this->conn = $db;
    }
    
    
    // Select all Barangay
    public function AllBarangay(){
      $query = "Select position from " . $this->table_name;;
      $stmnt = $this->conn->prepare($query);
  
      $stmnt->execute();
  
      return $stmnt;
      $conn= NULL;
      
    }

    // Add New Barangay
    public function saveBarangay($barangay_name){
      
      // insert query
      $sql = "INSERT INTO " . $this->table_name . " (`barangay_name`) VALUES (:barangay_name)";
      
      $stmnt = $this->conn->prepare($sql);
      
      // prepared statement
      $stmnt->bindParam(':barangay_name', $barangay_name);
      
      if($stmnt->execute()){
        return true;
      }else{
        return $stmnt->errorInfo()[2];
        // return false;
      }
      
    }

    // get Selected Barangay
    public function getBarangay($barangay_id){
        $sql = "SELECT * FROM " . $this->table_name . " WHERE `barangay_id`= :barangay_id";

        $stmnt = $this->conn->prepare($sql);
        $stmnt->bindParam(':barangay_id', $barangay_id);
        $stmnt->execute();
  
        return $stmnt;
        $conn= NULL;
    
    }

    // Update Selected Barangay
    public function updateBarangay($barangay_id,$barangay_name)
    {
      $sql = "
        UPDATE " . $this->table_name . "
        SET  `barangay_name` = :barangay_name
        WHERE `barangay_id` = :barangay_id";
        
      $stmnt = $this->conn->prepare($sql);
      
      $stmnt->bindParam(':barangay_id',$barangay_id);
      $stmnt->bindParam(':barangay_name',$barangay_name);

      // execute the query
      if ($stmnt->execute()) {
        return true;
      } else {
        return $stmnt->errorInfo()[2];
        // return false;
      }
      
    }
    
    // Delete selected Barangay
    public function deleteBarangay($barangay_id){
      $sql = "
        DELETE FROM " . $this->table_name . "
        WHERE barangay_id = :barangay_id";

      $stmnt = $this->conn->prepare($sql);
      $stmnt->bindParam(':barangay_id',$barangay_id);
      // execute the query
      if ($stmnt->execute()) {
        return true;
      } else {
        return $stmnt->errorInfo()[2];
        // return false;
      }
    }
    
    // Select all Barangay
    public function getAllBarangay(){
      $sql = "
        SELECT *
        FROM " . $this->table_name;
      
      $stmnt = $this->conn->prepare($sql);
  
      $stmnt->execute();
  
      return $stmnt;
      $db_conn = NULL;
      
    }

    // Get the important fieldname 
    public function getBarangayFieldName(){
      $sql = "SELECT barangay_name as Barangay
              FROM " . $this->table_name;

      $stmnt = $this->conn->prepare($sql);
      $stmnt->execute();
      return $stmnt;
      $conn= NULL;
    }
  }

  

  
