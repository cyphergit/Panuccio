<?php  
  include('../conf.inc.php');
  include('../includes/cypher_functions.php');
  include('../modules/cypher_mod_encryp.php');  
  session_start();
  
  $username = $_POST['txtUsername'];
  $password = $_POST['txtPassword'];
  
  $query = "Select UserCustomerID From IDCounters";
  $new_id = GetIDCount($query);
  
  $cur_date = date("y-m-d h:m:s");
  
  if ($_SESSION['security_code'] == $_POST['security_code']) {
    $q = mysql_query("SELECT * FROM `UserLogin` WHERE Username = '$username' AND Password = '$password'") or die (mysql_error()); // mySQL Query
	  $r = mysql_num_rows($q); // Checks to see if anything is in the db.   
    
    if ($r > 0) { // If there are users with the same username/email.
		  echo "<script type=\"text/javascript\">alert(\"User is already registered.\"); window.location=\"http://localhost/Panuccio/index.php?pg=register\"</script>";
			exit();
	  } else {
      mysql_query("UPDATE `IDCounters` SET UserCustomerID = '$new_id'") or die (mysql_error());
      
      mysql_query("INSERT INTO `UserLogin` (UserNumber,Username,Password,SystemLevel,CreatedBy,Timestamp,Status) 
        VALUES ('$new_id','$username','$password','3','Customer','$cur_date', '1') ") or die (mysql_error()); // Inserts the UserLogin.
      
      echo "<script type=\"text/javascript\">alert(\"Thank you for signing up. After logging in, kindly complete your information at the site's User Account page.\"); window.location=\"http://localhost/Panuccio/index.php?pg=login\"</script>";
    }
  } else {
    echo "<script type=\"text/javascript\">alert(\"Please provide a valid information in your registration.\"); window.location=\"http://localhost/Panuccio/index.php?pg=register\"</script>";
		exit();  
  }
   
?>