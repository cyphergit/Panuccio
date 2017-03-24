
                <div class="col-sm-12">
                    <div class="banner" id="slideshow">
                        <?php for($i=1;$i<=6;$i++) { 
                            $images = "images/banners/" . $i . ".jpg";
                            ?>
                        <img src="<?php echo $images; ?>" alt=""/>
                        <?php }?>
                    </div>
                </div>