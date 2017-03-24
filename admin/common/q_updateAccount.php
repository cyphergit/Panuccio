<?php    
  include('../../conf.inc.php');  
  
	$entryID = $_POST['EntryID'];
  
  $aEmail = $_POST['txtUEmail'];
  $aSysLevel = $_POST['selULevel'];
  $aNewPassword = $_POST['txtUNewPass'];
  $aPassword = $_POST['txtPassword'];
  
  if ($aNewPassword == "") {
  
    $new_password = $aPassword;
  
  } else {
  
    $new_password = $aNewPassword;
    
  }
  
  $cur_date = date("y-m-d h:m:s");
  
	mysql_query("UPDATE UserLogin SET UserName = '$aEmail', Password = '$new_password',  SystemLevel = '$aSysLevel' WHERE UserNumber = '$entryID'") or die (mysql_error());
  
  mysql_query("UPDATE Customers SET Email = '$aEmail' WHERE CustomersID = '$entryID'") or die (mysql_error());
  
  echo "<script type=\"text/javascript\">alert(\"Your account has been updated! You are required to login for your updates to take effect.\");window.location=\"$site_host/admin/common/f_logout.php\"</script>";

  mysql_close($db_connect); // Closes the connection.
  
?>