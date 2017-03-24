<?php    
  include('../../conf.inc.php');  
  include('../includes/cypher_functions.php');
  
  $sql = "SELECT ArticleID FROM IDCounters";
  
  $newid = GetIDCount($sql);
  
	$aTitle = $_POST['txtATitle'];
  $aContent = nl2br($_POST['txtAContent']);
  $aAuthor = $_POST['txtAAuthor'];  

  $cur_date = date("y-m-d h:m:s");
  
  mysql_query("UPDATE IDCounters SET ArticleID = '$newid'");
  
	mysql_query("INSERT INTO NewsletterArticle (ArticleID, ArticleTitle, ArticleContent, ArticleAuthor, DatePublished, Status)
        VALUES ('A$newid','$aTitle','$aContent','$aAuthor',now(),'1')") or die (mysql_error());
  
  echo "<script type=\"text/javascript\">alert(\"A new Article was successfully created!\");window.location=\"$site_host/admin/index.php?pg=articles\"</script>";

  mysql_close($db_connect); // Closes the connection.

?>