<?php
  
  
  class User
  {
    // table name definition and database connection
    private $conn;
    private $table_name = "user";
    
    // object properties
    
    public function __construct($db)
    {
      $this->conn = $db;
    }
    
    
    // INsert User Information
    public function saveUser($last_name,$first_name,$middle_name,$gender,$civil_status,$citizenship,$barangay_id,$position_id)
    {
      // insert query
      $sql = "
        INSERT INTO user
        ( 
          user_id,
          last_name, 
          first_name, 
          middle_name, 
          gender, 
          civil_status,
          citizenship,
          barangay_id, 
          position_id
        )
        VALUES 
        (
          NULL, 
          :last_name,
          :first_name,
          :middle_name,
          :gender,
          :civil_status,
          :citizenship,
          :barangay_id,
          :position_id
        )
      ";
      
      $stmnt = $this->conn->prepare($sql);
      
      // prepared statement
      $stmnt->bindParam(':last_name', $last_name);
      $stmnt->bindParam(':first_name', $first_name);
      $stmnt->bindParam(':middle_name', $middle_name);
      $stmnt->bindParam(':gender', $gender);
      $stmnt->bindParam(':civil_status', $civil_status);
      $stmnt->bindParam(':citizenship', $citizenship);
      $stmnt->bindParam(':barangay_id', $barangay_id);
      $stmnt->bindParam(':position_id', $position_id);
      
      if($stmnt->execute()){
        return  $this->conn->lastInsertId();
      }else{
        return $stmnt->errorInfo()[2];
        // return false;
      }
      
    }

    public function updateUser($user_id,$first_name,$middle_names,$last_name,$gender,$civil_status,$citizenship,$barangay_list,$position_list)
    {

      $sql = " 
        UPDATE  ". $this->table_name ."
        SET
          last_name	    = :last_name,
          first_name	  = :first_name,
          middle_name	  = :middle_names,
          gender        = :gender,
          civil_status	= :civil_status,
          citizenship	  = :citizenship,
          barangay_id	  = :barangay_list,
          position_id	  = :position_list
        WHERE user_id   = :user_id";

      $stmnt = $this->conn->prepare($sql);
      
      $stmnt->bindParam(':user_id',$user_id);
      $stmnt->bindParam(':last_name',$last_name);
      $stmnt->bindParam(':first_name',$first_name);
      $stmnt->bindParam(':middle_names',$middle_names);
      $stmnt->bindParam(':gender',$gender);
      $stmnt->bindParam(':civil_status',$civil_status);
      $stmnt->bindParam(':citizenship',$citizenship);
      $stmnt->bindParam(':barangay_list',$barangay_list);
      $stmnt->bindParam(':position_list',$position_list);
      // return  $stmnt->execute() ;

      // execute the query
      if ($stmnt->execute()) {
        return true;
      } else {
        return $stmnt->errorInfo()[2];
        // return false;
      }
      
    }
    
    // Delete User
    public function deleteUser($user_id){
      $sql = "
        DELETE FROM " . $this->table_name . "
        WHERE user_id = :user_id";

      $stmnt = $this->conn->prepare($sql);
      $stmnt->bindParam(':user_id',$user_id);
      
      // execute the query
      if ($stmnt->execute()) {
        return true;
      } else {
        return $stmnt->errorInfo()[2];
        // return false;
      }
    }
    
    // Select all User
    public function getAllUser(){
      $sql = "
        SELECT *
        FROM " . $this->table_name;
      
      $stmnt = $this->conn->prepare($sql);
  
      $stmnt->execute();
  
      return $stmnt;
      $db_conn = NULL;
      
    }
  }

  

  
