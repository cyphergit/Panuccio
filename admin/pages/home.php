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
<h2>Panuccio Autos - Content Management</h2>
<p>
  Welcome to Panuccio Autos - Content Management.  This interface lets you manage and update the
  content of the site.
</p>
<p>
  <b>Panuccio Autos - Content Management capabilities:</b>
  <ul>
    <li>Event Management</li>
    <li>Customer Testimonial Management</li>
    <li>Pre-owned Management and Posting</li>
    <li>Newsletter Management and Distribution</li>
    <li>Administrator and Customer Account Management</li>  
  </ul>  
</p>