<script type="text/javascript">
    
    $(function () {
        $("#b_txtPrefDate").datepicker({
            minDate: new Date()
        });
    });

    function validateForm(cypherBookingForm) {

        if (document.cypherBookingForm.b_txtFirstname.value == "") {
            alert("Please enter your First Name!");
            document.cypherBookingForm.b_txtFirstname.focus();
            return false;
        }

        if (document.cypherBookingForm.b_txtLastname.value == "") {
            alert("Please enter your Last Name!");
            document.cypherBookingForm.b_txtLastname.focus();
            return false;
        }

        if (document.cypherBookingForm.b_txtEmail.value == "") {
            alert("Please enter your E-mail Address!");
            document.cypherBookingForm.b_txtEmail.focus();
            return false;
        }
        else {
            var x = document.cypherBookingForm.b_txtEmail.value;
            var at_pos = x.indexOf("@");
            var dot_pos = x.lastIndexOf(".");
            if (at_pos < 1 || dot_pos < at_pos + 2 || dot_pos + 2 >= x.length) {
                alert("The E-mail Address you have provided is not valid!");
                document.cypherBookingForm.b_txtEmail.focus();
                return false;
            }
        }

        if (document.cypherBookingForm.b_txtContact.value == "") {
            alert("Please enter your Contact Number!");
            document.cypherBookingForm.b_txtContact.focus();
            return false;
        }

        if (document.cypherBookingForm.b_txtLocAddress.value == "") {
            alert("Please enter your Address!");
            document.cypherBookingForm.b_txtLocAddress.focus();
            return false;
        }

        if (document.cypherBookingForm.b_txtCarModel.value == "") {
            alert("Please enter the Car Model!");
            document.cypherBookingForm.b_txtCarModel.focus();
            return false;
        }

        if (document.cypherBookingForm.selTransmission.value == "[Select Transmission]") {
            alert("Please select Car Transmission!");
            document.cypherBookingForm.selTransmission.focus();
            return false;
        }

        if (document.cypherBookingForm.selFuelType.value == "[Select Fuel Type]") {
            alert("Please select Fuel Type!");
            document.cypherBookingForm.selTransmission.focus();
            return false;
        }

        if (document.cypherBookingForm.b_txtServiceRequest.value == "") {
            alert("Please enter your Car Service Request!");
            document.cypherBookingForm.b_txtServiceRequest.focus();
            return false;
        }

        if (document.cypherBookingForm.b_txtPrefDate.value == "") {
            alert("Please select your preferred service schedule!");
            document.cypherBookingForm.b_txtPrefDate.focus();
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
        document.cypherBookingForm.b_txtFirstname.value = "";
        document.cypherBookingForm.b_txtLastname.value = "";
        document.cypherBookingForm.b_txtEmail.value = "";
        document.cypherBookingForm.b_txtContact.value = "";
        document.cypherBookingForm.b_txtLocAddress.value = "";
        document.cypherBookingForm.b_txtCarModel.value = "";
        document.cypherBookingForm.selTransmission.value = "[Select Transmission]";
        document.cypherBookingForm.selFuelType.value = "[Select Fuel Type]";
        document.cypherBookingForm.b_txtServiceRequest.value = "";
        document.cypherBookingForm.b_txtPrefDate.value = "";
        document.cypherBookingForm.chkNewsletter.checked = false;
    }

    function NewsletterSubscribe() {
        if (document.cypherBookingForm.chkNewsletter.checked == false) {
            document.cypherBookingForm.txtNewsletter.value = "0";
        } else {
            document.cypherBookingForm.txtNewsletter.value = "1";
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
                <h2>Booking</h2>
                <form id="cypherBookingForm" name="cypherBookingForm" method="post" action="../common/f_sendbooking.php" onsubmit="return validateForm(this);">
                    <div class="fields">
                        <div class="row">
                            <div class="col-sm-4">First Name:</div>
                            <div class="col-sm-8">
                                <input id="b_txtFirstname" name="b_txtFirstname" class="form-control form-field" type="text"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">Last Name:</div>
                            <div class="col-sm-8">
                                <input id="b_txtLastname" name="b_txtLastname" class="form-control form-field" type="text"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">Email Address:</div>
                            <div class="col-sm-8">
                                <input id="b_txtEmail" name="b_txtEmail" class="form-control form-field" type="text"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">Contact No.:</div>
                            <div class="col-sm-8">
                                <input id="b_txtContact" name="b_txtContact" class="form-control form-field" type="text"/>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-sm-4">Home Address:</div>
                            <div class="col-sm-8">
                                <textarea id="b_txtLocAddress" name="b_txtLocAddress" class="form-control form-field"></textarea>
                            </div>
                        </div>                         
                    </div>

                    <h3>Car Details</h3>
                    <div class="fields">
                        <div class="row">
                            <div class="col-sm-4">Car Model:</div>
                            <div class="col-sm-8">
                                <input id="b_txtCarModel" name="b_txtCarModel" class="form-control form-field" type="text"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">Transmission:</div>
                            <div class="col-sm-8">
                                <select id="selTransmission" name="selTransmission" class="form-control form-field">
                                    <option value="[Select Transmission]" selected="yes">[Select Transmission]</option>
                                    <option value="Automatic">Automatic</option>
                                    <option value="Manual">Manual</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">Fuel Type:</div>
                            <div class="col-sm-8">
                                <select id="selFuelType" name="selFuelType" class="form-control form-field">
                                    <option value="[Select Fuel Type]" selected="yes">[Select Fuel Type]</option>
                                    <option value="Unleaded">Unleaded</option>
                                    <option value="Diesel">Diesel</option>
                                    <option value="LPG">LPG</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <h3>Service Request</h3>
                    <div class="fields">
                        <div class="row">
                            <div class="col-sm-4">(Eg. Chassis Upgrade)</div>
                            <div class="col-sm-8">
                                <textarea id="b_txtServiceRequest" name="b_txtServiceRequest" class="form-control form-field"></textarea>
                            </div>
                        </div>                         
                    </div>

                    <h3>Service Schedule</h3>
                    <div class="fields">
                        <div class="row">
                            <div class="col-sm-4">Preferred Date:</div>
                            <div class="col-sm-8">
                                <input id="b_txtPrefDate" name="b_txtPrefDate" class="form-control form-field" type="text"/>
                            </div>
                        </div>
                        <hr>
                        <!--reCaptcha-->
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
