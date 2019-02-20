<?php
  
  
  class Account
  {
    // table name definition and database connection
    private $conn;
    private $table_name = "account";
    
    // object properties
    
    public function __construct($db)
    {
      $this->conn = $db;
    }
    
    
    

    public function saveUserAccount($username,$password,$email,$date_registered,$role,$user_id){
      
      // insert query
      $sql = "
        INSERT INTO `account` 
        (
          `account_id`, 
          `username`, 
          `password`,
          `email`, 
          `registered`, 
          `status`, 
          `user_id`
        ) 
        VALUES
        (
          NULL, 
          :username, 
          PASSWORD(:password), 
          :email, 
          :date_registered, 
          :role, 
          :user_id
        )
      ";
      
      $stmnt = $this->conn->prepare($sql);
      
      // prepared statement
      $stmnt->bindParam(':username', $username);
      $stmnt->bindParam(':password', $password);
      $stmnt->bindParam(':email', $email);
      $stmnt->bindParam(':date_registered', $date_registered);
      $stmnt->bindParam(':role', $role);
      $stmnt->bindParam(':user_id', $user_id);
      
      if($stmnt->execute()){
        return true;
      }else{
        return $stmnt->errorInfo()[2];
        // return false;
      }
      
    }

    // get Specific User account
    public function getAccount($account_id){
        $sql = "SELECT * FROM " . $this->table_name . " where `account_id` = :id";

        $stmnt = $this->conn->prepare($sql);
        $stmnt->bindParam(':id', $account_id);
        $stmnt->execute();
  
        return $stmnt;
        $conn= NULL;
    }

    // get the user and account information to edit  or update
    public function getUserAccount($user_id, $account_id){
      $sql = "
      SELECT 
        user.user_id, 
        user.last_name, 
        user.first_name, 
        user.middle_name, 
        user.gender, 
        user.civil_status, 
        user.citizenship, 
        user.barangay_id, 
        user.position_id, 
        account.account_id, 
        account.username, 
        account.password, 
        account.status,
        account.email
      FROM 
        account, user  
      WHERE 
        account.user_id = user.user_id AND (user.user_id = :user_id AND  account.account_id= :account_id)";
      
      $stmnt = $this->conn->prepare($sql);
      $stmnt->bindParam(':user_id', $user_id);
      $stmnt->bindParam(':account_id', $account_id);
      $stmnt->execute();

      return $stmnt;
      $conn= NULL;
    }



    // Update User Account
    public function updateUserAccount($account_id,$username,$password,$role,$email,$user_id)
    {
      $sql = "
      UPDATE account
      SET
        username=:username,";
      if(!(strlen($password) < 1 )){
        $sql .= "password=PASSWORD(:password),";
      }
      $sql .="
        email=:email,
        status=:role,
        user_id=:user_id
      WHERE account_id  = :account_id";

      $stmnt = $this->conn->prepare($sql);

      $stmnt->bindParam(':account_id',$account_id);
      $stmnt->bindParam(':username',$username);
      if(!(strlen($password) < 1 )){
        $stmnt->bindParam(':password',$password);
      }
      $stmnt->bindParam(':email',$email);
      $stmnt->bindParam(':role',$role);
      $stmnt->bindParam(':user_id',$user_id);
      
      
      // execute the query
      if ($stmnt->execute()) {
        return true;
      } else {
        return $stmnt->errorInfo()[2];
        // return false;
      }
      
    }
    
    // Delete Select User Account
    public function deleteUserAccount($account_id){
      $sql = "
        DELETE FROM " . $this->table_name . "
        WHERE account_id = :account_id";

      $stmnt = $this->conn->prepare($sql);
      $stmnt->bindParam(':account_id',$account_id);

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
        SELECT  
          account.account_id,
          CONCAT(user.first_name,' ',user.middle_name,' ', user.last_name) as Name,
          account.username,
          account.email,
          account.registered,
          account.status 
        FROM 
          ".$this->table_name.", user 
        WHERE
          account.user_id = user.user_id";
      
      $stmnt = $this->conn->prepare($sql);
  
      $stmnt->execute();
  
      return $stmnt;
      $db_conn = NULL;
      
    }


    // Login User
    public function  loginUser($username,$password)
    {
      $sql = "
        SELECT 
          user.user_id, 
          user.last_name, 
          user.first_name, 
          user.middle_name, 
          user.gender, 
          user.civil_status, 
          user.citizenship, 
          user.barangay_id, 
          user.position_id, 
          account.account_id, 
          account.username, 
          account.password, 
          account.status,
          account.email
        FROM 
          account, user  
        WHERE 
          account.user_id = user.user_id AND 
          (account.username = :username AND  account.password= PASSWORD(:password))";
      

      $stmnt = $this->conn->prepare($sql);
      
      $stmnt->bindParam(':username',$username);
      $stmnt->bindParam(':password',$password);

      $stmnt->execute();
  
      return $stmnt;
      $conn= NULL;

    
    }


    // Get important fieldname
    public function getUserAccountFieldName(){
      $sql = "
      SELECT  
        CONCAT(user.first_name,' ',user.middle_name,' ', user.last_name) as Name,
        account.username as Username,
        account.email as Email, 
        account.registered as 'Date Registered',
        account.status as Status 
      FROM account, user
      where account.user_id = user.user_id";
                
      $stmnt = $this->conn->prepare($sql);
      $stmnt->execute();
      return $stmnt;
      $conn= NULL;
    }

    // Use to check Password
    public function checkPassword($account_id,$user_id,$old_password){
      $sql = "
      SELECT 
        password
      FROM 
        account 
      WHERE 
        account_id = :account_id AND user_id = :user_id AND password = PASSWORD(:old_password)";
                
      $stmnt = $this->conn->prepare($sql);
      $stmnt->bindParam(':account_id',$account_id);
      $stmnt->bindParam(':user_id',$user_id);
      $stmnt->bindParam(':old_password',$old_password);
      
      $stmnt->execute();
      return $stmnt;
      $conn= NULL;
    }
  }

  

  
