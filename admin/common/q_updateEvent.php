<?php    
  include('../../conf.inc.php');  
  
	$entryID = $_POST['EntryID'];
  
  $eTitle = $_POST['txtETitle'];
  $eDesc = nl2br($_POST['txtEDesc']);
  $eVenue = $_POST['txtEVenue'];
  $eDate = $_POST['txtEDate'];
  
  $cur_date = date("y-m-d h:m:s");
  
	mysql_query("UPDATE Events SET EventTitle = '$eTitle', EventDesc = '$eDesc',  EventDate = STR_TO_DATE('$eDate','%m/%d/%Y'), EventVenue = '$eVenue' WHERE EventID = '$entryID'") or die (mysql_error());
  
  //echo "<script type=\"text/javascript\">alert(\"Event Updated!\");window.location=\"$site_host/admin/index.php?pg=events\"</script>";

  mysql_close($db_connect); // Closes the connection.

?>