<?php    
  include('../../conf.inc.php');  
  
	$entryID = $_POST['entryID'];
  
  $cur_date = date("y-m-d h:m:s");
  
	mysql_query("UPDATE NewsletterArticle SET Status = '2' WHERE ArticleID = '$entryID'") or die (mysql_error());
  
  echo "<script type=\"text/javascript\">alert(\"Article Deleted!\");window.location=\"$site_host/admin/index.php?pg=articles\"</script>";

  mysql_close($db_connect); // Closes the connection.

?>