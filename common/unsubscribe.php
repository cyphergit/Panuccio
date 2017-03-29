<?php

include '../config/conf.inc.php';
include '../includes/functions.php';
include '../classes/SystemCounter.php';
include '../classes/Customers.php';

$form           =   "enquiry";
$email          =   "test@email.com";
$fname          =   "JC";
$lname          =   "Santos";
$subject        =   $_POST['subject'];
$message        =   $_POST['message'];
$contact        =   $_POST['contact'];
$address        =   $_POST['address'];
$carModel       =   $_POST['carModel'];
$transmission   =   $_POST['transmission'];
$fuelType       =   $_POST['fuelType'];
$serviceRequest =   $_POST['serviceRequest'];
$preferredDate  =   $_POST['preferredDate'];
$subscription   =   "1";

//$form           =   $_POST['form'];
//$email          =   $_POST['email'];
//$fname          =   $_POST['fname'];
//$lname          =   $_POST['lname'];
//$subject        =   $_POST['subject'];
//$message        =   $_POST['message'];
//$contact        =   $_POST['contact'];
//$address        =   $_POST['address'];
//$carModel       =   $_POST['carModel'];
//$transmission   =   $_POST['transmission'];
//$fuelType       =   $_POST['fuelType'];
//$serviceRequest =   $_POST['serviceRequest'];
//$preferredDate  =   $_POST['preferredDate'];
//$subscription   =   $_POST['subscribe'];

$customers = new Customers();
$customers->conn = $connect;
$customers->email = $email;

if (IsInjected($email) && IsInjected($subject)) {
    echo "There is an error in your registration. Please try again!";
    exit();
}

if ($subscription == "" || $subscription == null) {
    $customer_subscription = "0";
} else {
    $customer_subscription = $subscription;
}

switch($form) {
    case "unsubscribe":        
        if ($customers->HasRecord()) {
            if($customers->UpdateCustomerSubscription($customer_subscription)) {
                echo "send notif!";
            }
        } else {
            echo "no record!";
        }
        break;
 
    case "enquiry":
        $counter = new SystemCounters();
        $counter->conn = $connect;
        $counter->counterField = "UserCustomerID";
        
        if (!$customers->HasRecord()) {
            $new_customer = new Customers();
            $new_customer->customerId = $counter->IDCount();
            $new_customer->email = $email;
            $new_customer->firstname = $fname;
            $new_customer->lastname = $lname;
            $new_customer->subscription = $customer_subscription;
            
            $counter->UpdateIDCount($counter->IDCount());
            
            echo $customers->NewCustomer($new_customer);   
            
        } else {
            echo "record existing!";
        }
        break;        
        
    case "booking":        
        break;    
}
?>