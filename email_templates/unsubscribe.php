<?php

function unsubscribe_template($obj) {
    ob_start();
    ?>
    <html>
        <body>
            <h3>Panuccio Autos - Subscription</h3>
            <p>
                Hi <?php echo $obj->name; ?>, 
            </p>            
            <p>
                Thank you for visiting Panuccio Autos website.  This is to inform you that
                you have unsubscribed to Panuccio Autos Newsletter service. You will no longer receive any future
                updates regarding the company events and promos.
            </p>
            Should you decided to subscribe again. Please feel free to visit our website or call using the
            contact information indicated in our contact page.
            <p>
                Thank you, <br/>
                Panuccio Admin
            </p>
        </body>
    </html>
    
    <?php
    $output = ob_get_clean();
    ob_flush();

    return $output;
}
?>


