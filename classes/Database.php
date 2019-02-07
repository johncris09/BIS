<?php
  
  class Database
  {
    // use to connect to database
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "BIS";
    public $conn;
    
    // get the database connection
    public function getConnection()
    {
      $this->db_conn = null;
      try{
        $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
      }catch (PDOException $exception){
        "Database Connection Error: " . $exception->getMessage();
      }
      return $this->conn;
    }
    
  }
  