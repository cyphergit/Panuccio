<?php    
  include('../../conf.inc.php');  
  
	$entryID = $_POST['entryID'];
  
  $cur_date = date("y-m-d h:m:s");
  
	mysql_query("DELETE FROM NewsletterImage WHERE ImageID = '$entryID'") or die (mysql_error());
  
  echo "<script type=\"text/javascript\">alert(\"Image Deleted!\");window.location=\"$site_host/admin/index.php?pg=newsletter_image\"</script>";

  mysql_close($db_connect); // Closes the connection.

?>