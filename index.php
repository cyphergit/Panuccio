<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Panuccio Autos | Repair and service center in Bunbury Western Australia specializing in Land Rover and Ssanyong vehicles">
        <meta name="robots" content="index, follow">
        <meta name="author" content="">
        <meta name="copyright" content="Copyright  2017, CyperDesign. All rights reserved.">
        <link rel="icon" href="favicon.ico">

        <title>Panuccio Autos | Vehicle Repair and service center | Land Rover specialist in Bunbury Western Australia</title>
 
        <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="node_modules/fontawesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="styles/panuccio.css" rel="stylesheet">
    </head>

    <body>
        <div class="topColor"></div>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Panuccio Autos</a>
                </div>
                <!--navigation-->
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="index.php?pg=about">About Us</a></li>
                        <li><a href="index.php?pg=services">Services</a></li>
                        <li><a href="index.php?pg=parts">Parts</a></li>
                        <li><a href="index.php?pg=testimonials">Testimonials</a></li>
                        <li><a href="index.php?pg=preowned">Pre-owned</a></li>
                        <li><a href="index.php?pg=contact">Contact Us</a></li>
                    </ul>
                </div>
                <!--navigation-->
            </div>
        </nav>

        <div class="container">
            <div class="content-wrapper">
                <div class="row">
                    <?php include 'includes/banner.php';?>
                    <?php include 'includes/content.php';?>
                </div>                
            </div>
        </div>
        
        <footer class="footer">
            <div class="container">
                <p class="text-muted">
                    <span>&copy; 2017. Panuccio Autos.</span>
                    <span>Designed By</span>
                    <span><img src="images/cypher-logo4.png"/></span>
                </p>
            </div>
        </footer>        

        <script src="node_modules/jquery/dist/jquery.min.js"></script>
        <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="scripts/panuccio.js"></script>
        
        <script src='https://www.google.com/recaptcha/api.js'></script>        
    </body>
</html>
