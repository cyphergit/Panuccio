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
    
    //For database connection
    public $conn;

    public function GetAllCustomers() {
        $query = "SELECT * FROM Customers";
        $result = mysqli_query($this->conn, $query);
        
        if(mysqli_error($this->conn)) {            
            return "Error encountered.";
            
        } else {
            return mysqli_fetch_row($result);
        }
    }
    
    public function GetCustomerByEmail($email) {
        $query = "SELECT * FROM Customers WHERE Email='$email' LIMIT 1";
        $result = mysqli_query($this->conn, $query);
        
        if(mysqli_error($this->conn)) {            
            return "Error encountered.";
            
        } else {
            return mysqli_fetch_row($result);
        }
    }
    
    public function NewCustomer($obj) {
        $query = "INSERT INTO Customers(CustomersID, Email, Firstname, Lastname, NewsletterSubscription) "
                . "VALUES('$obj->customerId','$obj->email', '$obj->firstname', '$obj->lastname', '$obj->subscription')";
        mysqli_query($this->conn, $query);
        
        if(mysqli_error($this->conn)) {            
            return false;
            
        } else {
            return true;
        }
    }
    
    public function UpdateCustomer($id, $obj) {
        $query = "UPDATE Customers "
                . "SET Email = '$obj->email', Firstname = '$obj->firstname',"
                . "Lastname = '$obj->lastname', Middlename = '$obj->middlename',"
                . "AddressStreet = '$obj->street', AddressCity = '$obj->city',"
                . "AddressCountry = '$obj->country, LandlineNum = '$obj->telephone',"
                . "MobileNum = '$obj->mobile', NewsletterSubscription = '$obj->subscription'"
                . "WHERE CustomersID = '$id'";
        
        mysqli_query($this->conn, $query);
        
        if(mysqli_error($this->conn)) {            
            return false;
            
        } else {
            return true;
        }        
    }
    
    public function UpdateCustomerSubscription($subscription) {        
        $query = "UPDATE Customers SET NewsletterSubscription = '$subscription' WHERE Email='$this->email'";
        mysqli_query($this->conn, $query);
        
        if(mysqli_error($this->conn)) {            
            return false;
            
        } else {
            return true;
        } 
    }    
    
    public function DeleteCustomer($id) {
        $query = "DELETE FROM Customers WHERE CustomersID = '$id'";
        mysqli_query($this->conn, $query);
        
        if(mysqli_error($this->conn)) {            
            return false;
            
        } else {
            return true;
        }          
    }
    
    public function HasRecord() {
        $query = "SELECT Email FROM Customers WHERE Email='$this->email' LIMIT 1";
        $result = mysqli_query($this->conn, $query);
        
        $count = mysqli_num_rows($result);
        
        if(mysqli_error($this->conn)) {            
            return "Error encountered.";
            
        } else {
            return ($count == 0) ? false : true;
        }
    }
    
    public function IsSubscribed() {
        $query = "SELECT NewsletterSubscription FROM Customers WHERE Email='$this->email'";
        $result = mysqli_query($this->conn, $query);        
        $row = mysqli_fetch_row($result);
        
        if(mysqli_error($this->conn)) {            
            return "Error encountered.";
            
        } else {
            return $row[0];
        }
    }    
}