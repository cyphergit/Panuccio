<?php    
  include('../../conf.inc.php');  
  include('../includes/cypher_functions.php');
  
  $sql = "SELECT EventID FROM IDCounters";
  
  $newid = GetIDCount($sql);
  
	$eTitle = $_POST['txtETitle'];
  $eDesc = nl2br($_POST['txtEDesc']);
  $eVenue = $_POST['txtEVenue'];
  $eDate = $_POST['txtEDate'];

  $cur_date = date("y-m-d h:m:s");
  
  mysql_query("UPDATE IDCounters SET EventID = '$newid'");
  
	mysql_query("INSERT INTO Events (EventID, EventTitle, EventDesc, EventDate, EventVenue, Status)
        VALUES ('E$newid','$eTitle','$eDesc',STR_TO_DATE('$eDate','%m/%d/%Y'),'$eVenue','1')") or die (mysql_error());
  
  echo "<script type=\"text/javascript\">alert(\"A new Event was successfully created!\");window.location=\"$site_host/admin/index.php?pg=events\"</script>";

  mysql_close($db_connect); // Closes the connection.

?>