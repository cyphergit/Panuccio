<?php    
  include('../../conf.inc.php');  
  
	$entryID = $_POST['EntryID'];
  
  $uFirstname = $_POST['txtUFirstname'];
  $uLastname = $_POST['txtULastname'];
  $uMobile = $_POST['txUMobile'];
  $uLandline = $_POST['txtULandline'];
  
  $cur_date = date("y-m-d h:m:s");
  
	mysql_query("UPDATE Customers SET Firstname = '$uFirstname', Lastname = '$uLastname',  MobileNum = '$uMobile', LandlineNum = '$uLandline' WHERE CustomersID = '$entryID'") or die (mysql_error());
  
  //echo "<script type=\"text/javascript\">alert(\"Event Updated!\");window.location=\"$site_host/admin/index.php?pg=useraccount\"</script>";

  mysql_close($db_connect); // Closes the connection.

?>