<link href="view/DialogForm.css" rel="Stylesheet" type="text/css" />
<script type="text/javascript">
  
    function validateForm(ImageUploadForm) {
        
        var typeFile = /.jpg|.png|.gif/;
        var strFile = document.getElementById("uploadedfile").value;
        var typeFileMatch = strFile.search(typeFile);
        
        if(document.ImageUploadForm.selItemSet.value == "Select a Pre-Owned Item Set") {
            alert("Please select a Pre Owned Item Set");
            document.ImageUploadForm.selItemSet.focus();
            return false;
        }
        
        if (strFile == "") {
            alert("Please select a .jpg, .png or .gif file to upload.")
            document.getElementById("uploadedFile").focus();
            return false;
        }

        if (typeFileMatch == -1) {
            alert("Please select a .jpg, .png or .gif file to upload.")
            document.getElementById("uploadedFile").focus();
            return false;
        }

        document.ImageUploadForm.submit();
        
    }

    function ClosePopUp() {
    
        window.close();
        
    }
  
    function SubmitForm() { 
    
			  return validateForm(this);
        
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
  echo "<option value='Select a Pre-Owned Item Set'>[Select a Pre-Owned Item Set]</option>";
  
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
  echo "<td><input id='uploadedfile' name='uploadedfile' type='file'/></td>";
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
