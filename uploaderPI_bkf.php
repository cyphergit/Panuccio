<script type="text/javascript">

    function ConfirmationMsg() {
    
			  alert("Image has been uploaded.");
			  window.opener.location.href = window.opener.location.href;

			  if (window.opener.progressWindow) {
				  window.opener.progressWindow.close()
			  }
        
			  window.close();
        
		}

</script>
<?php
include('conf.inc.php');

$itemSet = $_POST['selItemSet'];

$target_path = "images_preowned/";

$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
    $filename = basename( $_FILES['uploadedfile']['name']);
    
    mysql_query("INSERT INTO PreownedImage (PreOwnedID,ItemImage) VALUES('$itemSet','$filename')") or die (mysql_error());
        
    echo "<script type=\"text/javascript\">ConfirmationMsg();</script>";
    
} else{
    echo "There was an error uploading the file, please try again!";
}
?>