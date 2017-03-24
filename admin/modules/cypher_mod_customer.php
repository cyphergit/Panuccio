<script type="text/javascript">
        function CancelSubmission() { 
            location.href="http://www.panuccioautos.com.au/admin/index.php?pg=customers"
        }

        function validateForm(cypherCustomerForm) {

            if (document.cypherCustomerForm.txtCEmail.value == "") {
                alert("Please enter Customer's E-mail Address!");
                document.cypherCustomerForm.txtCEmail.focus();
                return false;
            }
            else {
                var x = document.cypherCustomerForm.txtCEmail.value
                var at_pos = x.indexOf("@")
                var dot_pos = x.lastIndexOf(".")
                if (at_pos < 1 || dot_pos < at_pos + 2 || dot_pos + 2 >= x.length) {
                    alert("The E-mail Address you have provided is not valid!");
                    document.cypherCustomerForm.txtCEmail.focus();
                    return false;
                }
            }
            
            if (document.cypherCustomerForm.txtCLastname.value == "") {
                alert("Please enter Customer's Last Name!");
                document.cypherCustomerForm.txtCLastname.focus();
                return false;
            }
            
            if (document.cypherCustomerForm.txtCFirstname.value == "") {
                alert("Please enter Customer's First Name!");
                document.cypherCustomerForm.txtCFirstname.focus();
                return false;
            }                  
                  
            return true;
        }
</script>
<form id="cypherCustomerForm" name="cypherCustomerForm" method="POST" action="common/q_createCustomer.php" onsubmit="return validateForm(this);">
  <p>
    Please provide the Customer's information by filling up the fields if its available. (<em>Required Fields are marked with</em> <span class="requiredField">*</span>)
  </p>
  <table>
    <tr>
      <td><label>E-mail Address:</label></td>
      <td>
        <input type="text" id="txtCEmail" name="txtCEmail" class="cypher-FormField"/>
        <span class="requiredField">*</span>
      </td>
    </tr>
    <tr>
      <td><label>Last Name:</label></td>
      <td>
        <input type="text" id="txtCLastname" name="txtCLastname" class="cypher-FormField"/>
        <span class="requiredField">*</span>
      </td>
    </tr>
    <tr>
      <td><label>First Name:</label></td>
      <td>
        <input type="text" id="txtCFirstname" name="txtCFirstname" class="cypher-FormField"/>
        <span class="requiredField">*</span>
      </td>
    </tr>
    <tr>
      <td><label>Landline No.:</label></td>
      <td><input type="text" id="txtCLandline" name="txtCLandline" class="cypher-FormField"/></td>
    </tr>
    <tr>
      <td><label>Mobile No.:</label></td>
      <td><input type="text" id="txtCMobile" name="txtCMobile" class="cypher-FormField"/></td>
    </tr>
  </table>
  <div class="form_buttons">
    <input id="cypher-Submit" type="Submit" value="Create"/>
    <input id="cypher-Cancel" type="button" value="Cancel" onclick="CancelSubmission();"/>    
  </div>
</form>