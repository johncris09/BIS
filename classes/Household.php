<?php
  
  
  class Household
  {
    // table name definition and database connection
    private $conn;
    private $table_name = "household";
    
    // object properties
    
    public function __construct($db)
    {
      $this->conn = $db;
    }
    
    
    // Insert new Person
    public function saveHousehold($street_id,$household_number,$date_accomplished,$account_id)
    {
      // insert query
      $sql = "
        INSERT INTO household
        (
          household_id, 
          street_id, 
          household_number, 
          date_accomplished,
          account_id
        ) 
        VALUES 
        (
          NULL,
          :street_id,
          :household_number,
          :date_accomplished,
          :account_id
        )
      ";
      
      $stmnt = $this->conn->prepare($sql);
      
      // prepared statement
      $stmnt->bindParam(':street_id', $street_id);
      $stmnt->bindParam(':household_number', $household_number);
      $stmnt->bindParam(':date_accomplished', $date_accomplished);
      $stmnt->bindParam(':account_id', $account_id);
      
      if($stmnt->execute()){
        return  $this->conn->lastInsertId();
      }else{
        return $stmnt->errorInfo()[2];
        // return false;
      }
      
    }


    // Update Selected Household
    public function updateHousehold($household_id,$street_id,$household_number)
    {

      $sql = "
        UPDATE 
          household
        SET 
          street_id	        = :street_id,
          household_number	= :household_number
        WHERE
          household_id      = :household_id";

      
      $stmnt = $this->conn->prepare($sql);
      
      $stmnt->bindParam(':household_id',$household_id);
      $stmnt->bindParam(':street_id',$street_id);
      $stmnt->bindParam(':household_number',$household_number);
      return  $stmnt->execute() ;

      // execute the query
      if ($stmnt->execute()) {
        return true;
      } else {
        return $stmnt->errorInfo()[2];
        // return false;
      }
      
    }

    // Delete Selected  Household
    public function deleteHousehold($household_id){
      $sql = "
        DELETE FROM household 
        WHERE household_id = :household_id";

      $stmnt = $this->conn->prepare($sql);
      $stmnt->bindParam(':household_id',$household_id);
      
      // execute the query
      if ($stmnt->execute()) {
        return true;
      } else {
        return $stmnt->errorInfo()[2];
        // return false;
      }
    }
    
  }

  

  
