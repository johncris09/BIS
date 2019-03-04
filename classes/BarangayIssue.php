<?php
  
  
  class BarangayIssue
  {
    // table name definition and database connection
    private $conn;
    private $table_name = "barangay_issue";
    
    // object properties
    
    public function __construct($db)
    {
      $this->conn = $db;
    }
    
    
    // Insert new Barangay Issue
    public function saveIssue($complainant,$complained_resident,$oic,$description,$status,$filleddate)
    {
      // insert query
      $sql = "
      INSERT INTO barangay_issue
        (
          complainant, 
          complained_resident,
          date_of_filling, 
          officer_in_charge, 
          status,
          Description
        ) 
        VALUES 
        (
          :complainant,
          :complained_resident,
          :filleddate,
          :oic,
          :status,
          :description
        )
      ";
      // return $sql;
      
      $stmnt = $this->conn->prepare($sql);
      
      // prepared statement
      $stmnt->bindParam(':complainant', $complainant);
      $stmnt->bindParam(':complained_resident', $complained_resident);
      $stmnt->bindParam(':filleddate', $filleddate);
      $stmnt->bindParam(':oic', $oic);
      $stmnt->bindParam(':status', $status);
      $stmnt->bindParam(':description', $description);
      
      if($stmnt->execute()){
        return  true;
      }else{
        return $stmnt->errorInfo()[2];
        // return false;
      }
      
    }


    // Update Selected Barangay Issue

    public function updateBarangayIssue($issue_id,$complainant,$complained_resident,$status,$description)
    {

      $sql = "
        UPDATE 
          barangay_issue 
        SET 
          complainant	        = :complainant,
          complained_resident	= :complained_resident,
          status	            = :status,
          Description         = :description 
        WHERE 
          issue_id            = :issue_id";

      
      $stmnt = $this->conn->prepare($sql);
      
      $stmnt->bindParam(':issue_id',$issue_id);
      $stmnt->bindParam(':complainant',$complainant);
      $stmnt->bindParam(':complained_resident',$complained_resident);
      $stmnt->bindParam(':status',$status);
      $stmnt->bindParam(':description',$description);
      return  $stmnt->execute() ;

      // execute the query
      if ($stmnt->execute()) {
        return true;
      } else {
        return $stmnt->errorInfo()[2];
        // return false;
      }
      
    }
    

    // // Delete Selecte Barangay Issue
    public function deleteBarangayIssue($issue_id){
      $sql = "
        DELETE FROM `barangay_issue` 
        WHERE issue_id = :issue_id";

      $stmnt = $this->conn->prepare($sql);
      $stmnt->bindParam(':issue_id',$issue_id);
      
      // execute the query
      if ($stmnt->execute()) {
        return true;
      } else {
        return $stmnt->errorInfo()[2];
        // return false;
      }
    }
    
    // Fetch all Issue with in the barangay
    public function fetchAllIssue($barangay_id){
      $sql = "
        SELECT 
          barangay_issue.issue_id,
          CONCAT(complainant.first_name,' ', complainant.middle_name,' ',complainant.last_name) as complainant,
          CONCAT(complained_resident.first_name,' ',complained_resident.middle_name,' ',complained_resident.last_name) as complained_resident,
          barangay_issue.date_of_filling,
          CONCAT(user.first_name,' ',user.middle_name,' ',user.last_name) as oic,
          barangay_issue.status,
          barangay_issue.description
        FROM
          barangay_issue
          INNER JOIN person as complainant on barangay_issue.complainant = complainant.person_id
          INNER JOIN person as complained_resident on barangay_issue.complained_resident = complained_resident.person_id
          INNER JOIN account on barangay_issue.officer_in_charge = account.account_id
          INNER JOIN user on user.user_id = account.user_id
          INNER JOIN barangay on user.barangay_id = barangay.barangay_id
          AND barangay.barangay_id = :barangay_id";
      
      $stmnt = $this->conn->prepare($sql);

      $stmnt->bindParam(':barangay_id', $barangay_id);
  
      $stmnt->execute();
  
      return $stmnt;
      $db_conn = NULL;
      
    }

    public function viewSelectedBarangayIssue($issue_id){
      $sql = "
        SELECT 
          barangay_issue.issue_id,
          CONCAT(complainant.first_name,' ', complainant.middle_name,' ',complainant.last_name) as complainant,
          CONCAT(complained_resident.first_name,' ',complained_resident.middle_name,' ',complained_resident.last_name) as complained_resident,
          barangay_issue.date_of_filling,
          CONCAT(user.first_name,' ',user.middle_name,' ',user.last_name) as oic,
          barangay_issue.status,
          barangay_issue.description
        FROM
          barangay_issue
          INNER JOIN person as complainant on barangay_issue.complainant = complainant.person_id
          INNER JOIN person as complained_resident on barangay_issue.complained_resident = complained_resident.person_id
          INNER JOIN account on barangay_issue.officer_in_charge = account.account_id
          INNER JOIN user on user.user_id = account.user_id
          INNER JOIN barangay on user.barangay_id = barangay.barangay_id
          AND barangay_issue.issue_id = :issue_id";
      
      $stmnt = $this->conn->prepare($sql);

      $stmnt->bindParam(':issue_id', $issue_id);
  
      $stmnt->execute();
  
      return $stmnt;
      $db_conn = NULL;
      
    }

    public function fecthSelectedBararangayIssue($issue_id){
      $sql = "
        SELECT * 
        FROM barangay_issue
        WHERE barangay_issue.issue_id = :issue_id";
      
      $stmnt = $this->conn->prepare($sql);

      $stmnt->bindParam(':issue_id', $issue_id);
  
      $stmnt->execute();
  
      return $stmnt;
      $db_conn = NULL;
      
    }

    // select those person who has an issue
    public function hasIssue($person_id){
      
      $sql ="
        SELECT *
        FROM barangay_issue 
        WHERE
          complainant = :person_id OR 
          complained_resident = :person_id
      ";

      $stmnt = $this->conn->prepare($sql);

      $stmnt->bindParam(':person_id', $person_id);
  
      $stmnt->execute();
  
      return $stmnt;
      $db_conn = NULL;

    }
  }

  

  
