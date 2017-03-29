<?php

class SystemCounters {
    
    public $conn;
    public $counterField;
    
    private function dbConn() {
        return $this->conn;
    }
    
    public function IDCount() {
        $query = "SELECT $this->counterField FROM IDCounters";
        $result = mysqli_query($this->dbConn(), $query);
        $row = mysqli_fetch_row($result);
        
        return $row[0] + 1;
    }
    
    public function UpdateIDCount($count) {
        $query = "UPDATE IDCounters SET $this->counterField = '$count'";
        mysqli_query($this->dbConn(), $query);
    }
}
