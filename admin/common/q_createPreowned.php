<?php    
  include('../../conf.inc.php');  
  include('../includes/cypher_functions.php');
  
  $sql = "SELECT PreownedID FROM IDCounters";
  
  $newid = GetIDCount($sql);
  
	$pItem = $_POST['txtPItem'];
  $pBrand = $_POST['txtPBrand'];
  $pModel = $_POST['txtPModel'];
  $pEngine = $_POST['txtPEngine'];
  $pTransmission = $_POST['txtPTransmission'];
  $pDesc = nl2br($_POST['txtPDesc']);
  $pPrice = $_POST['txtPPrice'];
  
  //$cur_date = date("y-m-d h:m:s");
  
  mysql_query("UPDATE IDCounters SET PreownedID = '$newid'");
  
	mysql_query("INSERT INTO Preowned (PreOwnedID, ItemName, Brand, Model, Engine, Transmission, Description, Price, Status)
        VALUES ('P$newid','$pItem', '$pBrand', '$pModel', '$pEngine', '$pTransmission', '$pDesc', '$pPrice', '1')") or die (mysql_error());
  
  echo "<script type=\"text/javascript\">alert(\"New Pre Owned Item was Successfully Created!\");window.location=\"$site_host/admin/index.php?pg=pre_owned\"</script>";

  mysql_close($db_connect); // Closes the connection.

?>