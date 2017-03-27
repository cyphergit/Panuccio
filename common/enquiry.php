<?php

echo $_POST['email'];

//include('../conf.inc.php');
//include('../includes/cypher_functions.php');
//
//$firstname = $_POST['txtFirstname'];
//$lastname = $_POST['txtLastname'];
//$email = $_POST['txtEmail'];
//$subject = $_POST['txtSubject'];
//$message = $_POST['txtMessages'];
//  
//$nSubscription = $_POST['txtNewsletter'];
//
//$fullname = "$firstname $lastname";
//
//$emailFrom = $email;
//$replyTo = $email;
//$emailTo = 'admin@panuccioautos.com.au';
////$emailTo = 'cypherit.testmail@gmail.com';
//$ccTo = 'tennile@panuccioautos.com.au';
//  
//$subject = $subject;
//  
//$body = "<html>";
//$body .= "<body>";
//$body .= "<div>";
//  
//$body .= "<h2>Panuccio Autos - Online Enquiry</h2>";
//$body .= "<h3>Personal Details</h3>";
//$body .= "<p>";
//$body .= "<b>Customer Name:</b> <em>$fullname</em><br/>";
//$body .= "<b>E-mail Address:</b> <em>$email</em><br/>";
//$body .= "</p>";
//$body .= "<p>";
//$body .= "<b>Subject:</b> <em>$subject</em><br/><br/>";
//$body .= "<b>Message/Comment:</b><br/><br/> <em>$message</em><br/>";
//$body .= "</p>";
//
//$body .= "</div>";
//$body .= "</body>";
//$body .= "</html>";
//    
//$headers = "MIME-Version: 1.0\r\n";
//$headers .= "From: Panuccio Autos - Online Enquiry<$emailFrom>\r\n";
//$headers .= "Cc: $ccTo" . "\r\n";
//$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
//
//if ($nSubscription == 1) {
//
//  $sql_existing = "SELECT * FROM UserLogin WHERE UserName = '$email'";
//  $r_existing = mysql_query($sql_existing) or die(mysql_error());
//  
//  $num_rows = mysql_num_rows($r_existing);
//  $count = $num_rows;
//
//  if ($count >= 1) {
//    
//    mail($emailTo, $subject, $body, $headers);
//    $emailSent = true;
//    
//    echo "<script type=\"text/javascript\">alert(\"Your message was sent successfully. Please give us an ample time to give you a feedback regarding your concern as soon as possible. Thank you.\"); window.location=\"http://www.panuccioautos.com.au/\"</script>";
//  
//  } else {
//  
//    $sql = "SELECT UserCustomerID FROM IDCounters";
//  
//    $newid = GetIDCount($sql);
//  
//    mysql_query("UPDATE IDCounters SET UserCustomerID = '$newid'") or die (mysql_error());
//  
//    mysql_query("INSERT INTO Customers (CustomersID, Email, Firstname, Lastname,NewsletterSubscription)
//    VALUES ('$newid','$email','$firstname','$lastname','0')") or die (mysql_error());
//   
//    mysql_query("INSERT INTO UserLogin (UserNumber, UserName, Password, SystemLevel, CreatedBy, Timestamp, Status)
//    VALUES ('$newid','$email','default','3','Customer',now(),'1')") or die (mysql_error());
//    
//    mail($emailTo, $subject, $body, $headers);
//    $emailSent = true;
//      
//    echo "<script type=\"text/javascript\">alert(\"Your message was sent successfully. Please give us an ample time to give you a feedback regarding your concern as soon as possible. Thank you.\"); window.location=\"http://www.panuccioautos.com.au/\"</script>";
//  }
//
//}  else {
//
//mail($emailTo, $subject, $body, $headers);
//$emailSent = true;
//
//echo "<script type=\"text/javascript\">alert(\"Your message was sent successfully. Please give us an ample time to give you a feedback regarding your concern as soon as possible. Thank you.\"); window.location=\"http://www.panuccioautos.com.au/\"</script>";
//
//}
?>