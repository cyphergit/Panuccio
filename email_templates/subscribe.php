<?php

function subscribe_template($obj) {
    ob_start();
    ?>
    <html>
        <body>
            <h3>Panuccio Autos - Subscription</h3>
            <p>
                Hi <?php echo $obj->name; ?>, 
            </p>
            <p>
                Thank you for subscribing to Panuccio Autos Newsletter service. From now on you will receive
                events and promo updates from Panuccio Autos.
            </p>
            <p>
                Should you decided to stop receiving any newsletter, just click the unsubscribe link in the newsletter or
                you may contact us via our website contact page.
            </p>
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