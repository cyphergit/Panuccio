<?php
$form = $_GET['frm'];
$result = $_GET['r'];

switch($form) {
    case "booking":
        $title = "Booking";
        if ($result != "s") {
            $msg = "<span><span class='fa fa-remove fa-3x icon'></span>Error encountered during booking process. Please try it again.</span>";
        } else {
            $msg = "<span><span class='fa fa-check-square-o fa-3x icon'></span>Thank you for using our online booking form.  You'll received an email notifying you "
                    . "of the details of your request, and we'll get back to you the soonest.</span>";
        }
        break;
    
    case "unsubscribe":
        $title = "Unsubscribe";
        if ($result != "s") {
            $msg = "<span><span class='fa fa-remove fa-3x icon'></span>Error encountered during the unsubscribe process. Please try it again.</span>";
        } else {
            $msg = "<span><span class='fa fa-check-square-o fa-3x icon'></span>You have successfully unsubscribe to our newsletter.</span>";
        }                
        break;
    
    case "enquiry":
        $title = "Enquiry";        
        if ($result != "s") {
            $msg = "<span><span class='fa fa-remove fa-3x icon'></span>Error encountered during booking process. Please try it again.</span>";
        } else {
            $msg = "<span><span class='fa fa-check-square-o fa-3x icon'></span>Thank you for using our website enquiry form.  You'll received an email notifying you "
                    . "of the details of your request, and we'll get back to you the soonest.</span>";
        }        
        break;
}
?>
<h2><?php echo $title; ?></h2>        
<div class="notif-result">
    <?php if ($result == "s") {
        ?>
        <p class="success">
            <?php echo $msg; ?>
        </p>    
        <?php
    } else {
        ?>
        <p class="failed">
            <?php echo $msg; ?>
        </p>
    <?php } ?>
</div>