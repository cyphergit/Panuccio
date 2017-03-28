<?php
include('conf.inc.php');

$sql = "SELECT TestimonialID, CustomerID, TestimonialMsg, DateCreated
          FROM Testimonials ORDER BY DateCreated DESC";

$num_rows = mysql_num_rows($sql);

$rows = mysql_query($sql);

if (mysql_num_rows($rows) > 0) {
    ?>
    <div id='paging'>
        <?php
        while ($row = mysql_fetch_array($rows)) {
            $UserEmail = $row[1];
            $TestimonialMsg = $row[2];
            ?>
            <p>
                <span class="callout">
                    <em><?php echo $TestimonialMsg; ?></em><br/><br/>
                    <em><strong>- <?php echo $UserEmail; ?></strong></em><br/><br/>
                </span>
            </p>
        <?php }
        ?>
    </div>
    <?php
} else {
    ?>
    <p>
        <em>No Testimonial(s) as of the moment.</em>
    </p>
<?php } ?>