<?php
session_start();
$site = "http://www.panuccioautos.com.au/admin";
if($_SESSION['logged'] != 1) {
echo "<script type=\"text/javascript\">window.location=\"$site/index.php?pg=login\"</script>"; 
} else {
echo "<div id='LogPanel'>";
echo "<div id='Login-Register'>";
echo "<a href='http://www.panuccioautos.com.au/admin/index.php?pg=accountsettings'>Account Settings</a>";
echo "<a href='http://www.panuccioautos.com.au/admin/f_logout.php' class='cypherLogs'>Logout</a>";
echo "</div>";
echo "</div>";
}
?>
<script type="text/javascript">
  function deleteRow(r) {
  
			var answer = confirm("Delete this entry?")
			if (answer){
				var i=r.parentNode.parentNode.rowIndex;
				
				var table = document.getElementById('cypher-dataTable');
				var row = table.rows[i];
				var cell = row.cells[0];
				content = cell.firstChild.nodeValue;
				
        var cell3 = row.cells[2];
        fileName = cell3.firstChild.nodeValue;
        
				$("#delete-wrap").append('<form name="deleteForm" id="deleteForm" action="../remPreownedImg.php" method="post"><input id="entryID" name="entryID" type="hidden" value="' + content + '"/><input id="imageFile" name="imageFile" type="hidden" value="' + fileName + '"/></form>');
				
				document.deleteForm.submit();
				
				//alert(content);
			}	else {
      
				alert("Operation Cancelled.");
        
			}	
      
  }
  
  function LoadUpdateDialog(r) {

      var i=r.parentNode.parentNode.rowIndex;

      var table = document.getElementById('cypher-dataTable');
      var row = table.rows[i];
      var cell = row.cells[0];
      content = cell.firstChild.nodeValue;

      document.cookie = 'IDValue = '+ content +'';
      document.cookie = 'Process = Update';

      var w = document.body.clientWidth, h = document.body.clientHeight;
      var popW = 500, popH = 350;
      var leftPos = (w-popW)/2, topPos = (h-popH)/2;

      //window.open('http://localhost/Panuccio/admin/views/view_preowned.php','preownedWindow','width='+ popW +',height='+ popH +',top=' + topPos +',left=' + leftPos +',resizable=no');
      window.open('http://www.panuccioautos.com.au/admin/views/view_preowned.php','preownedWindow','width='+ popW +',height='+ popH +',top=' + topPos +',left=' + leftPos +',resizable=yes,scrollbars=yes');

      //alert(document.cookie);
    
  }

  function LoadViewDialog(r) {
  
      var i=r.parentNode.parentNode.rowIndex;
      
      var table = document.getElementById('cypher-dataTable');
      var row = table.rows[i];
      var cell = row.cells[0];
      content = cell.firstChild.nodeValue;

      document.cookie = 'IDValue = '+ content +'';
      document.cookie = 'Process = View';

      var w = document.body.clientWidth, h = document.body.clientHeight;
      var popW = 500, popH = 350;
      var leftPos = (w-popW)/2, topPos = (h-popH)/2;

      //window.open('http://localhost/Panuccio/admin/views/view_preownedimg.php','preownedWindow','width='+ popW +',height='+ popH +',top=' + topPos +',left=' + leftPos +',resizable=yes,scrollbars=yes');
      window.open('http://www.panuccioautos.com.au/admin/views/view_preownedimg.php','preownedWindow','width='+ popW +',height='+ popH +',top=' + topPos +',left=' + leftPos +',resizable=yes,scrollbars=yes');

      //alert(document.cookie);
    
  }
  
  function LoadPreownedImage() {

      document.cookie = 'Process = PreownedImgUpload';

      var w = document.body.clientWidth, h = document.body.clientHeight;
      var popW = 500, popH = 350;
      var leftPos = (w-popW)/2, topPos = (h-popH)/2;

      //window.open('http://localhost/Panuccio/admin/preuploadPreownedImg.php','preownedWindow','width='+ popW +',height='+ popH +',top=' + topPos +',left=' + leftPos +',resizable=yes,scrollbars=yes');
      window.open('http://www.panuccioautos.com.au/preuploadPIImage.php','preownedWindow','width='+ popW +',height='+ popH +',top=' + topPos +',left=' + leftPos +',resizable=yes,scrollbars=yes');      
      
      //alert(document.cookie);
    
  }
</script>

<?php include('../conf.inc.php');?>

<h2>Pre Owned - Image</h2>
<div id="crudControl">
  <a onclick="LoadPreownedImage();" class="crud-javalink">Upload Image</a> |
  <div style="float: right;">
    <a href="index.php?pg=pre_owned">Pre Owned Item Listing</a> |
    <a href="index.php?pg=pre_owned_image">Images</a>
  </div>
</div>
<div>
  <?php include('includes/cypher_preownedimg_table.php');?>
</div>
