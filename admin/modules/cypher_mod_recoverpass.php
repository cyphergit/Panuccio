<script type="text/javascript">
        function CancelSubmit() { 
            location.href="http://www.panuccioautos.com.au/"
        }

        function validateForm(cypherRecoverPassForm) {

            if (document.cypherRecoverPassForm.txtUsername.value == "") {
                alert("Please enter your E-mail Address!");
                document.cypherRecoverPassForm.txtUsername.focus();
                return false;
            }
            else {
                var x = document.cypherRecoverPassForm.txtUsername.value
                var at_pos = x.indexOf("@")
                var dot_pos = x.lastIndexOf(".")
                if (at_pos < 1 || dot_pos < at_pos + 2 || dot_pos + 2 >= x.length) {
                    alert("The E-mail Address you have provided is not valid!");
                    document.cypherRecoverPassForm.txtUsername.focus();
                    return false;
                }
            }
            
            return true;
        }
</script>
<form id="cypherRecoverPassForm" name="cypherRecoverPassForm" method="POST" action="common/f_retrievepass.php" onsubmit="return validateForm(this);">
  <p>
    Please provide your e-mail address to retrieve your password.
  </p>
  <table>
    <tr>
      <td>
        <label>E-mail Address:</label>
      </td>
      <td>
        <input type="text" id="txtUsername" name="txtUsername" class="cypher-LoginField"/>
      </td>
    </tr>
  </table>
  <div class="log_buttons">
    <input id="cypher-Submit" type="Submit" value="Retrieve"/>
    <input id="reset" type="reset" value="Reset"/>
  </div>
</form>