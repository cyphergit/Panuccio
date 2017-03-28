<?php

include '../conf.inc.php';
include '../includes/functions.php';

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

if (IsInjected($email) && IsInjected($subject)) {
    echo "There is an error in your registration. Please try again!";
    exit();
}

if ($subscription == "" || $subscription == null) {
    $customer_subscription = 0;
}

switch($form) {
    case "unsubscribe":        
        $query = "SELECT Email, NewsletterSubscription FROM Customers WHERE Email='".$_POST['email']."' LIMIT 1";
        mysqli_query($link, $query);
        break;
    
    case "booking":
        break;
    
    case "enquiry":
        break;
}
//  include('../conf.inc.php');  
//  include('../modules/cypher_mod_encryp.php');
//
//  $username = $_POST['txtUsername'];
//  $password = $_POST['txtPassword'];
//  
//  $q = "SELECT UserNumber, Username, Password FROM `UserLogin` WHERE UserName = '$username' AND Password = '$password' AND SystemLevel <> '1' AND Status = '1'";
//  $r = mysql_query($q) or die(mysql_error());
//    
//	if(mysql_num_rows($r) == 1) 
//  {
//    $row = mysql_fetch_assoc($r);
//    $_SESSION['usernumber'] = $row['UserNumber'];
//    $_SESSION['username'] = $row['Username'];
//    $_SESSION['logged'] = 1; 
//      
//    header("Location: http://localhost/Panuccio/account/");
//    exit();
//	} 
?>