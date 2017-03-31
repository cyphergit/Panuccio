<?php
$result = $_GET['r'];
?>
<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-4">
            <div class="side-content">
                <?php include 'includes/sidelinks.php' ?>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="content">
                <?php
                if ($result != "") {
                    include 'includes/form_post_result.php';                    
                } else {
                    include 'includes/error.php';
                }
                ?>
            </div>                   
        </div>                     
    </div>              
</div>
