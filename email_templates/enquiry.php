<?php

function enquiry_template($obj) {
    ob_start();
    ?>
    <html>
        <body>
            <h2>Panuccio Autos - Online Enquiry</h2>
            <h3>Customer Details</h3>
            <p>
                <strong>Name: </strong><?php echo $obj->name; ?><br/>
                <strong>Email: </strong> <?php echo $obj->email; ?>
            </p>
            <h3>Enquiry Details</h3>
            <p>
                <strong>Subject: </strong> <?php echo $obj->subject; ?>
            </p>
            <p>            
                <strong>Message/Comment:</strong><br/><br/>
                <?php echo $obj->message; ?>
            </p>
        </body>
    </html>  
    <?php
    $output = ob_get_clean();
    ob_flush();

    return $output;
}