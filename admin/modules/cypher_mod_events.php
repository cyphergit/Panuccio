<script type="text/javascript">
        $(function() {
              $("#txtEDate").datepicker({
                  minDate: new Date()
              });
	      });
        
        function CancelSubmission() { 
            location.href="http://www.panuccioautos.com.au/admin/index.php?pg=events"
        }

        function validateForm(cypherEventForm) {

            if (document.cypherEventForm.txtETitle.value == "") {
                alert("Please enter an Event title!");
                document.cypherEventForm.txtETitle.focus();
                return false;
            }
            
            if (document.cypherEventForm.txtEDesc.value == "") {
                alert("Please enter an Event description!");
                document.cypherEventForm.txtEDesc.focus();
                return false;
            }
            
            if (document.cypherEventForm.txtEVenue.value == "") {
                alert("Please enter venue for the Event!");
                document.cypherEventForm.txtEVenue.focus();
                return false;
            }
            
            if (document.cypherEventForm.txtEDate.value == "") {
                alert("Please enter date for the Event!");
                document.cypherEventForm.txtEDate.focus();
                return false;
            }
            
            return true;
        }
        
</script>
<form id="cypherEventForm" name="cypherEventForm" method="POST" action="common/q_createEvent.php" onsubmit="return validateForm(this);">
  <p>
    Please fill-up the required fields below.
  </p>
  <table>
    <tr>
      <td><label>Event Title:</label></td>
      <td><input type="text" id="txtETitle" name="txtETitle" class="cypher-FormField"/></td>
    </tr>
    <tr>
      <td><label>Event Description:</label></td>
      <td>
        <textarea id="txtEDesc" name="txtEDesc" col="10" style="height: 80px;" class="cypher-FormField"></textarea>
      </td>
    </tr>
    <tr>
      <td><label>Event Venue:</label></td>
      <td><input type="text" id="txtEVenue" name="txtEVenue" class="cypher-FormField"/></td>
    </tr>
    <tr>
      <td><label>Event Date:</label></td>
      <td><input type="text" id="txtEDate" name="txtEDate" class="cypher-FormField"/></td>
    </tr>
  </table>
  <div class="form_buttons">
    <input id="cypher-Submit" type="Submit" value="Add"/>
    <input id="cypher-Cancel" type="button" value="Cancel" onclick="CancelSubmission();"/>
    <input id="reset" type="reset" value="Reset"/>
  </div>
</form>