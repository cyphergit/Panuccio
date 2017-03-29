<?php

class Customers {
    
    public $customerId;
    public $email;
    public $firstname;
    public $lastname;
    public $middlename;
    public $street;
    public $city;
    public $country;
    public $postal;
    public $telephone;
    public $mobile;
    public $subscription;
    
    public $conn;
    
    private function dbConn() {
        return $this->conn;
    }
    
    public function GetAllCustomers() {
        $query = "SELECT * FROM Customers";
        $result = mysqli_query($this->dbConn(), $query);
        
        return mysqli_fetch_row($result);
    }
    
    public function GetCustomerByEmail($email) {
        $query = "SELECT * FROM Customers WHERE Email='$email' LIMIT 1";
        $result = mysqli_query($this->dbConn(), $query);
        
        return mysqli_fetch_row($result);
    }
    
    public function NewCustomer($obj) {
        $query = "INSERT INTO Customers(CustomersID, Email, Firstname, Lastname, NewsletterSubscription) "
                . "VALUES('$obj->customerId','$obj->email', '$obj->firstname', '$obj->lastname', '$obj->subscription')";
        mysqli_query($this->conn, $query);
        
        if(mysqli_error($this->conn)) {            
            return "Error encountered.";
            
        } else {
            return "New customer record added";            
        }
    }
    
    public function HasRecord() {
        $query = "SELECT Email FROM Customers WHERE Email='$this->email' LIMIT 1";
        $result = mysqli_query($this->dbConn(), $query);
        
        $count = mysqli_num_rows($result);
        
        return ($count == 0) ? false : true;
    }
    
    public function IsSubscribed() {
        $query = "SELECT NewsletterSubscription FROM Customers WHERE Email='$this->email'";
        $result = mysqli_query($this->dbConn(), $query);        
        $row = mysqli_fetch_row($result);
        
        return $row[0];
    }
    
    public function UpdateCustomerSubscription($subscription) {        
        $query = "UPDATE Customers SET NewsletterSubscription = '$subscription' WHERE Email='$this->email'";
        mysqli_query($this->dbConn(), $query);
        
        return true;
    }
    
    
}