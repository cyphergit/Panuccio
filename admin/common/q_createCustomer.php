<?php    
  include('../../conf.inc.php');  
  include('../includes/cypher_functions.php');
  
  $sql = "SELECT UserCustomerID FROM IDCounters";
  
  $newid = GetIDCount($sql);
  
	$cEmail = $_POST['txtCEmail'];
  $cLastname = $_POST['txtCLastname'];
  $cFirstname = $_POST['txtCFirstname'];
  $cLandline = $_POST['txtCLandline'];
  $cMobile = $_POST['txtCMobile'];
  
  $cur_date = date("y-m-d h:m:s");
  
  //add user
      
  mysql_query("UPDATE IDCounters SET UserCustomerID = '$newid'");
  	
  mysql_query("INSERT INTO Customers (CustomersID, Email, Firstname, Lastname, LandlineNum, MobileNum, NewsletterSubscription)
      VALUES ('$newid','$cEmail','$cFirstname','$cLastname','$cLandline','$cMobile','0')") or die (mysql_error());
  
  mysql_query("INSERT INTO UserLogin (UserNumber, UserName, Password, SystemLevel, CreatedBy, Timestamp, Status)
      VALUES ('$newid','$cEmail','default','3','Administrator',now(),'1')") or die (mysql_error());
  
  echo "<script type=\"text/javascript\">alert(\"Customer Created!\");window.location=\"$site_host/admin/index.php?pg=customers\"</script>";

  mysql_close($db_connect); // Closes the connection.

?>