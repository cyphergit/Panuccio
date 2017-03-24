<head>
<script type="text/javascript">       
        function CancelSubmission() { 
            location.href="http://www.panuccioautos.com.au/admin/index.php?pg=newsletter"
        }
        
        function DisabledItem() {
            document.cypherSendNewsletterForm.chkMember.checked = false;
            document.cypherSendNewsletterForm.txtMembersEmail.value = "";

            document.cypherSendNewsletterForm.txtMembersEmail.disabled = true;
            document.cypherSendNewsletterForm.txtMembersEmail.style.backgroundColor = "#ccc";
        }
        
        function SelectSpecific() {
            if (document.cypherSendNewsletterForm.chkMember.checked == true) {
                document.cypherSendNewsletterForm.txtMailingVal.value = "2";  
                document.cypherSendNewsletterForm.chkAll.checked = false;

                document.cypherSendNewsletterForm.txtMembersEmail.disabled = false;
                document.cypherSendNewsletterForm.txtMembersEmail.style.backgroundColor = "#fff";
            
            }

            if (document.cypherSendNewsletterForm.chkMember.checked == false) {
                document.cypherSendNewsletterForm.txtMailingVal.value = "1";
                document.cypherSendNewsletterForm.chkAll.checked = true;

                document.cypherSendNewsletterForm.txtMembersEmail.disabled = true;
                document.cypherSendNewsletterForm.txtMembersEmail.value = "";
                document.cypherSendNewsletterForm.txtMembersEmail.style.backgroundColor = "#ccc";
                
            }            
        }
        
        function SelectAll() {
            if (document.cypherSendNewsletterForm.chkAll.checked == true) {
                document.cypherSendNewsletterForm.txtMailingVal.value = "1";
                document.cypherSendNewsletterForm.chkMember.checked = false;

                document.cypherSendNewsletterForm.txtMembersEmail.disabled = true;
                document.cypherSendNewsletterForm.txtMembersEmail.value = "";
                document.cypherSendNewsletterForm.txtMembersEmail.style.backgroundColor = "#ccc";
               
            }

            if (document.cypherSendNewsletterForm.chkAll.checked == false) {
                document.cypherSendNewsletterForm.txtMailingVal.value = "2";
                document.cypherSendNewsletterForm.chkMember.checked = true;

                document.cypherSendNewsletterForm.txtMembersEmail.disabled = false;
                document.cypherSendNewsletterForm.txtMembersEmail.style.backgroundColor = "#fff";
                
            }
        
        }
        
        function validateForm(cypherSendNewsletterForm) {
            if (document.cypherSendNewsletterForm.selNewsletter.value == "Select a Newsletter") {
                alert("Please select a Newsletter!");
                document.cypherSendNewsletterForm.selNewsletter.focus();
                return false;
            }

            if (document.cypherSendNewsletterForm.chkAll.checked == false) {
                if (cypherSendNewsletterForm.txtMembersEmail.value == "") {
                    alert("Please enter valid member's e-mail address!");
                    document.cypherSendNewsletterForm.txtMembersEmail.focus();
                    return false;
                }
                else {
                    var x = document.cypherSendNewsletterForm.txtMembersEmail.value
                    var at_pos = x.indexOf("@")
                    var dot_pos = x.lastIndexOf(".")
                    if (at_pos < 1 || dot_pos < at_pos + 2 || dot_pos + 2 >= x.length) {
                        alert("The E-mail Address you have provided is not valid!");
                        document.cypherSendNewsletterForm.txtMembersEmail.focus();
                        return false;
                    }
                }
            }

            return true;
        }

        function StartUp() {
            document.cypherSendNewsletterForm.chkAll.checked = true;
            document.cypherSendNewsletterForm.txtMailingVal.value = "1";
            DisabledItem();
        }
        
</script>
</head>
<body onload="StartUp();">
<form id="cypherSendNewsletterForm" name="cypherSendNewsletterForm" method="POST" action="common/f_sendnewsletter.php" onsubmit="return validateForm(this);">
  <!--<form id="cypherSendNewsletterForm" name="cypherSendNewsletterForm" method="POST" action="common/f_sendnewsletter.php">-->
  <table>
    <tr>
      <tr>
        <td>Send to all members:</td>
        <td><input type="checkbox" id="chkAll" name="chkAll" onclick="SelectAll();"/></td>
      </tr>
      <tr>
        <td>Send to a specific member(s):</td>
        <td><input type="checkbox" id="chkMember" name="chkMember" onclick="SelectSpecific();"/></td>
      </tr>
      <tr>
        <td>E-mail Address:</td>
        <td><input type="text" id="txtMembersEmail" name="txtMembersEmail" class="cypher-FormField"/></td>
      </tr>
      <tr>
        <td>Newsletter List:</td>
        <td>
          <?php
              include('../conf.inc.php');
            
              $sql = "SELECT NewsletterName FROM Newsletter WHERE Status = '1' ORDER BY NewsletterID DESC";              
              
              $num_rows = mysql_num_rows($sql);
        
              $rs = mysql_query($sql);
            
              echo "<select id='selNewsletter' name='selNewsletter' style='border: solid 1px Gray; padding: 2px 2px 2px 2px; width: 260px;'>";                          
              echo "<option value='Select a Newsletter'>[Select a Newsletter]</option>";
            
              while($row = mysql_fetch_array($rs))
		          { 
                $newsletterVal = $row[0];
              
		            echo "<option value='$newsletterVal'>$newsletterVal</option>";
			        }
            
              echo "</select>";
          ?>
        </td>
      </tr>
    </tr>
  </table>
  <input type="hidden" id="txtMailingVal" name="txtMailingVal" value=""/>
  <?php
    $m_sql = "SELECT 
                Customers.Email 
              FROM 
                Customers
                , UserLogin 
              WHERE 
                Customers.CustomersID = UserLogin.UserNumber
              AND
                UserLogin.SystemLevel = '3'
              AND
                Customers.NewsletterSubscription = '0'
              AND
                UserLogin.Status = '1'";
        
    $m_num_rows = mysql_num_rows($m_sql);
        
    $m_rs = mysql_query($m_sql);
    
    echo "<input type='hidden' id='txtCMailingList' name='txtCMailingList' value='";
    
    while($m_row = mysql_fetch_array($m_rs))
    { 
      $cList = $m_row[0];
              
      echo "$cList,";
    }

    echo "'/>";
  ?>
  <div class="form_buttons">
    <input id="cypher-Submit" type="Submit" value="Send"/>
    <input id="cypher-Cancel" type="button" value="Cancel" onclick="CancelSubmission();"/>    
  </div>
</form>
</body>