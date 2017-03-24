<?php    
  include('../../conf.inc.php');  
  
	$entryID = $_POST['EntryID'];
  
  $aTitle = form($_POST['txtATitle']);
  $aAuthor = form($_POST['txtAAuthor']);
  $aContent = nl2br($_POST['txtAContent']);
  
  $cur_date = date("y-m-d h:m:s");
  
	mysql_query("UPDATE NewsletterArticle SET ArticleTitle = '$aTitle', ArticleAuthor = '$aAuthor', ArticleContent = '$aContent', DatePublished = now() WHERE ArticleID = '$entryID'") or die (mysql_error());
  
  //echo "<script type=\"text/javascript\">alert(\"Event Updated!\");window.location=\"$site_host/admin/index.php?pg=events\"</script>";

  mysql_close($db_connect); // Closes the connection.

?>