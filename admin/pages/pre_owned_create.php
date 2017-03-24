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
    function LoadPreownedImage() {

      var w = document.body.clientWidth, h = document.body.clientHeight;
      var popW = 500, popH = 350;
      var leftPos = (w-popW)/2, topPos = (h-popH)/2;

      //window.open('http://localhost/Panuccio/admin/preuploadPreownedImg.php','preownedWindow','width='+ popW +',height='+ popH +',top=' + topPos +',left=' + leftPos +',resizable=yes,scrollbars=yes');
      window.open('http://www.panuccioautos.com.au/admin/preuploadPreownedImg.php','preownedWindow','width='+ popW +',height='+ popH +',top=' + topPos +',left=' + leftPos +',resizable=yes,scrollbars=yes');

      //alert(document.cookie);
    
    }
</script>
<h2>Pre Owned</h2>
<div id="crudControl">
  <a href="index.php?pg=pre_owned_create">Add Item</a> |  
  <div style="float: right;">
    <a href="index.php?pg=pre_owned">Pre Owned Item Listing</a> |
    <a href="index.php?pg=pre_owned_image">Images</a>
  </div>
</div>
<div class="dataForm">
  <fieldset>
    <legend>Add New Item</legend>
    <div id='crudForm'>
      <?php
        include('modules/cypher_mod_preowned.php');
      ?>
    </div>
  </fieldset>
</div>
