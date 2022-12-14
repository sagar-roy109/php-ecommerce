<?php

// DEFINE('HOST_NAME','localhost');
// DEFINE('USER','root');
// DEFINE('DB_NAME','php-ecom');
// DEFINE('PASSWORD','');


// $con = mysqli_connect(HOST_NAME,USER,PASSWORD,DB_NAME);

// if($con){
//   echo "Connection Successfull"
// }else


class Database{
  private $db_host = "localhost";
  private $db_user = "root";
  private $db_pass = "";
  private $db_name = "php_ecom";

  public $mysqli = "";
  private $result = array();
  private $conn = false;


  // DB Connection
  public function __construct(){
    if(!$this->conn){
      $this->conn = true;
      $this->mysqli = new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
      if($this->mysqli->connect_error){
        array_push($this->result, $this->mysqli->connect_error);
        return false;
      }
    }else{
      return true;
    }
  }


  // insert
  public function insert($table, $params =array()){
    if($this->tableCheck($table)){

      // escape data before insert 
      $escape_data = [];
      foreach ($params as $key => $value) {
        $escape_data[$key] = $this->mysqli->real_escape_string($value);
      }
      

      $table_columns = implode(',', array_keys($escape_data));
      $table_value = implode("','", $escape_data);

      $sql = "INSERT INTO $table ($table_columns) VALUES ('$table_value')";
      if($this->mysqli->query($sql)){
        array_push($this->result, "Insert successfull");
        return true;
      }else{
        array_push($this->result, $this->mysqli->error );
        return false;
      }
    }
  }


  // update
  public function update($table, $params =array(), $where = null){
    if($this->tableCheck($table)){

      $args = array();
      foreach ($params as $key => $value) {
        $args[]= "$key = '$value'";
      }
    
      $sql = " UPDATE $table SET " .implode(',', $args);

      if($where != null){
        $sql .= " WHERE $where";
      }
      

      if($this->mysqli->query($sql)){
        array_push($this->result, "Update successfull");
        return true;
      }else{
        array_push($this->result, $this->mysqli->error );
        return false;
      }
    }
  }


  // delete 

  public function delete($table, $where= null){
    if($this->tableCheck($table)){
      $sql = "DELETE FROM $table";
      if($where != null){
        $sql.= " WHERE $where";
      }
      if($this->mysqli->query($sql)){
        array_push($this->result, "Delete successfull");
        return true;
      }else{
        array_push($this->result, $this->mysqli->error );
        return false;
      }
    }else{
      return false;
    }
  }


  //select 

  public function sql($sql){
    $query = $this->mysqli->query($sql);

    if($query){
      $this->result = $query-> fetch_all(MYSQLI_ASSOC);
      return true;
    }else{
      array_push($this->result, $this->mysqli->error);
      return false;
    }
  }





  // get result

  public function getResult(){
    $val = $this->result;
    $this->result = array();
    return $val;
  }

  // check table

  private function tableCheck ($table){
    $sql = "SHOW TABLES FROM $this->db_name LIKE '$table'";
    $tableInDb =  $this->mysqli->query($sql);
    if($tableInDb){
      if($tableInDb->num_rows == 1){
        return true;
      }else{
        array_push($this->result, $table."does not exist");
        return false ;
      }
    }
  }


  // destruct or close connection 
  public function __destruct()
  {
    if($this->conn){
      if($this->mysqli->close()){
        $this->conn = false;
        return true;
      }
    }else{
      return false;
    }
  }

}