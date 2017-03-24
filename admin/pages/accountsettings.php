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
<?php include('../conf.inc.php');?>

<h2>Account Settings</h2>
<div id="crudControl">
  Update your account credentials here.
</div>
<div class="dataForm" style="margin-bottom: 80px;">
  <fieldset>
    <legend>Account Credentials</legend>
    <div id='crudForm'>
      <?php
        include('modules/cypher_mod_accountsettings.php');
      ?>
    </div>
  </fieldset>
</div>
