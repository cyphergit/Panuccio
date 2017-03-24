<?php    
  include('../../conf.inc.php');  
  
	$entryID = $_POST['entryID'];
  
  $cur_date = date("y-m-d h:m:s");
  
	mysql_query("UPDATE Events SET Status = '2' WHERE EventID = '$entryID'") or die (mysql_error());
  
  echo "<script type=\"text/javascript\">alert(\"Event Deleted!\");window.location=\"$site_host/admin/index.php?pg=events\"</script>";

  mysql_close($db_connect); // Closes the connection.

?>