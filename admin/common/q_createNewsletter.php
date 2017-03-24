<?php    
  include('../../conf.inc.php');  
  include('../includes/cypher_functions.php');
  
  $sql = "SELECT NewsletterID FROM IDCounters";
  
  $newid = GetIDCount($sql);
  
	$nTitle = $_POST['txtNTitle'];  
  
  $cur_date = date("y-m-d h:m:s");
  
  mysql_query("UPDATE IDCounters SET NewsletterID = '$newid'");
  
	mysql_query("INSERT INTO Newsletter (NewsletterID, NewsletterName, Status)
        VALUES ('N$newid','$nTitle','1')") or die (mysql_error());
  
  echo "<script type=\"text/javascript\">alert(\"A new Newsletter was successfully created!\");window.location=\"$site_host/admin/index.php?pg=newsletter\"</script>";

  mysql_close($db_connect); // Closes the connection.

?>