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
                <p>All fields are required.</p>
                <form id="enquiry">  
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
                                    <input type="checkbox" id="chkNewsletter" name="chkNewsletter"/>
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
