<link href="DialogForm.css" rel="Stylesheet" type="text/css" />
<script type="text/javascript">
    function ConfirmationMsg() {
    
			  alert("User Account has been updated.");
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
    
			  document.UpdateForm.submit();
        ConfirmationMsg();
          
    }
    
</script>
<title>User Accounts</title>
<?php
  include("../../conf.inc.php");
	$tempID = $_COOKIE['IDValue'];
  $process = $_COOKIE['Process'];
  
  $q = "SELECT 
          CONCAT(Customers.Firstname,' ',Customers.Lastname) as FullName
        , Customers.Email
        , UserLevels.SystemLevel
        , Customers.MobileNum
        , Customers.LandlineNum
        , Customers.Firstname
        , Customers.Lastname
        FROM 
          Customers, UserLevels, UserLogin
        WHERE 
          CustomersID = '$tempID'
        AND
          UserLogin.UserNumber = CustomersID
        AND
          UserLogin.SystemLevel = UserLevels.ID";
          
  $rs = mysql_query($q);
  $row = mysql_fetch_array($rs);
 
  $UserLevel = $row[2];
  $UserEmail = $row[1];
  $UserFirstname = $row[5];
  $UserLastname = $row[6];

  if ($row[0] == null){
    $Fullname = "n/a";
  }else{
    $Fullname = $row[0];
  }
  
  if ($row[3] == null){
    $UserMobile = "n/a";
  }else{
    $UserMobile = $row[3];
  }
  
  if ($row[4] == null){
    $UserLandLine = "n/a";
  }else{
    $UserLandLine = $row[4];
  }
  
  if ($process == "View") {
  
    echo "<div class='DialogForm'>";
	  echo "<h4>User Account Details</h4>";
    echo "<div class='DialogFormContent'>";
    echo "<div><span class='itemfield'>Full Name:</span>  <em>$Fullname</em></div>";
	  echo "<br/>";
    echo "<div><span class='itemfield'>User Level:</span>  <em>$UserLevel</em></div>";
	  echo "<br/>";
    echo "<div><span class='itemfield'>E-mail Address:</span>  <em>$UserEmail</em></div>";
	  echo "<br/>";
    echo "<div><span class='itemfield'>Mobile No#:</span>  <em>$UserMobile</em></div>";
	  echo "<br/>";
    echo "<div><span class='itemfield'>Landline No#:</span>  <em>$UserLandLine</em></div>";
	  echo "<br/>";
    echo "</div>";
    echo "</div>";
    echo "<div class='DialogFormClose'><a href='#' onclick=\"ClosePopUp();\">Close Window</a></div>";  
  
  } else {
  
      echo "<form id='UpdateForm' name='UpdateForm' method='POST' action='../common/q_updateUser.php'>";
	    echo "<div class='DialogForm'>";
	    echo "<h4>Update User Details</h4>";
      echo "<div class='DialogFormContent'>";
      echo "<table>";
      echo "<tr>";
      echo "<td class='itemfield'>First Name:</td>";
      echo "<td><input type='text' id='txtUFirstname' name='txtUFirstname' class='DialogEntry' value='$UserFirstname'/></td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td class='itemfield'>Last Name:</td>";
      echo "<td><input type='text' id='txtULastname' name='txtULastname' class='DialogEntry' value='$UserLastname'/></td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td class='itemfield'>Mobile No#:</td>";
      echo "<td><input type='text' id='txtUMobile' name='txtUMobile' class='DialogEntry' value='$UserMobile'/></td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td class='itemfield'>Landline No#:</td>";
      echo "<td><input type='text' id='txtULandline' name='txtULandline' class='DialogEntry' value='$UserLandLine'/></td>";
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