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
<h2>Events</h2>
<div id="crudControl">
  <a href="index.php?pg=events_create">Add Events</a> |  
  <div style="float: right;">
    <a href="index.php?pg=events">Event Listing</a> |
    <a href="#">Images</a>
  </div>
</div>
<div class="dataForm">
  <fieldset>
    <legend>Add New Event</legend>
    <div id='crudForm'>
      <?php
        include('modules/cypher_mod_events.php');
      ?>
    </div>
  </fieldset>
</div>
