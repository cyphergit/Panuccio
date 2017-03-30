<?php

function booking_template($obj) {
    ob_start();
    ?>
    <html>
        <body>
            <h2>Panuccio Autos - Customer Service Request</h2>
            <h3>Customer Details</h3>
            <table>
                <tr>
                    <td><strong>Name:</strong></td>
                    <td><?php echo $obj->name; ?></td>
                </tr>
                <tr>
                    <td><strong>Email:</strong></td>
                    <td><?php echo $obj->email; ?></td>
                </tr>
                <tr>
                    <td><strong>Contact No.:</strong></td>
                    <td><?php echo $obj->telephone; ?></td>
                </tr>
                <tr>
                    <td><strong>Home Address:</strong></td>
                    <td><?php echo $obj->address; ?></td>
                </tr>
            </table>
            
            <h3>Car Details</h3>
            <table>
                <tr>
                    <td><strong>Car Model:</strong></td>
                    <td><?php echo $obj->carModel; ?></td>
                </tr>
                <tr>
                    <td><strong>Transmission:</strong></td>
                    <td><?php echo $obj->transmission; ?></td>
                </tr>
                <tr>
                    <td><strong>Fuel Type:</strong></td>
                    <td><?php echo $obj->fuelType; ?></td>
                </tr>
            </table>
            
            <h3>Service Request</h3>
            <table>
                <tr>
                    <td><strong>Preferred Date:</strong></td>
                    <td><?php echo $obj->preferredDate; ?></td>
                </tr>                
                <tr>
                    <td><strong>Request:</strong></td>
                    <td><?php echo $obj->serviceRequest; ?></td>
                </tr>

            </table>
        </body>
    </html>        
    <?php    
    $output = ob_get_clean();
    ob_flush();

    return $output;    
}
?>