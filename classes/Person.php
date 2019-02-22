<?php
  
  
  class Person
  {
    // table name definition and database connection
    private $conn;
    private $table_name = "person";
    
    // object properties
    
    public function __construct($db)
    {
      $this->conn = $db;
    }
    
    
    // Insert new Person
    public function savePerson($first_name,$middle_name,$last_name,$extension,$house_number,$birthplace,$birthdate,$gender,$civil_status,$citizenship,$occupation)
    {
      // insert query
      $sql = "
        INSERT INTO person
        (
          person_id, 
          last_name, 
          first_name, 
          middle_name, 
          extension, 
          house_number, 
          birthplace, 
          birthdate, 
          sex,
          civil_status, 
          citizenship, 
          occupation
        ) 
        VALUES 
        (
          NULL,
          :last_name,
          :first_name,
          :middle_name,
          :extension,
          :house_number,
          :birthplace,
          :birthdate,
          :sex,
          :civil_status,
          :citizenship,
          :occupation
        )
      ";
      
      $stmnt = $this->conn->prepare($sql);
      
      // prepared statement
      $stmnt->bindParam(':last_name', $last_name);
      $stmnt->bindParam(':first_name', $first_name);
      $stmnt->bindParam(':middle_name', $middle_name);
      $stmnt->bindParam(':extension', $extension);
      $stmnt->bindParam(':house_number', $house_number);
      $stmnt->bindParam(':birthplace', $birthplace);
      $stmnt->bindParam(':birthdate', $birthdate);
      $stmnt->bindParam(':sex', $gender);
      $stmnt->bindParam(':civil_status', $civil_status);
      $stmnt->bindParam(':citizenship', $citizenship);
      $stmnt->bindParam(':occupation', $occupation);
      
      if($stmnt->execute()){
        return  $this->conn->lastInsertId();
      }else{
        return $stmnt->errorInfo()[2];
        // return false;
      }
      
    }

    // Update Selected Person
    public function updatePerson($person_id,$last_name,$first_name,$middle_name,$extension,$house_number,$birthplace,$birthdate,$sex,$civil_status,$citizenship,$occupation){

      $sql = "
        UPDATE 
          person 
        SET 
          last_name	      = :last_name,
          first_name	    = :first_name,
          middle_name	    = :middle_name,
          extension       = :extension,
          house_number	  = :house_number,
          birthplace	    = :birthplace,
          birthdate	      = :birthdate,
          sex 	          = :sex,
          civil_status    = :civil_status,
          citizenship	    = :citizenship,
          occupation	    = :occupation 
        WHERE 
          person_id      = :person_id";

        $stmnt = $this->conn->prepare($sql);
      
        $stmnt->bindParam(':person_id',$person_id);
        $stmnt->bindParam(':last_name',$last_name);
        $stmnt->bindParam(':first_name',$first_name);
        $stmnt->bindParam(':middle_name',$middle_name);
        $stmnt->bindParam(':extension',$extension);
        $stmnt->bindParam(':house_number',$house_number);
        $stmnt->bindParam(':birthplace',$birthplace);
        $stmnt->bindParam(':birthdate',$birthdate);
        $stmnt->bindParam(':sex',$sex);
        $stmnt->bindParam(':civil_status',$civil_status);
        $stmnt->bindParam(':citizenship',$citizenship);
        $stmnt->bindParam(':occupation',$occupation);
        
  
        // execute the query
        if ($stmnt->execute()) {
          return true;
        } else {
          return $stmnt->errorInfo()[2];
          // return false;
        }
    }
    

    // Delete Selected Person
    public function deletePerson($person_id){
      $sql ="
        DELETE FROM person 
        WHERE person_id = :person_id
      ";

      $stmnt = $this->conn->prepare($sql);
      $stmnt->bindParam(':person_id',$person_id);
      // execute the query
      if ($stmnt->execute()) {
        return true;
      } else {
        return $stmnt->errorInfo()[2];
        // return false;
      }
      
    }

    
    
    // Fetch all Persons
    public function fetchAllPerson(){
      $sql = "
        SELECT *
        FROM " . $this->table_name;
      
      $stmnt = $this->conn->prepare($sql);
  
      $stmnt->execute();
  
      return $stmnt;
      $db_conn = NULL;
      
    }
  }

  

  
