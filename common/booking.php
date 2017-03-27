<?php  
include('../conf.inc.php');
include('../includes/cypher_functions.php');
  
$bFirstname = $_POST['b_txtFirstname'];
$bLastname = $_POST['b_txtLastname'];
$bEmail = $_POST['b_txtEmail'];
$bContact = $_POST['b_txtContact'];
$bCarModel = $_POST['b_txtCarModel'];
$bLocalAddress = $_POST['b_txtLocAddress'];
$bTransmission = $_POST['selTransmission'];
$bFuelType = $_POST['selFuelType'];
$bServiceRequest = $_POST['b_txtServiceRequest'];
$bPreferredDate = $_POST['b_txtPrefDate'];

$nSubscription = $_POST['txtNewsletter'];
  
$emailFrom = $bEmail;
$replyTo = $bEmail;
$emailTo = 'admin@panuccioautos.com.au';
//$emailTo = 'cypherit.testmail@gmail.com';
$ccTo = 'tennile@panuccioautos.com.au';
  
$subject = "Panuccio Autos - Customer On-line Service Booking";
  
$body = "<html>";
$body .= "<body>";
$body .= "<div>";
$body .= "<h2>Panuccio Autos - Customer Service Request</h2>";
$body .= "<h3>Personal Details</h3>";
$body .= "<p>";
$body .= "<b>Customer Name:</b> <em>$bFirstname $bLastname</em><br/>";
$body .= "<b>E-mail Address:</b> <em>$bEmail</em><br/>";
$body .= "<b>Contact No.:</b> <em>$bContact</em><br/>";
$body .= "<b>Home Address:</b> <em>$bLocalAddress</em><br/>";
$body .= "</p>";
  
$body .= "<h3>Car Details</h3>";
$body .= "<p>";
$body .= "<b>Car Model:</b> <em>$bCarModel</em><br/>";
$body .= "<b>Transmission:</b> <em>$bTransmission</em><br/>";
$body .= "<b>Fuel Type:</b> <em>$bFuelType</em><br/>";  
$body .= "</p>";
  
$body .= "<h3>Service Request</h3>";
$body .= "<p>";
$body .= "<b>Request:</b><br/><br/> <em>$bServiceRequest</em><br/><br/>";
$body .= "<b>Service Preferred Date:</b> <em>$bPreferredDate</em><br/>";
$body .= "</p>";
$body .= "</div>";
$body .= "</body>";
$body .= "</html>";

$headers = "MIME-Version: 1.0\r\n";
$headers .= "From: Panuccio Autos - Online Booking<$emailFrom>\r\n";
$headers .= "Cc: $ccTo" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
  
if ($nSubscription == 1) {

  $sql_existing = "SELECT * FROM UserLogin WHERE UserName = '$bEmail'";
  $r_existing = mysql_query($sql_existing) or die(mysql_error());
  
  $num_rows = mysql_num_rows($r_existing);
  $count = $num_rows;

  if ($count >= 1) {
    
    mail($emailTo, $subject, $body, $headers);
    $emailSent = true;
    
    echo "<script type=\"text/javascript\">alert(\"Your message was sent successfully. Please give us an ample time to give you a feedback regarding your concern as soon as possible. Thank you.\"); window.location=\"http://www.panuccioautos.com.au/\"</script>";
  
  } else {
  
    $sql = "SELECT UserCustomerID FROM IDCounters";
  
    $newid = GetIDCount($sql);
  
    mysql_query("UPDATE IDCounters SET UserCustomerID = '$newid'") or die (mysql_error());
  
    mysql_query("INSERT INTO Customers (CustomersID, Email, Firstname, Lastname,NewsletterSubscription)
    VALUES ('$newid','$bEmail','$bFirstname','$bLastname','0')") or die (mysql_error());
   
    mysql_query("INSERT INTO UserLogin (UserNumber, UserName, Password, SystemLevel, CreatedBy, Timestamp, Status)
    VALUES ('$newid','$bEmail','default','3','Customer',now(),'1')") or die (mysql_error());
    
    mail($emailTo, $subject, $body, $headers);
    $emailSent = true;
      
    echo "<script type=\"text/javascript\">alert(\"Your message was sent successfully. Please give us an ample time to give you a feedback regarding your concern as soon as possible. Thank you.\"); window.location=\"http://www.panuccioautos.com.au/\"</script>";
  }

}  else {

mail($emailTo, $subject, $body, $headers);
$emailSent = true;

echo "<script type=\"text/javascript\">alert(\"Your message was sent successfully. Please give us an ample time to give you a feedback regarding your concern as soon as possible. Thank you.\"); window.location=\"http://www.panuccioautos.com.au/\"</script>";

}
?>