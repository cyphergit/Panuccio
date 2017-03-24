<?php
include('../conf.inc.php');
include('includes/cypher_functions.php');

$tbl_name="UserLogin";

$username = $_POST['txtUsername'];
$password = $_POST['txtPassword'];

$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

$sql="SELECT * FROM $tbl_name WHERE UserName='$username' and Password='$password'";
$result=mysql_query($sql);

$count=mysql_num_rows($result);

if($count==1){
session_start();
$_SESSION['logged'] = 1;
$_SESSION['username'] = $username;

header("location:http://www.panuccioautos.com.au/admin/index.php?pg=home");
//header("location:http://localhost/Panuccio/admin/index.php?pg=home");
}
else {
echo "<script type=\"text/javascript\">alert(\"Administrative Account Doesn't Exist. Please try again.\");window.location=\"http://www.panuccioautos.com.au/admin/index.php?pg=login\"</script>"; 
}
?>