<script type="text/javascript">
        function validateForm(cypherEnquiryForm) 
        {
            if (document.cypherEnquiryForm.txtFirstname.value == "") {
                  alert("Please enter your First Name!");
                  document.cypherEnquiryForm.txtFirstname.focus();
                  return false;
            }
        
            if (document.cypherEnquiryForm.txtLastname.value == "") {
                  alert("Please enter your Last Name!");
                  document.cypherEnquiryForm.txtLastname.focus();
                  return false;
            }
        
            if (document.cypherEnquiryForm.txtEmail.value == "") {
                alert("Please enter your E-mail Address!");
                document.cypherEnquiryForm.txtEmail.focus();
                return false;
            } else {
                var x = document.cypherEnquiryForm.txtEmail.value;
                var at_pos = x.indexOf("@");
                var dot_pos = x.lastIndexOf(".");
                if (at_pos < 1 || dot_pos < at_pos + 2 || dot_pos + 2 >= x.length) {
                    alert("The E-mail Address you have provided is not valid!");
                    document.cypherEnquiryForm.txtEmail.focus();
                    return false;
                }
            }

            if (document.cypherEnquiryForm.txtSubject.value == "") {
                alert("Please enter a Subject!");
                document.cypherEnquiryForm.txtSubject.focus();
                return false;
            }

            if (document.cypherEnquiryForm.txtMessages.value == "") {
                alert("Please enter your Message or Enquiry!");
                document.cypherEnquiryForm.txtMessages.focus();
                return false;
            }

            var captcha_response = grecaptcha.getResponse();
            if (captcha_response.length == 0)
            {                
                alert("Recaptcha validation error, please try it again!");
                return false; // Captcha is not Passed
            }            
            return true;
        }
        
        function ClearFieldValues() {
        
            document.cypherEnquiryForm.txtFirstname.value = "";
            document.cypherEnquiryForm.txtLastname.value = "";
            document.cypherEnquiryForm.txtEmail.value = "";
            //document.cypherEnquiryForm.txtSubject.value = "";
            document.cypherEnquiryForm.txtMessages.value = "";
            document.cypherEnquiryForm.chkNewsletter.checked = false;
        }                  
          
        function NewsletterSubscribe() {
            if (document.cypherEnquiryForm.chkNewsletter.checked == false) {
                document.cypherEnquiryForm.txtNewsletter.value = "0";
            } else {
                document.cypherEnquiryForm.txtNewsletter.value = "1";
            }
        }                  
                  
        function CloseEnquiryForm() {        
            ClearFieldValues();
            $.fancybox.close();                        
        }
        
        function CancelSubmitEnquiryForm() {        
            ClearFieldValues();
            $.fancybox.close();                
        }     
        
</script>
<form id="cypherEnquiryForm" name="cypherEnquiryForm" method="POST" action="common/f_sendenquiry.php" onsubmit="return validateForm(this);">  
  <table style="margin-bottom: 8px;">
    <tr>
      <td class="col-label">First Name:</td>
      <td>
        <input id="txtFirstname" name="txtFirstname" class="form-field" type="text"/>
      </td>
    </tr>
    <tr>
      <td class="col-label">Last Name:</td>
      <td>
        <input id="txtLastname" name="txtLastname" class="form-field" type="text"/>
      </td>      
    </tr>
    <tr>
      <td class="col-label">Email Address:</td>
      <td>
        <input id="txtEmail" name="txtEmail" class="form-field" type="text"/>
      </td>      
    </tr>
    <tr>
      <td class="col-label">Subject:</td>
      <td>
        <input id="txtSubject" name="txtSubject" class="form-field" type="text" value="Panuccio Autos - Online Enquiry"/>
      </td>
    </tr>
    <tr>
      <td class="col-label">Message/Comments:</td>
      <td>
        <textarea id="txtMessages" name="txtMessages" class="form-field" col="10" style="height: 50px;"></textarea>
      </td>
    </tr>
    <!--reCaptcha-->
<!--    <tr>
        <td class="col-label">reCAPTCHA</td>
        <td>
            <div class="g-recaptcha" data-sitekey="6LcPFRIUAAAAAJxC0XRTE9bdIkmi07fhwh55ACUD" id="recaptcha-enquiry"></div>
        </td>
    </tr>-->
  </table>
  <div style="border-top: dotted 1px gray; margin-top: 8px; color: #fff; font-style: italic;">
    <input type="checkbox" id="chkNewsletter" name="chkNewsletter" onclick="NewsletterSubscribe();"/>
    <span>Subscribe to our Newsletter for updates and services Panuccio Autos offer.</span>
  </div>
  <input type="hidden" id="txtNewsletter" name="txtNewsletter" value="0" />
  <div class="crudForm">
    <input type="submit" id="submit" name="submit" class="enquiryButton" value=""/>
    <input type="button" id="cancel" name="cancel" class="cancelButton" value="" onclick="CancelSubmitEnquiryForm();"/>
    <input type="button" id="close" name="close" class="closeButton" value="" onclick="CloseEnquiryForm();"/>
  </div>
</form>