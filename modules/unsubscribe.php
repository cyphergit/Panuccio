<script type="text/javascript">
        function validateUnsubscribeForm(cypherUnsubscribeForm) 
        {
            if (document.cypherUnsubscribeForm.txtUnsubscribe.value == "") {
                  alert("Please enter your Email Address!");
                  document.cypherUnsubscribeForm.txtUnsubscribe.focus();
                  return false;
            }

            return true;
        }  
        
</script>
<h3>Provide your email below:</h3>
<form id="cypherUnsubscribeForm" name="cypherUnsubscribeForm" method="POST" action="common/f_unsubscribe.php" onsubmit="return validateUnsubscribeForm(this);">
    <div class="fields unsubscribe-form-field">
        <div class="row">
            <div class="col-sm-4">E-mail Address:</div>
            <div class="col-sm-8">
                <input type="text" id="txtUnsubscribe" name="txtUnsubscribe" class="form-control"/>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">reCAPTCHA:</div>
            <div class="col-sm-4">
                <div class="g-recaptcha" data-sitekey="6LcPFRIUAAAAAJxC0XRTE9bdIkmi07fhwh55ACUD" id="recaptcha-enquiry"></div>
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