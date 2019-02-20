<?php 

class BackUp {
  private $conn;
  public $suffix;
  public $dirs;

  public function __construct($db)
    {
      $this->conn = $db;
      $this->suffix = date('Ymd_His');
      $this->dirs = '../admin/back-up/';

    }
    
 
  public function backup($tables = '*'){
    $output = "-- database backup - ".date('Y-m-d H:i:s').PHP_EOL;
    $output .= "SET NAMES utf8;".PHP_EOL;
    $output .= "SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';".PHP_EOL;
    $output .= "SET foreign_key_checks = 0;".PHP_EOL;
    $output .= "SET AUTOCOMMIT = 0;".PHP_EOL;
    $output .= "START TRANSACTION;".PHP_EOL;
    //get all table names
    if($tables == '*') {
      $tables = [];
      $query = $this->conn->prepare('SHOW TABLES');
      $query->execute();
      while($row = $query->fetch(PDO::FETCH_NUM)) {
        $tables[] = $row[0];
      }
      $query->closeCursor();
    }
    else {
      $tables = is_array($tables) ? $tables : explode(',',$tables);
    }
 
    foreach($tables as $table) {
 
      $query = $this->conn->prepare("SELECT * FROM `$table`");
      $query->execute();
      $output .= "DROP TABLE IF EXISTS `$table`;".PHP_EOL;
 
      $query2 = $this->conn->prepare("SHOW CREATE TABLE `$table`");
      $query2->execute();
      $row2 = $query2->fetch(PDO::FETCH_NUM);
      $query2->closeCursor();
      $output .= PHP_EOL.$row2[1].";".PHP_EOL;
 
        while($row = $query->fetch(PDO::FETCH_NUM)) {
          $output .= "INSERT INTO `$table` VALUES(";
          for($j=0; $j<count($row); $j++) {
            $row[$j] = addslashes($row[$j]);
            $row[$j] = str_replace("\n","\\n",$row[$j]);
            if (isset($row[$j]))
              $output .= "'".$row[$j]."'";
            else $output .= "''";
            if ($j<(count($row)-1))
             $output .= ',';
          }
          $output .= ");".PHP_EOL;
        }
      }
      $output .= PHP_EOL.PHP_EOL;
 
    $output .= "COMMIT;";
    //save filename
 
    $filename = 'db_backup_'.$this->suffix.'.sql';
    $this->writeUTF8filename($filename,$output);
  }
 
 
  private function writeUTF8filename($fn,$c){  /* save as utf8 encoding */
    $f=fopen($this->dirs.$fn,"w+");
    # Now UTF-8 - Add byte order mark
    fwrite($f, pack("CCC",0xef,0xbb,0xbf));
    fwrite($f,$c);
    fclose($f);
  }

}
?>