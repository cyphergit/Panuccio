<?php    
  include('conf.inc.php');  
  
	$entryID = $_POST['entryID'];
  $imageFile = $_POST['imageFile'];
  
  $cur_date = date("y-m-d h:m:s");
  
  $target_path = "images_preowned/";
  $target_path = $target_path.$imageFile; 

  unlink($target_path) or die("error");
  
	mysql_query("DELETE FROM PreownedImage WHERE ImageID = '$entryID'") or die (mysql_error());
  
  echo "<script type=\"text/javascript\">alert(\"Pre Owned Image Deleted!\");window.location=\"$site_host/admin/index.php?pg=pre_owned_image\"</script>";

  mysql_close($db_connect); // Closes the connection.

?>