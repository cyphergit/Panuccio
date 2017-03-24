<?php    
  include('../conf.inc.php');  
  include('../modules/cypher_mod_encryp.php');
  session_start();
  
  $username = $_POST['txtUsername'];
  $password = $_POST['txtPassword'];
  
  $q = "SELECT UserNumber, Username, Password FROM `UserLogin` WHERE UserName = '$username' AND Password = '$password' AND SystemLevel <> '1' AND Status = '1'";
  $r = mysql_query($q) or die(mysql_error());
    
	if(mysql_num_rows($r) == 1) // There is something in the db. The username/password match up.
  {
    $row = mysql_fetch_assoc($r);
    $_SESSION['usernumber'] = $row['UserNumber'];
    $_SESSION['username'] = $row['Username'];
    $_SESSION['logged'] = 1; // Sets the session.
      
    header("Location: http://localhost/Panuccio/account/"); // Goes to main page.
    exit(); // Stops the rest of the script.
	} 
?>