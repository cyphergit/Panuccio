<?php
if (isset($_GET['pg']) && $_GET['pg'] != "") {
    $pg = $_GET['pg'];
    if (file_exists('pages/' . $pg . '.php')) {
        @include ('pages/' . $pg . '.php');
    } elseif (!file_exists('pages/' . $pg . '.php')) {
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
                        <?php include 'includes/error.php' ?>                       
                    </div>                    
                </div>
            </div>
        </div>  
        <?php
    }
} else {
    @include ('pages/home.php');
}
?>