<?php

include '../config/conf.inc.php';
include '../includes/functions.php';
include '../classes/system_counter.php';
include '../classes/customers.php';
include '../classes/email_notif.php';

//Initiate post fields
$form           =   $_POST['form'];
$email          =   $_POST['email'];
$fname          =   $_POST['fname'];
$lname          =   $_POST['lname'];
$subject        =   $_POST['subject'];
$message        =   $_POST['message'];
$contact        =   $_POST['contact'];
$address        =   $_POST['address'];
$carModel       =   $_POST['carModel'];
$transmission   =   $_POST['transmission'];
$fuelType       =   $_POST['fuelType'];
$serviceRequest =   $_POST['serviceRequest'];
$preferredDate  =   $_POST['preferredDate'];
$subscription   =   $_POST['subscribe'];
$admin_email    =   "cypherit.testmail@gmail.com";

//Check for injection
if (IsInjected($email) && IsInjected($subject)) {
    echo "There is an error in your registration. Please try again!";
    exit();
}

function sendNotification($template, $emailTo, $emailSubject) {
    $notify = new EmailNotif();
    $notify->emailTo = $emailTo;
    $notify->emailFrom = "no-reply@panuccioautos.com.au";
    $notify->emailSubject = $emailSubject;
    $notify->emailBody = $template;

    return $notify->sendNotif();            
}

function sendSubscriptionNotif($collection, $email) {
    include '../email_templates/subscribe.php';
    $subscribe_template = subscribe_template($collection);
    sendNotification($subscribe_template, $email, "Subscription");
}

function resultToJson($form, $emailResult) {
    if ($emailResult) { $result = "s"; } 
    else { $result = "f"; }
    
    $value = array("form"=>$form, "result"=>$result);
    
    return json_encode($value);
}

//Set subscription value
if ($subscription == "" || $subscription == null) {
    $customer_subscription = "0";
} else {
    $customer_subscription = $subscription;
}

$collection = (object) array("name" => "$fname $lname", "email" => $email,
    "subject" => $subject, "message" => $message, "telephone" => $contact, "address" => $address,
    "carModel" => $carModel, "transmission" => $transmission, "fuelType" => $fuelType,
    "serviceRequest" => $serviceRequest, "preferredDate" => $preferredDate);

$customer = new Customers();
$customer->conn = $connect;
$customer->email = $email;

switch ($form) {
    //Unsubscribe
    case "unsubscribe":
        include '../email_templates/unsubscribe.php';
        $template = unsubscribe_template($collection);

        if ($customer->HasRecord()) {
            if ($customer->UpdateCustomerSubscription($customer_subscription)) {
                echo sendNotification($template, $email, "Unsubscribe");
            }
        }
        break;

    //Enquiry
    case "enquiry":
        include '../email_templates/enquiry.php';
        $enquiry_template = enquiry_template($collection);
        $enquiry_subject = "Online Enquiry";

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

                $customer->NewCustomer($new_customer);

                //Send notif to customer
                //$member = sendSubscriptionNotif($collection, $email);
                
                //Send notif to admin
                //$admin = sendNotification($enquiry_template, $admin_email, $enquiry_subject);

            } else {
                //Send notif to admin
                echo resultToJson($form, true);
                //echo sendNotification($enquiry_template, $admin_email, $enquiry_subject);
            }
        } else {
            //Send notif to admin
            echo "test";
            //echo sendNotification($enquiry_template, $admin_email, $enquiry_subject);
        }
        break;

    //Booking
    case "booking":
        include '../email_templates/booking.php';
        $booking_template = booking_template($collection);
        $booking_subject = "Online Service Booking";

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

                $customer->NewCustomer($new_customer);

                //Send notif to admin
                $admin = sendNotification($booking_template, $admin_email, $booking_subject);

                //Send notif to customer
                $member = sendSubscriptionNotif($collection, $email);
                
                if (($admin) && ($member)) { echo true; }
                
            } else {
                //Send notif to admin
                echo sendNotification($booking_template, $admin_email, $booking_subject);
            }
        } else {
            //Send notif to admin
            echo sendNotification($booking_template, $admin_email, $booking_subject);
        }
        break;
}
?>