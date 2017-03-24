<?php    
  include('../../conf.inc.php');  
  include('../modules/cypher_mod_encryp.php');

  $email = $_POST['txtUsername'];
  
  $sql = "SELECT UserName, Password FROM UserLogin WHERE UserName = '$email'";
  $r = mysql_query($sql) or die(mysql_error());
 
  $num_rows = mysql_num_rows($r);
  $row = mysql_fetch_array($r);
  
  $user_email = $row[0];
  $user_password = $row[1];

  $emailFrom = 'admin@panuccioautos.com.au';  
  $emailTo = $email;  
  $subject = 'Panuccio Autos - Account Recovery';
  
  $body = "<html>";
  $body .= "<body>";
  $body .= "<div>";
  
  $body .= "<h2>Panuccio Autos - Account Recovery</h2>";
  $body .= "<p>";
  $body .= "Dear User,";
  $body .= "<br/><br/>";
  $body .= "Please see below your account details as per request:";  
  $body .= "<br/><br/>";
  $body .= "Your E-mail Address: <em>$user_email</em><br/>";
  $body .= "Your Password: <em>$user_password</em><br/>";
  $body .= "</p>";
  $body .= "<p>";
  $body .= "Kindly keep the above information just in case you forgot your account details when logging in to your account in Panuccio.";
  $body .= "</p>";
  $body .= "<p>";
  $body .= "Regards,<br/><br/>";
  $body .= "Panuccio Autos - Administrator";
  $body .= "</p>";
  $body .= "</div>";
  $body .= "</body>";
  $body .= "</html>";
    
  $headers = "MIME-Version: 1.0\r\n";
  $headers .= "From: Panuccio Autos - Account Recovery<$emailFrom>\r\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    
  mail($emailTo, $subject, $body, $headers);
  $emailSent = true;  
  
  echo "<script type=\"text/javascript\">alert(\"Your request was sent successfully. You may check your inbox for the details.\"); window.location=\"http://www.panuccioautos.com.au/admin\"</script>";
?>