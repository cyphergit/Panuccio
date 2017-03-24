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
</script>
<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-4">
            <div class="side-content">
                <?php include 'includes/sidelinks.php' ?>
            </div>  
        </div>
        <div class="col-sm-8">
            <div class="content">
                <h2>Enquiry</h2>
                <form id="cypherEnquiryForm" name="cypherEnquiryForm" method="POST" action="../common/f_sendenquiry.php" onsubmit="return validateForm(this);">  
                    <div class="fields">
                        <div class="row">
                            <div class="col-sm-4">First Name:</div>
                            <div class="col-sm-8">
                                <input id="txtFirstname" name="txtFirstname" class="form-control form-field" type="text"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">Last Name:</div>
                            <div class="col-sm-8">
                                <input id="txtLastname" name="txtLastname" class="form-control form-field" type="text"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">Email Address:</div>
                            <div class="col-sm-8">
                                <input id="txtEmail" name="txtEmail" class="form-control form-field" type="text"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">Subject:</div>
                            <div class="col-sm-8">
                                <input id="txtSubject" name="txtSubject" class="form-control form-field" type="text" value="Panuccio Autos - Online Enquiry"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">Message/Comments:</div>
                            <div class="col-sm-8">
                                <textarea id="txtMessages" name="txtMessages" class="form-control form-field"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">reCAPTCHA:</div>
                            <div class="col-sm-4">
                                <div class="g-recaptcha" data-sitekey="6LcPFRIUAAAAAJxC0XRTE9bdIkmi07fhwh55ACUD" id="recaptcha-enquiry"></div>
                            </div>
                        </div>                        
                    </div>
                    <div class="subscribe">
                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8">
                                <label>
                                    <input type="checkbox" id="chkNewsletter" name="chkNewsletter" onclick="NewsletterSubscribe();" value=""/>
                                    Subscribe to our Newsletter for updates and services Panuccio Autos offer.
                                </label>                            
                                <input type="hidden" id="txtNewsletter" name="txtNewsletter" value="0" />
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8">
                                <button type="submit" id="submit" name="submit" class="btn btn-default form-button">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>                
            </div>
        </div>
    </div>
</div>
