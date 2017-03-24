<?php    
  include('../../conf.inc.php');  
  
	$entryID = $_POST['EntryID'];
  
  $pItem = $_POST['txtPItem'];
  $pBrand = $_POST['txtPBrand'];
  $pModel = $_POST['txtPModel'];
  $pEngine = $_POST['txtPEngine'];
  $pTransmission = $_POST['txtPTransmission'];
  $pDetails = nl2br($_POST['txtPDesc']);
  $pPrice = $_POST['txtPPrice'];
  
  $cur_date = date("y-m-d h:m:s");
  
	mysql_query("UPDATE Preowned SET ItemName = '$pItem', Brand = '$pBrand', Model = '$pModel',  Engine = '$pEngine', Transmission = '$pTransmission', Description = '$pDetails', Price = '$pPrice' WHERE PreownedID = '$entryID'") or die (mysql_error());
  
  //echo "<script type=\"text/javascript\">alert(\"Preowned Item Updated!\");window.location=\"$site_host/admin/index.php?pg=pre_owned\"</script>";

  mysql_close($db_connect); // Closes the connection.

?>