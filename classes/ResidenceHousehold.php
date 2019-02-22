<?php
  
  
  class ResidenceHousehold
  {
    // table name definition and database connection
    private $conn;
    private $table_name = "residence_household";
    
    // object properties
    
    public function __construct($db)
    {
      $this->conn = $db;
    }
    
    
    // Insert new Person
    public function saveResidenceHousehold($household_id,$person_id)
    {
      // insert query
      $sql = "
        INSERT INTO residence_household 
        (
          household_id, 
          person_id
        ) 
        VALUES 
        (
          :household_id,
          :person_id
        )
      ";
      
      $stmnt = $this->conn->prepare($sql);
      
      // prepared statement
      $stmnt->bindParam(':household_id', $household_id);
      $stmnt->bindParam(':person_id', $person_id);
      if($stmnt->execute()){
        return  true;
      }else{
        return $stmnt->errorInfo()[2];
        // return false;
      }
      
    }
    
    // Delete Selected Residence Household
    public function deleteResidennceHousehold($household_id,$person_id){
      $sql = "
        DELETE FROM residence_household 
        WHERE 
          household_id = :household_id AND 
          person_id = :person_id";

      $stmnt = $this->conn->prepare($sql);
      $stmnt->bindParam(':household_id',$household_id);
      $stmnt->bindParam(':person_id',$person_id);
      
      // execute the query
      if ($stmnt->execute()) {
        return true;
      } else {
        return $stmnt->errorInfo()[2];
        // return false;
      }
    }
    
    // Select all Residence Household
    public function fetchResidenceHousehold($user_id,$person_id,$household_id){
      $sql = "
        SELECT 
          household.*, person.* 
        FROM 
          residence_household, household, person 
        WHERE 
          person.person_id = residence_household.person_id AND 
          household.household_id = residence_household.household_id AND 
          household.user_id = :user_id AND
          person.person_id = :person_id AND
          household.household_id = :household_id";
      
      $stmnt = $this->conn->prepare($sql);
      $stmnt->bindParam(':user_id',$user_id);
      $stmnt->bindParam(':person_id',$person_id);
      $stmnt->bindParam(':household_id',$household_id);
  
      $stmnt->execute();
  
      return $stmnt;
      $db_conn = NULL;
      
    }

    // This function will fetch the selected Residence Household in order to edit and update
    public function fetchSelectedResidenceHousehold($person_id){
      $sql = "
        SELECT 
          person.*, household.*
        FROM 
          residence_household, household, person 
        WHERE
          residence_household.household_id = household.household_id AND
          residence_household.person_id = person.person_id AND
          person.person_id = :person_id";
      
      $stmnt = $this->conn->prepare($sql);
      $stmnt->bindParam(':person_id',$person_id);

      $stmnt->execute();

      return $stmnt;
      $db_conn = NULL;
    }

    //Select all Residence household within their barangay
    public function fetchResidenceHouseholdWithinTheBarangay($barangay_id){
      $sql = "
      SELECT 
        person.*, 
        street.street_name, 
        household.household_number,
        household.date_accomplished,
        CONCAT(user.first_name , ' ', user.middle_name,' ', user.last_name) as staff
        
      FROM 
        residence_household 
        inner join person on residence_household.person_id = person.person_id 
        inner join household on residence_household.household_id = household.household_id 
        inner join street on household.street_id = street.street_id 
        INNER join account on household.account_id = account.account_id 
        inner join user on account.user_id = user.user_id
      WHERE
        street.barangay_id = :barangay_id";

      
      $stmnt = $this->conn->prepare($sql);
      $stmnt->bindParam(':barangay_id',$barangay_id);
      $stmnt->execute();
      return $stmnt;
      $db_conn = NULL;
    }

    public function getHouseholdID($person_id)
    {
      $sql = "
      SELECT * 
      FROM residence_household
      WHERE person_id =  :person_id
      ";

      
      $stmnt = $this->conn->prepare($sql);
      $stmnt->bindParam(':person_id',$person_id);
      $stmnt->execute();
      return $stmnt;
      $db_conn = NULL;
    }
    
  }

  

  
