<link href="DialogForm.css" rel="Stylesheet" type="text/css" />
<link href="http://www.panuccioautos.com.au/scripts/themes/base/jquery.ui.all.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="http://www.panuccioautos.com.au/scripts/jquery-1.4.4.js"></script>
<script type="text/javascript" src="http://www.panuccioautos.com.au/scripts/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="http://www.panuccioautos.com.au/scripts/jquery-ui-1.8.7.custom.min.js"></script>

<script type="text/javascript" src="http://www.panuccioautos.com.au/scripts/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="http://www.panuccioautos.com.au/scripts/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="http://www.panuccioautos.com.au/scripts/ui/jquery.ui.datepicker.js"></script>

<script type="text/javascript">
    $(function() {
        $("#txtEDate").datepicker({
            minDate: new Date()
        });
	});
  
    function ConfirmationMsg() {
    
			  alert("An event has been updated.");
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
<title>Events</title>
<?php
	include("../../conf.inc.php");
	$tempID = $_COOKIE['IDValue'];
  $process = $_COOKIE['Process'];
  
  $q = "SELECT 
          EventTitle
        , EventDesc
        , EventDate
        , EventVenue        
        FROM
          Events
        WHERE
          EventID = '$tempID'";
          
  $rs = mysql_query($q);
  $row = mysql_fetch_array($rs);
      
  $eTitle = $row[0];
  $vDetails = $row[1];
  $uDetails = br2space($row[1]);
  $eDate = $row[2];
  $eVenue = $row[3];
  
  if ($process == "View") {

	    echo "<div class='DialogForm'>";
	    echo "<h4>Event Details</h4>";
      echo "<div class='DialogFormContent'>";
	    echo "<div><span class='itemfield'>Title:</span>  <em>$eTitle</em></div>";
	    echo "<br/>";
      echo "<div><span class='itemfield'>Venue:</span>  <em>$eVenue</em></div>";
	    echo "<br/>";
      echo "<div><span class='itemfield'>Date:</span>  <em>$eDate</em></div>";
	    echo "<br/>";
      echo "<div><span class='itemfield'>Details:</span></div>";
	    echo "<br/>";
      echo "<div><em>$vDetails</em></div>";
	    echo "<br/>";
      echo "</div>";
      echo "</div>";
      echo "<div class='DialogFormClose'><a href='#' onclick=\"ClosePopUp();\">Close Window</a></div>";
  
  } else {
  
      echo "<form id='UpdateForm' name='UpdateForm' method='POST' action='../common/q_updateEvent.php'>";
	    echo "<div class='DialogForm'>";
	    echo "<h4>Update Event</h4>";
      echo "<div class='DialogFormContent'>";
      echo "<table>";
      echo "<tr>";
      echo "<td class='itemfield'>Title</td>";
      echo "<td><input type='text' id='txtETitle' name='txtETitle' class='DialogEntry' value='$eTitle'/></td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td class='itemfield'>Venue:</td>";
      echo "<td><input type='text' id='txtEVenue' name='txtEVenue' class='DialogEntry' value='$eVenue'/></td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td class='itemfield'>Date:</td>";
      echo "<td><input type='text' id='txtEDate' name='txtEDate' class='DialogEntry' value='$eDate'/></td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td class='itemfield'>Details:</td>";
      echo "<td><textarea id='txtEDesc' name='txtEDesc' style='width: 330px; border: solid 1px #ccc;'>$uDetails</textarea></td>";
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