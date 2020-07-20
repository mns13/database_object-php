<?php

class Database {
    protected $connection;

    public function __construct()
    {
      $this->open_db_connection();
    }
    
    protected function open_db_connection()
    {
      $this->connection = new mysqli(host, user, password, db_name); // paste your data
      if (!$this->connection) die('database connection failed: ' . mysqli_connect_error());
    }

    public function query($sql)
    {
      $result = mysqli_query($this->connection, $sql);
      return $result;
    }

}

?>