<?php    
  include('../../conf.inc.php');  
  
	$entryID = $_POST['EntryID'];
  
  $nTitle = form($_POST['txtNTitle']);
  $nItemCount = $_POST['icounter'];  
  
	mysql_query("UPDATE Newsletter SET NewsletterName = '$nTitle' WHERE NewsletterID = '$entryID'") or die (mysql_error());
  
  $rs_nitem = mysql_query("SELECT * FROM NewsletterItem WHERE NewsletterID = '$entryID'") or die (mysql_error());
  $iCount = mysql_num_rows($rs_nitem);
  
  if ($iCount == 0) {
    for($i=1;$i<=$nItemCount;$i++) {
        if(isset($_REQUEST["txtArticle$i"])){$itemVal = $_REQUEST["txtArticle$i"];}
        mysql_query("INSERT INTO NewsletterItem (NewsletterID, Type, Title) VALUE ('$entryID','Article','$itemVal')") or die (mysql_error());
    }
  } else {
    mysql_query("DELETE FROM NewsletterItem WHERE NewsletterID = '$entryID'") or die (mysql_error());
    for($i=1;$i<=$nItemCount;$i++) {
        if(isset($_REQUEST["txtArticle$i"])){$itemVal = $_REQUEST["txtArticle$i"];}
        mysql_query("INSERT INTO NewsletterItem (NewsletterID, Type, Title) VALUE ('$entryID','Article','$itemVal')") or die (mysql_error());
    }
  }
  
  //echo "<script type=\"text/javascript\">alert(\"Newsletter Updated!\");window.location=\"$site_host/admin/index.php?pg=newsletter\"</script>";
  
  mysql_close($db_connect); // Closes the connection.

?>