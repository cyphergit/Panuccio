<?php
session_start();
$_SESSION['logged'] = 0;
session_destroy();
echo "<script type=\"text/javascript\">window.location=\"http://www.panuccioautos.com.au/admin\"</script>";
?>