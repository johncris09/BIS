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
        residence_household,
        household,
        person,
        street,
        barangay,
        account,
        user
      WHERE
        household.household_id = residence_household.household_id AND
        person.person_id = residence_household.person_id AND
        street.street_id = household.street_id AND
        barangay.barangay_id = street.barangay_id AND
        account.account_id = household.account_id AND
        user.user_id = account.user_id AND
        user.barangay_id  = :barangay_id";

      
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
    
    // Gender of Residence household with in the barangay
    public function ResidenceHouseholdGender($barangay_id,$street_name){
      $sql = "
              
        Select DISTINCT
        (
          SELECT 
            Count(sex) as Male
          FROM 
            residence_household,
            household,
            person,
            street,
            barangay,
            account,
            user
          WHERE
            household.household_id = residence_household.household_id AND
            person.person_id = residence_household.person_id AND
            street.street_id = household.street_id AND
            barangay.barangay_id = street.barangay_id AND
            account.account_id = household.account_id AND
            user.user_id = account.user_id AND
            user.barangay_id  = :barangay_id  AND
            street.street_name = :street_name AND person.sex = 'Male') as Male,
        ( 
          SELECT 
            Count(sex) as Female
          FROM 
            residence_household,
            household,
            person,
            street,
            barangay,
            account,
            user
          WHERE
            household.household_id = residence_household.household_id AND
            person.person_id = residence_household.person_id AND
            street.street_id = household.street_id AND
            barangay.barangay_id = street.barangay_id AND
            account.account_id = household.account_id AND
            user.user_id = account.user_id AND
            user.barangay_id  = :barangay_id  AND
            street.street_name = :street_name AND person.sex = 'Female') as Female

        FROM 
          residence_household,
          household,
          person,
          street,
          barangay,
          account,
          user
        WHERE
          household.household_id = residence_household.household_id AND
          person.person_id = residence_household.person_id AND
          street.street_id = household.street_id AND
          barangay.barangay_id = street.barangay_id AND
          account.account_id = household.account_id AND
          user.user_id = account.user_id AND
          user.barangay_id  = :barangay_id
        ORDER BY street.street_name";


      $stmnt = $this->conn->prepare($sql);
      $stmnt->bindParam(':barangay_id',$barangay_id);
      $stmnt->bindParam(':street_name',$street_name);
      $stmnt->execute();
      return $stmnt;
      $db_conn = NULL;

      
    }

    public function showbarangayResidenceHousehold($barangay_id,$street_id){
      $sql = "
      SELECT 
        COUNT(residence_household.person_id) as population_number,
        street.street_name
      FROM 
        residence_household,
        household,
        barangay,
        street,
        person
      WHERE
        residence_household.household_id = household.household_id AND
        household.street_id = street.street_id AND
        street.barangay_id = barangay.barangay_id AND
        residence_household.person_id = person.person_id AND
        barangay.barangay_id = :barangay_id AND
        street.street_id = :street_id
      GROUP BY 
        street.street_name 
      ORDER BY 
        street.street_name
      ";

      $stmnt = $this->conn->prepare($sql);
      $stmnt->bindParam(':barangay_id',$barangay_id);
      $stmnt->bindParam(':street_id',$street_id);
      $stmnt->execute();
      return $stmnt;
      $db_conn = NULL;
    }


    public function fetchAllPopulation(){
      $sql = "
        SELECT 
          person.*, 
          street.street_name, 
          barangay.barangay_name,
          household.household_number,
          household.date_accomplished,
          CONCAT(user.first_name , ' ', user.middle_name,' ', user.last_name) as staff
        FROM 
          residence_household,
          household,
          person,
          street,
          barangay,
          account,
          user
        WHERE
          household.household_id = residence_household.household_id AND
          person.person_id = residence_household.person_id AND
          street.street_id = household.street_id AND
          barangay.barangay_id = street.barangay_id AND
          account.account_id = household.account_id AND
          user.user_id = account.user_id";

      $stmnt = $this->conn->prepare($sql);
      
      $stmnt->execute();
      return $stmnt;
      $db_conn = NULL;
      
    }
  }

  

  
