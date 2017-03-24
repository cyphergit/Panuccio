<link href="DialogForm.css" rel="Stylesheet" type="text/css" />
<script type="text/javascript">
    function validateForm(UpdateForm) {

        if (document.UpdateForm.txtATitle.value == "") {
            alert("Please provide a title for your Article!");
            document.UpdateForm.txtATitle.focus();
            return false;
        }
            
        if (document.UpdateForm.txtAContent.value == "") {
            alert("Please provide a content for your Article!");
            document.UpdateForm.txtAContent.focus();
            return false;
        }                        
            
        //return true;        
        document.UpdateForm.submit();
        ConfirmationMsg();
    }
  
    function ConfirmationMsg() {
    
			  alert("Article has been updated.");
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
    
			  return validateForm(UpdateForm);
        
    }
    
</script>
<title>Articles</title>
<?php
  include("../../conf.inc.php");
	$tempID = $_COOKIE['IDValue'];
  $process = $_COOKIE['Process'];
  
  $q = "SELECT 
          ArticleTitle
          , ArticleAuthor
          , ArticleContent
        FROM 
          NewsletterArticle
        WHERE 
          ArticleID = '$tempID'";
          
  $rs = mysql_query($q);
  $row = mysql_fetch_array($rs);
 
  $aTitle = $row[0];  
  $vAContent = $row[2];
  $uAContent = br2space($row[2]);
  
  if($row[1] == "") {
    $aAuthor = "n/a";  
  } else {
    $aAuthor = $row[1];
  }
  
  if ($process == "View") {
  
    echo "<div class='DialogForm'>";
	  echo "<h4>Article Details</h4>";
    echo "<div class='DialogFormContent'>";
    echo "<div><span class='itemfield'>Title:</span>  <em>$aTitle</em></div>";
	  echo "<br/>";
    echo "<div><span class='itemfield'>Author:</span>  <em>$aAuthor</em></div>";
	  echo "<br/>";
    echo "<div><span class='itemfield'>Content:</span></div>";
	  echo "<br/>";
    echo "<div><em>$vAContent</em></div><br/>";
    echo "</div>";
    echo "</div>";
    echo "<div class='DialogFormClose'><a href='#' onclick=\"ClosePopUp();\">Close Window</a></div>";  
  
  } else {
  
    echo "<form id='UpdateForm' name='UpdateForm' method='POST' action='../common/q_updateArticle.php'>";
    echo "<div class='DialogForm'>";
    echo "<h4>Update Article Details</h4>";
    echo "<div class='DialogFormContent'>";
    echo "<table>";
    echo "<tr>";
    echo "<td class='itemfield'>Title:</td>";
    echo "<td><input type='text' id='txtATitle' name='txtATitle' class='DialogEntry' value='$aTitle'/></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td class='itemfield'>Author:</td>";
    echo "<td><input type='text' id='txtAAuthor' name='txtAAuthor' class='DialogEntry' value='$aAuthor'/></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td class='itemfield'>Content:</td>";
    echo "<td><textarea id='txtAContent' name='txtAContent' style='width: 330px; border: solid 1px #ccc;'>$uAContent</textarea></td>";
    echo "</tr>";      
    echo "</table>";
    echo "</div>";
    echo "<div class='DialogFormClose'>";
    echo "<a onclick=\"SubmitForm();\" alt='Update Entry'>Update Entry</a> | ";
    echo "<a onclick=\"ClosePopUp();\" alt='Close'>Close Window</a>";
    echo "</div>";
    echo "<input type='hidden' id='EntryID' name='EntryID' value='$tempID'/>";
    echo "</form>";    
  
  }  
?>