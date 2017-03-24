<?php
if($_SESSION['logged'] != 1) {  
  echo "<a href='index.php?pg=login' class='cypherLogs'>Login</a>";
  //echo "<a href='index.php?pg=register' class='cypherLogs'>Register</a>";
} else {
  session_start();
  
  echo "<a href='http://www.panuccioautos.com.au/admin/index.php?pg=accountsettings'>Account Settings</a>";
  echo "<a href='http://www.panuccioautos.com.au/admin/f_logout.php' class='cypherLogs'>Logout</a>";
  //echo "<a href='http://localhost/Panuccio/admin/index.php?pg=accountsettings'>Account Settings</a>";
  //echo "<a href='http://localhost/Panuccio/admin/common/f_logout.php' class='cypherLogs'>Logout</a>";
}
?>