<?php

include '../config/conf.inc.php';
include '../includes/functions.php';
include '../classes/system_counter.php';
include '../classes/customers.php';

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

$customer = new Customers();
$customer->conn = $connect;
$customer->email = $email;

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
        if ($customer->HasRecord()) {
            if($customer->UpdateCustomerSubscription($customer_subscription)) {
                echo "send notif!";
            }
        } else {
            echo "no record!";
        }
        break;
 
    case "enquiry":        
        if (!$customer->HasRecord()) {
            if ($customer_subscription != 0) {
                $counter = new SystemCounters();
                $counter->conn = $connect;
                $counter->counterField = "UserCustomerID";
                
                $new_customer = new Customers();
                $new_customer->customerId = $counter->IDCount();
                $new_customer->email = $email;
                $new_customer->firstname = $fname;
                $new_customer->lastname = $lname;
                $new_customer->subscription = $customer_subscription;

                $counter->UpdateIDCount($counter->IDCount());

                echo $customer->NewCustomer($new_customer);
                // send notification to customer
            } else {
                // send notification to customer
            }           
        } else {
            echo "record existing!";
            // send notification to customer
        }
        break;        
        
    case "booking":   
        if (!$customer->HasRecord()) {
            if ($customer_subscription != 0) {
                $counter = new SystemCounters();
                $counter->conn = $connect;
                $counter->counterField = "UserCustomerID";
                
                $new_customer = new Customers();
                $new_customer->customerId = $counter->IDCount();
                $new_customer->email = $email;
                $new_customer->firstname = $fname;
                $new_customer->lastname = $lname;
                $new_customer->telephone = $contact;
                $new_customer->mobile = $contact;
                $new_customer->street = $address;
                $new_customer->subscription = $customer_subscription;

                $counter->UpdateIDCount($counter->IDCount());

                echo $customer->NewCustomer($new_customer);
                // send notification to customer
            } else {
                // send notification to customer
            }                       
        } else {
            echo "record existing!";
            // send notification to customer
        }
        
        break;    
}
?>