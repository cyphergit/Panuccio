<?php    
  include('../../conf.inc.php');  
  //include('../modules/cypher_mod_encryp.php');
  
	$entryID = $_POST['entryID'];
  
  $cur_date = date("y-m-d h:m:s");
  
	mysql_query("UPDATE UserLogin SET Status = '2' WHERE UserNumber = '$entryID'") or die (mysql_error());
  
  echo "<script type=\"text/javascript\">alert(\"Account Deleted!\");window.location=\"$site_host/admin/index.php?pg=useraccount\"</script>";

  mysql_close($db_connect); // Closes the connection.

?>