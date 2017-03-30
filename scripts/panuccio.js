$(function () {    
    //Initiate website banner
    var init_banner = function() {
        setInterval("slideSwitch()", 7200);
    };
    init_banner();
    
    //Initiate website active page
    var init_activepage = function() {
        var activePage = $('.active-page');
        
        if (activePage.length !== 0) {
            $.each($('#navbar ul li'), function() {
                var alt = $(this).attr('alt');
                
                if (activePage.text() === alt) {
                    $(this).addClass('active');
                    
                } else if (activePage.text() === "" && alt === 'home') {
                    $(this).addClass('active');

                } else if (activePage.text() === "booking" || activePage.text() === "enquiry") {
                    if (alt == 'contact') { $(this).addClass('active'); }
                    
                } else {
                    $(this).removeClass('active');
                }
            });           
        }
    };
    init_activepage();
    
    //Initiate forms
    var submit = $('#submit');
    var forms = {
        unsubscribe: $('#unsubscribe'),
        booking: $('#booking'),
        enquiry: $('#enquiry')
    };    
    
    ////Unsubscribe
    var loadUnsubscribe = function() {
        var fields = { 
            email: $('#email'),
            recaptcha: function() { return grecaptcha.getResponse(); }
        };
        
        submit.on('click', function() {
            var collection = { 
                email: fields.email.val(),
                form: "unsubscribe"
            };
            
            if (validateField(fields.email) === false) {
                alert("Please provide your e-mail address!");
                fields.email.focus();
                return false;
                
            } else if (isEmail(fields.email) === false) {
                alert("Invalid e-mail address! Try again!");
                fields.email.focus();
                return false;
            }

            if (recaptchaValidation(fields.recaptcha()) === false) {
                return false;
            }
            
            processData(collection, "common/formPost.php");
            resetForm( forms.unsubscribe, false );
        });
    };    
    if (forms.unsubscribe.length !== 0) { loadUnsubscribe(); }

    ////Enquiry
    var loadEnquiry = function() {
        var fields = {
            fname: $('#txtFirstname'),
            lname: $('#txtLastname'),
            email: $('#txtEmail'),
            subject: $('#txtSubject'),
            message: $('#txtMessages'),
            subscribe: $('#txtNewsletter'),
            recaptcha: function() { return grecaptcha.getResponse(); }
        };

        submit.on('click', function() {
            var collection = {                 
                fname: fields.fname.val(),
                lname: fields.lname.val(),
                email: fields.email.val(),
                subject: fields.subject.val(),
                message: fields.message.val(),
                subscribe: fields.subscribe.val(),
                form: "enquiry"
            };
            
            if (validateField(fields.fname) == false) {
                alert("Please provide your first name!");
                fields.fname.focus();
                return false;
                
            } else if (charLength(collection.fname, 2, 25) === false) {
                fields.fname.focus();
                return false;
            }
            
            if (validateField(fields.lname) === false) {
                alert("Please provide your last name!");
                fields.lname.focus();
                return false;
                
            } else if (charLength(collection.lname, 2, 25) === false) {
                fields.fname.focus();
                return false;
            }          
            
            if (validateField(fields.email) === false) {
                alert("Please provide your e-mail address!");
                fields.email.focus();
                return false;
                
            } else if (isEmail(fields.email) === false) {
                alert("Invalid e-mail address! Try again!");
                fields.email.focus();
                return false;
            }

            if (validateField(fields.subject) === false) {
                alert("Please provide a subject!");
                fields.subject.focus();
                return false;                
            }
            
            if (validateField(fields.message) === false) {
                alert("Please provide a message!");
                fields.message.focus();
                return false;    
                
            } else if (charLength(collection.message, 2, 300) === false) {
                fields.message.focus();
                return false;
            }             

            if (recaptchaValidation(fields.recaptcha()) === false) {
                return false;
            }
            
            processData(collection, "common/formPost.php");
            //resetForm( forms.enquiry, false );
        });
    };
    if (forms.enquiry.length !== 0 ) { loadEnquiry(); }    
    
    ////Booking
    var loadBooking = function() {
        var fields = {
            fname: $('#txtFirstname'),
            lname: $('#txtLastname'),
            email: $('#txtEmail'),
            contact: $('#txtContact'),
            address: $('#txtLocAddress'),
            carModel: $('#txtCarModel'),
            transmission: $('#selTransmission'),
            fuelType: $('#selFuelType'),
            serviceRequest: $('#txtServiceRequest'),
            preferredDate: $('#txtPrefDate'),
            subscribe: $('#txtNewsletter'),
            recaptcha: function() { return grecaptcha.getResponse(); }
        };
        
        fields.preferredDate.datepicker({
            minDate: new Date()
        });
        
        submit.on('click', function() {
            var collection = {                 
                fname: fields.fname.val(),
                lname: fields.lname.val(),
                email: fields.email.val(),
                contact: fields.contact.val(),
                address: fields.address.val(),
                carModel: fields.carModel.val(),
                transmission: fields.transmission.val(),
                fuelType: fields.fuelType.val(),
                serviceRequest: fields.serviceRequest.val(),
                preferredDate: fields.preferredDate.val(),
                subscribe: fields.subscribe.val(),
                form: "booking"
            };
            
            if (validateField(fields.fname) == false) {
                alert("Please provide your first name!");
                fields.fname.focus();
                return false;
                
            } else if (charLength(collection.fname, 2, 25) === false) {
                fields.fname.focus();
                return false;
            }
            
            if (validateField(fields.lname) === false) {
                alert("Please provide your last name!");
                fields.lname.focus();
                return false;
                
            } else if (charLength(collection.lname, 2, 25) === false) {
                fields.fname.focus();
                return false;
            }          
            
            if (validateField(fields.email) === false) {
                alert("Please provide your e-mail address!");
                fields.email.focus();
                return false;
                
            } else if (isEmail(fields.email) === false) {
                alert("Invalid e-mail address! Try again!");
                fields.email.focus();
                return false;
            }

            if (validateField(fields.contact) === false) {
                alert("Please provide a contact number!");
                fields.contact.focus();
                return false;                
            }
            
            if (validateField(fields.address) === false) {
                alert("Please provide an address!");
                fields.address.focus();
                return false;                    
            }
            
            if (validateField(fields.carModel) === false) {
                alert("Please enter the car model!");
                fields.carModel.focus();
                return false;                    
            }            

            if (validateField(fields.transmission) === false) {
                alert("Please select the car transmission!");
                fields.transmission.focus();
                return false;                    
            }
            
            if (validateField(fields.fuelType) === false) {
                alert("Please select a fuel type!");
                fields.fuelType.focus();
                return false;                    
            }
            
            if (validateField(fields.serviceRequest) === false) {
                alert("Please select your car service request!");
                fields.serviceRequest.focus();
                return false;                    
            }
            
            if (validateField(fields.preferredDate) === false) {
                alert("Please select preferred service schedule!");
                fields.preferredDate.focus();
                return false;                    
            }            

            if (recaptchaValidation(fields.recaptcha()) === false) {
                return false;
            }
            
            processData(collection, "common/formPost.php");
            resetForm( forms.booking, false );
        });
    };    
    if (forms.booking.length !== 0 ) { loadBooking(); }
    
    //Subscription
    var subscribe = $('#chkNewsletter');
    if (subscribe.length != 0) {
        subscribe.on('click', function() {
            if ($(this).is(':checked')) { $('#txtNewsletter').val(1); } 
            else { $('#txtNewsletter').val(0); }
        });        
    }    
});

//null field validation method
function validateField(fieldId) {
    var f = fieldId.val();

    if (f == '' || f == null || f == '0') {
        return false;
    } else {
        return true;
    }
}

//email validation method
function isEmail(email) {
    var x = email.val();
    var at_pos = x.indexOf("@");
    var dot_pos = x.lastIndexOf(".");

    if (at_pos < 1 || dot_pos < at_pos + 2 || dot_pos + 2 >= x.length) {
        return false;
    } else {
        return true;
    }
}

function charLength(field, minLimit, maxLimit) {
    if (field.length < minLimit) {
        alert("Characters must be minimum of " + minLimit + "!");
        return false;
        
    } else if (field.length > maxLimit) {
        alert("Characters must be maximum of " + maxLimit + "!");
        return false;
    }
}

//google recaptcha validation
function recaptchaValidation(response) {
    var captcha_response = response;
    if (captcha_response.length == 0)
    {
        alert("Recaptcha validation error, please try it again!");
        return false; // Captcha is not Passed
    }
}

function processData(dataCollection, urlString) {
    //send enquiry via ajax
    $.post(urlString, dataCollection, function(data) {
       var obj = JSON.parse(data);
       window.location = "index.php?pg=result&frm=" + obj.form + "&r=" + obj.result;
    });
//    $.ajax({
//        type: "POST",
//        url: urlString,
//        data: dataCollection
//    }).done(function (result) {
//        alert(result);
//    });
}

//reset form by setting labels in fields
function resetForm(formId, labeled) {
    var fieldTypes = {
        'inputTag': 'input',
        'selectTag': 'select',
        'textareaTag': 'textarea'
    };

    $.each(fieldTypes, function (key, value) {
        var fieldTag = value;
        if (fieldTag == 'input') {
            formId.find(fieldTag).each(function () {
                if (!labeled) {
                    $(this).val('');
                } else {
                    $(this).val($(this).attr('title'));
                }
            });
        } else if (fieldTag == 'select') {
            formId.find(fieldTag).each(function () {
                $(this).val('0');
            });
        } else if (fieldTag == 'textarea') {
            formId.find(fieldTag).each(function () {
                $(this).val('');
            });
        }
    });
}  

function slideSwitch() {
    var $active = $('#slideshow img.active');

    if ($active.length == 0)
        $active = $('#slideshow img:last');

    var $next = $active.next().length ? $active.next()
            : $('#slideshow img:first');

    $active.addClass('last-active');

    $next.css({opacity: 0.0})
            .addClass('active')
            .animate({opacity: 1.0}, 1000, function () {
                $active.removeClass('active last-active');
            });
}