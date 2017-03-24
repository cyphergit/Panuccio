<script type="text/javascript">
        function CancelSubmission() { 
            location.href="http://www.panuccioautos.com.au/admin/index.php?pg=useraccount"
        }

        function validateForm(cypherUserAccountForm) {

            if (document.cypherUserAccountForm.txtUsername.value == "") {
                alert("Please enter your E-mail Address!");
                document.cypherUserAccountForm.txtUsername.focus();
                return false;
            }
            else {
                var x = document.cypherUserAccountForm.txtUsername.value
                var at_pos = x.indexOf("@")
                var dot_pos = x.lastIndexOf(".")
                if (at_pos < 1 || dot_pos < at_pos + 2 || dot_pos + 2 >= x.length) {
                    alert("The E-mail Address you have provided is not valid!");
                    document.cypherUserAccountForm.txtUsername.focus();
                    return false;
                }
            }
            
            if (document.cypherUserAccountForm.txtPassword.value == "") {
                alert("Please provide your Password!");
                document.cypherUserAccountForm.txtPassword.focus();
                return false;
            }
            else {
                var x = document.cypherUserAccountForm.txtPassword.value
                var char_length = 4
                if (x.length < char_length) {
                    alert("Password must be minimum of 4 characters!");
                    document.cypherUserAccountForm.txtPassword.focus();
                    return false;
                }
            }                  
            
            if (document.cypherUserAccountForm.txtConfirmPass.value == "") {
                alert("Please provide your Password for confirmation!");
                document.cypherUserAccountForm.txtConfirmPass.focus();
                return false;
            }
            else {
                var x = document.cypherUserAccountForm.txtPassword.value
                var y = document.cypherUserAccountForm.txtConfirmPass.value
                if (x != y) {
                    alert("Password did not match! Please check your password and try again.");
                    document.cypherUserAccountForm.txtConfirmPass.focus();
                    return false;
                }
            }
                  
            return true;
        }
</script>
<form id="cypherUserAccountForm" name="cypherUserAccountForm" method="POST" action="common/q_createUser.php" onsubmit="return validateForm(this);">
  <p>
    Please enter E-mail Address as User Name and a Password to create an Administrative account.
  </p>
  <table>
    <tr>
      <td><label>E-mail Address:</label></td>
      <td><input type="text" id="txtUsername" name="txtUsername" class="cypher-FormField"/></td>
    </tr>
    <tr>
      <td>
        <label>Password:</label>
      </td>
      <td>
        <input type="password" id="txtPassword" name="txtPassword" class="cypher-FormField"/>
      </td>
    </tr>
    <tr>
      <td>
        <label>Confirm Password:</label>
      </td>
      <td>
        <input type="password" id="txtConfirmPass" name="txtConfirmPass" class="cypher-FormField"/>
      </td>
    </tr>
  </table>
  <div class="form_buttons">
    <input id="cypher-Submit" type="Submit" value="Create"/>
    <input id="cypher-Cancel" type="button" value="Cancel" onclick="CancelSubmission();"/>
    <input id="reset" type="reset" value="Reset"/>
  </div>
</form>