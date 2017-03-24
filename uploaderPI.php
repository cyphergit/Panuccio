<script type="text/javascript">

    function ConfirmationMsg() {
    
			  alert("Image has been uploaded.");
			  window.opener.location.href = window.opener.location.href;

			  if (window.opener.progressWindow) {
				  window.opener.progressWindow.close()
			  }
        
			  window.close();
        
		}

    function ErrorMsg() {
    
			  alert("There was an error uploading the file, please try again!");
			  window.opener.location.href = window.opener.location.href;

			  if (window.opener.progressWindow) {
				  window.opener.progressWindow.close()
			  }
        
			  window.close();
        
		}
</script>
<?php
include('conf.inc.php');

$filename = basename( $_FILES['uploadedfile']['name']);
$fileExt = FetchExtension($filename);

$itemSet = $_POST['selItemSet'];

$newFilename = date("mdyhis");
$newFilename = $itemSet."_".$newFilename.".".$fileExt;

$target_path = "images_preowned/";
$target_path = $target_path.$newFilename; 

if(rename($_FILES['uploadedfile']['tmp_name'],$target_path)) {

    mysql_query("INSERT INTO PreownedImage (PreOwnedID,ItemImage) VALUES('$itemSet','$newFilename')") or die (mysql_error());
        
    echo "<script type=\"text/javascript\">ConfirmationMsg();</script>";
    
} else{
    //echo "There was an error uploading the file, please try again!";
    echo "<script type=\"text/javascript\">ErrorMsg();</script>";
}
?>