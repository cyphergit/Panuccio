<?php    
  include('../../conf.inc.php');  
  //include('../modules/cypher_mod_encryp.php');
  
	$entryID = $_POST['entryID'];
  
  $cur_date = date("y-m-d h:m:s");
  
	mysql_query("UPDATE Preowned SET Status = '2' WHERE PreOwnedID = '$entryID'") or die (mysql_error());
  
  echo "<script type=\"text/javascript\">alert(\"Pre Owned Item Deleted!\");window.location=\"$site_host/admin/index.php?pg=pre_owned\"</script>";

  mysql_close($db_connect); // Closes the connection.

?>