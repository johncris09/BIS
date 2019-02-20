<?php
  
  
  class Position
  {
    // table name definition and database connection
    private $conn;
    private $table_name = "position";
    
    // object properties
    
    public function __construct($db)
    {
      $this->conn = $db;
    }
    
    
    

    public function savePosition($position){
      
      // insert query
      $sql = "INSERT INTO " . $this->table_name . " (`position`) VALUES (:position)";
      
      $stmnt = $this->conn->prepare($sql);
      
      // prepared statement
      $stmnt->bindParam(':position', $position);
      
      if($stmnt->execute()){
        return true;
      }else{
        return $stmnt->errorInfo()[2];
        // return false;
      }
      
    }

    public function getPosition($position_id){
        $sql = "SELECT * FROM " . $this->table_name . " where position_id = :id";

        $stmnt = $this->conn->prepare($sql);
        $stmnt->bindParam(':id', $position_id);
        $stmnt->execute();

        return $stmnt;
        $conn= NULL;
        
    
    }

    public function updatePosition($position_id,$position_name){
      $sql = "
        UPDATE " . $this->table_name . "
        SET  `position` = :position
        WHERE `position_id` = :position_id";
        
      $stmnt = $this->conn->prepare($sql);
      
      $stmnt->bindParam(':position_id',$position_id);
      $stmnt->bindParam(':position',$position_name);
      // return  $stmnt->execute() ;

      // execute the query
      if ($stmnt->execute()) {
        return true;
      } else {
        return $stmnt->errorInfo()[2];
        // return false;
      }
      
    }
    
    // Delete selected Position
    public function deletePosition($position_id){
      $sql = "
        DELETE FROM " . $this->table_name . "
        WHERE position_id = :position_id";

      $stmnt = $this->conn->prepare($sql);
      $stmnt->bindParam(':position_id',$position_id);
      // execute the query
      if ($stmnt->execute()) {
        return true;
      } else {
        return $stmnt->errorInfo()[2];
        // return false;
      }
    }
    
    // Select all Positon
    public function getAllPosition(){
      $sql = "SELECT *
              FROM " . $this->table_name;
      
      $stmnt = $this->conn->prepare($sql);

      $stmnt->execute();

      return $stmnt;
      $db_conn = NULL;
      
    }

    public function getPositionFieldName(){
      $sql = "SELECT position as Position
              FROM " . $this->table_name;
                
      $stmnt = $this->conn->prepare($sql);
      $stmnt->execute();
      return $stmnt;
      $conn= NULL;
    }
  }

  

  
