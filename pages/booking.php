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
                <p>All fields are required.</p>
                <form id="booking">
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
                            <div class="col-sm-4">Contact No.:</div>
                            <div class="col-sm-8">
                                <input id="txtContact" name="txtContact" class="form-control form-field" type="text"/>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-sm-4">Home Address:</div>
                            <div class="col-sm-8">
                                <textarea id="txtLocAddress" name="txtLocAddress" class="form-control form-field"></textarea>
                            </div>
                        </div>                         
                    </div>

                    <h3>Car Details</h3>
                    <div class="fields">
                        <div class="row">
                            <div class="col-sm-4">Car Model:</div>
                            <div class="col-sm-8">
                                <input id="txtCarModel" name="txtCarModel" class="form-control form-field" type="text"/>
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
                                <textarea id="txtServiceRequest" name="txtServiceRequest" class="form-control form-field"></textarea>
                            </div>
                        </div>                         
                    </div>

                    <h3>Service Schedule</h3>
                    <div class="fields">
                        <div class="row">
                            <div class="col-sm-4">Preferred Date:</div>
                            <div class="col-sm-8">
                                <input id="txtPrefDate" name="txtPrefDate" class="form-control form-field" type="text"/>
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
                                    <input type="checkbox" id="chkNewsletter" name="chkNewsletter" value=""/>
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
