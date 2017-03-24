<script type="text/javascript">
        function CancelSubmission() { 
            location.href="http://www.panuccioautos.com.au/admin/index.php?pg=pre_owned"
        }

        function validateForm(cypherPreownedForm) {

            if (document.cypherPreownedForm.txtPItem.value == "") {
                alert("Please enter item name!");
                document.cypherPreownedForm.txtPItem.focus();
                return false;
            }
            
            if (document.cypherPreownedForm.txtPBrand.value == "") {
                alert("Please enter item brand!");
                document.cypherPreownedForm.txtPBrand.focus();
                return false;
            }
            
            if (document.cypherPreownedForm.txtPModel.value == "") {
                alert("Please enter item model!");
                document.cypherPreownedForm.txtPModel.focus();
                return false;
            }
            
            if (document.cypherPreownedForm.txtPEngine.value == "") {
                alert("Please enter engine!");
                document.cypherPreownedForm.txtPEngine.focus();
                return false;
            }
            
            if (document.cypherPreownedForm.txtPTransmission.value == "") {
                alert("Please enter transmission!");
                document.cypherPreownedForm.txtPTransmission.focus();
                return false;
            }
            
            if (document.cypherPreownedForm.txtPDesc.value == "") {
                alert("Please enter transmission!");
                document.cypherPreownedForm.txtPDesc.focus();
                return false;
            }
            
            if (document.cypherPreownedForm.txtPPrice.value == "") {
                alert("Please enter item price!");
                document.cypherPreownedForm.txtPPrice.focus();
                return false;
            }
            
            return true;
        }

</script>
<form id="cypherPreownedForm" name="cypherPreownedForm" method="POST" action="common/q_createPreowned.php" onsubmit="return validateForm(this);">
  <p>
    Please fill-up the required fields below.
  </p>
  <table>
    <tr>
      <td><label>Item Name:</label></td>
      <td><input type="text" id="txtPItem" name="txtPItem" class="cypher-FormField"/></td>
    </tr>
    <tr>
      <td><label>Brand:</label></td>
      <td><input type="text" id="txtPBrand" name="txtPBrand" class="cypher-FormField"/></td>
    </tr>
    <tr>
      <td><label>Model:</label></td>
      <td><input type="text" id="txtPModel" name="txtPModel" class="cypher-FormField"/></td>
    </tr>
    <tr>
      <td><label>Engine:</label></td>
      <td><input type="text" id="txtPEngine" name="txtPEngine" class="cypher-FormField"/></td>
    </tr>
    <tr>
      <td><label>Transmission:</label></td>
      <!--<td><input type="text" id="txtPTransmission" name="txtPTransmission" class="cypher-FormField"/></td>-->
      <td>
        <select id="txtPTransmission" name="txtPTransmission" class="cypher-FormField" style="padding-top: 2px; padding-bottom: 2px;">
          <option value="[Select Transmission]" selected="yes">[Select Transmission]</option>
          <option value="Automatic">Automatic</option>
          <option value="Manual">Manual</option>
        </select>
      </td>
    </tr>
    <tr>
      <td><label>Description:</label></td>
      <td>
        <textarea style="height: 150px; width: 350px;" cols="16" id="txtPDesc" name="txtPDesc" class="cypher-FormField"></textarea>
      </td>
    </tr>
    <tr>
      <td><label>Price:</label></td>
      <td><input type="text" id="txtPPrice" name="txtPPrice" class="cypher-FormField"/></td>
    </tr>    
  </table>
  <div class="form_buttons">
    <input id="cypher-Submit" type="Submit" value="Add"/>
    <input id="cypher-Cancel" type="button" value="Cancel" onclick="CancelSubmission();"/>
    <input id="reset" type="reset" value="Reset"/>
  </div>
</form>