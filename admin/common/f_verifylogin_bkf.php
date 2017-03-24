<?php
include('../../conf.inc.php');

$tbl_name="UserLogin"; // Table name

$username=$_POST['txtUsername'];
$password=$_POST['txtPassword'];

$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

$logged = 1;

$sql="SELECT * FROM $tbl_name WHERE UserName='$username' and Password='$password'";
$result=mysql_query($sql);

$count=mysql_num_rows($result);

if($count==1){
session_start();
session_register("username");
session_register("password");
session_register("logged");
header("location:http://www.panuccioautos.com.au/admin/index.php?pg=home");
}
else {
echo "<script type=\"text/javascript\">alert(\"Administrative Account Doesn't Exist. Please try again.\");window.location=\"$site_host/admin/index.php?pg=login\"</script>"; 
}
?>