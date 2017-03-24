<link href="view/DialogForm.css" rel="Stylesheet" type="text/css" />
<script type="text/javascript">

    function ConfirmationMsg() {
    
			  alert("Image has been uploaded.");
			  window.opener.location.href = window.opener.location.href;

			  if (window.opener.progressWindow) {
				  window.opener.progressWindow.close()
			  }
        
			  window.close();
        
		}
  
    function ClosePopUp() {
    
        window.close();
        
    }
  
    function SubmitForm() { 
    
			  document.ImageUploadForm.submit();
        //ConfirmationMsg();
        
    }
    
</script>
<title>Image Upload</title>
<?php
  include('conf.inc.php');
  $process = $_COOKIE['Process'];
  
  $sql = "SELECT PreOwnedID, ItemName FROM Preowned WHERE Status = '1' ORDER BY PreOwnedID ASC";
  
  $rs = mysql_query($sql);
  
  echo $process;
  
  echo "<form enctype='multipart/form-data' id='ImageUploadForm' name='ImageUploadForm' method='POST' action='uploaderPI.php'>";
  echo "<div class='DialogForm'>";
  echo "<h4>Upload Pre-Owned Image</h4>";
  echo "<div class='DialogFormContent'>";
  echo "<table>";
  echo "<tr>";
  echo "<td class='itemfield'>Select an Item Set:</td>";
  echo "<td>";
  echo "<select id='selItemSet' name='selItemSet' class='DialogEntry'>";
  echo "<option>[Select a Pre-Owned Item Set]</option>";
  
  while($row = mysql_fetch_array($rs))
  { 
    $itemCode = $row[0];
    $itemVal = $row[1];
    
	  echo "<option value='$itemCode'>$itemVal</option>";
  }
  
  echo "</select>";
  echo "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td class='itemfield'>Select an image to upload:</td>";
  echo "<td><input name='uploadedfile' type='file'/></td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td class='itemfield'></td>";
  echo "<td><input type='hidden' name='MAX_FILE_SIZE' value='10000000' /></td>";
  echo "</tr>";
  echo "</table>";
  echo "</div>";
  echo "<div class='DialogFormClose'>";
  echo "<a onclick=\"SubmitForm();\" alt='Upload Image'>Upload Image</a> | ";
  echo "<a onclick=\"ClosePopUp();\" alt='Close'>Close Window</a>";
  echo "</div>";      
  echo "</form>";  
?>
