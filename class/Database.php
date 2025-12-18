<?php
class Database {
  protected $conn;

  public function __construct() {
    include("config.php");
    $this->conn = new mysqli($config['host'], $config['username'], $config['password'], $config['db_name']);
    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }
  }

  public function query($sql) {
    return $this->conn->query($sql);
  }

  public function get($table, $where = null) {
    $sql = "SELECT * FROM $table";
    if ($where) $sql .= " WHERE $where";
    return $this->conn->query($sql)->fetch_assoc();
  }

  public function insert($table, $data) {
    $columns = implode(",", array_keys($data));
    $values  = implode("','", array_values($data));
    $sql = "INSERT INTO $table ($columns) VALUES ('$values')";
    return $this->conn->query($sql);
  }

  public function update($table, $data, $where) {
    $set = [];
    foreach ($data as $key => $val) {
      $set[] = "$key='$val'";
    }
    $sql = "UPDATE $table SET " . implode(",", $set) . " WHERE $where";
    return $this->conn->query($sql);
  }
}
?>