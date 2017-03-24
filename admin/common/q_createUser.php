<?php    
  include('../../conf.inc.php');  
  include('../includes/cypher_functions.php');
  
  $sql = "SELECT UserCustomerID FROM IDCounters";
  
  $newid = GetIDCount($sql);
  
	$username = $_POST['txtUsername'];
  $password = $_POST['txtPassword'];
  
  $cur_date = date("y-m-d h:m:s");
  
  //check if username already exist
  
  $sql_existing = "SELECT  * FROM UserLogin WHERE UserName = '$username'";
  $r_existing = mysql_query($sql_existing) or die(mysql_error());
  
  $num_rows = mysql_num_rows($r_existing);

  if ($num_rows > 1) {
  
      echo "<script type=\"text/javascript\">alert(\"Account Is Already Existing! Please try again.\");window.location=\"$site_host/admin/index.php?pg=useraccount_create\"</script>";
  
  } else {
    
      //add user
      
      mysql_query("UPDATE IDCounters SET UserCustomerID = '$newid'");
  
	    mysql_query("INSERT INTO UserLogin (Usernumber, UserName, Password, SystemLevel,CreatedBy,Timestamp,Status)
            VALUES ('$newid','$username','$password','1','Administrator','$cur_date','1')") or die (mysql_error());
  
      mysql_query("INSERT INTO Customers (CustomersID, Email, Firstname, Lastname, NewsletterSubscription)
            VALUES ('$newid','$username','Administrator','Account','0')") or die (mysql_error());
  
      echo "<script type=\"text/javascript\">alert(\"New Account Created!\");window.location=\"$site_host/admin/index.php?pg=useraccount\"</script>";
  
  }

  mysql_close($db_connect); // Closes the connection.

?>