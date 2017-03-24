<script type="text/javascript">
        function CancelSubmission() { 
            location.href="http://www.panuccioautos.com.au/admin/index.php?pg=newsletter"
        }

        function validateForm(cypherNewsletterForm) {

            if (document.cypherNewsletterForm.txtNTitle.value == "") {
                alert("Please enter your E-mail Address!");
                document.cypherNewsletterForm.txtNTitle.focus();
                return false;
            }
            
            return true;
        }
</script>
<form id="cypherNewsletterForm" name="cypherNewsletterForm" method="POST" action="common/q_createNewsletter.php" onsubmit="return validateForm(this);">
  <p>
    Please fill-up the required fields below.
  </p>
  <table>
    <tr>
      <td><label>Newsletter Title:</label></td>
      <td><input type="text" id="txtNTitle" name="txtNTitle" class="cypher-FormField"/></td>
    </tr>
  </table>
  <div class="form_buttons">
    <input id="cypher-Submit" type="Submit" value="Add"/>
    <input id="cypher-Cancel" type="button" value="Cancel" onclick="CancelSubmission();"/>
    <input id="reset" type="reset" value="Reset"/>
  </div>
</form>