<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <title>Panuccio Autos | Vehicle Repair and service center | Land Rover specialist in Bunbury Western Australia</title>

	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta name="description" content="Panuccio Autos | Repair and service center in Bunbury Western Australia specializing in Land Rover and Ssanyong vehicles" />
	<meta name="robots" content="index, follow" />
	<meta name="slurp" content="NOYDIR">	
	<meta name="keywords" content="Panuccio Autos, Bunbury Western Australia, Repair, service center, Land Rover Bunbury, Land Rover, Land Rover service center, land rover servicing, land rover maintenance, Ssanyong Bunbury, car specialist, vehicle repair, car repair, mechanic, car service, car repair service, auto repair"/>
	<meta name="copyright" content="Copyright  2011, CyperDesign. All rights reserved.">

	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>

        <link rel="stylesheet" href="styles/Cypher.Objects.css" type="text/css" />
	<link rel="stylesheet" href="styles/Default.css" type="text/css" />
	<link rel="stylesheet" href="styles/fancybox/jquery.fancybox-1.3.4.css" type="text/css"/>   
        <link rel="stylesheet" href="scripts/themes/base/jquery.ui.all.css" type="text/css"/>

	<link rel="stylesheet" href="scripts/datatable/css/demo_page.css" type="text/css"/>
	<link rel="stylesheet" href="scripts/datatable/css/demo_table.css" type="text/css"/>
	<link rel="stylesheet" href="scripts/datatable/css/demo_table_jui.css" type="text/css"/>   

	<script type="text/javascript" src="scripts/jquery-1.4.4.js"></script>
	<script type="text/javascript" src="scripts/jquery-1.4.4.min.js"></script>
	<script type="text/javascript" src="scripts/jquery-ui-1.8.7.custom.min.js"></script>

	<script type="text/javascript" src="scripts/datatable/js/jquery.dataTables.js"></script>

	<script type="text/javascript" src="scripts/ui/jquery.ui.core.js"></script>
	<script type="text/javascript" src="scripts/ui/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="scripts/ui/jquery.ui.datepicker.js"></script>

	<script type="text/javascript" src="scripts/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<script type="text/javascript" src="scripts/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>

<!--	<script type="text/javascript" src="scripts/cypher.fancybox.js"></script>-->
	<script type="text/javascript" src="scripts/cypher.banner.js"></script>	
	<script type="text/javascript" src="scripts/quickpager.jquery.js"></script>

        <script type="text/javascript">
                $(function() {
                    $("#paging").quickPager();
                    
                    oTable = $('#cypher-dataTable').dataTable({
                            "bJQueryUI": true,
                            "sPaginationType": "full_numbers"
                    });
                });
        </script>
        
        <script src='https://www.google.com/recaptcha/api.js'></script>
<!-- GA SNIPPET-->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-31425225-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<!--END GA-->


</head>
<body>	
	<div class="topColor"></div>
	<div id="PageBorder">
		<div id="PageBorder-Left">
			<div id="PageBorder-Right">
				<div id="PageContainer">
					<div id="Header">
						<div id="Logo">
							<a href="http://www.panuccioautos.com.au" title="Panuccio Autos | Vehicle Repair and service center | Land Rover and Ssangyong specialist in Bunbury Western Australia" ></a>
						</div>
						<div id="logo-links">
							<a href="https://www.facebook.com/#!/profile.php?id=1699617842" target="_blank" class="logo-link-fb"></a>
							<a href="index.php?pg=enquiry" id="logo-link-enquiry" class="logo-link-enquiry"></a>
							<a href="index.php?pg=contact" class="logo-link-contact"></a>
						</div>
					</div>
					<div id="HeaderNav">						
						<div id="MainMenu">
							<?php include('includes/cypher_menu.php');?>
						</div>						
					</div>
										
					<div class="Banner" id="slideshow">

						<div class="arrow-banner-link1">
							<a href='index.php?pg=services' title='Panuccio Autos | Car Service'></a>
						</div>
						<div class="arrow-banner-link2">
							<a href='index.php?pg=services' title='Panuccio Autos | Car Repairs'></a>
						</div>
						<div class="arrow-banner-link3">
							<a href="index.php?pg=enquiry" id="banner-link-enquiry" title="Panuccio Autos | Vehicle Repair and service center | Quick Quote"></a>
						</div>

						<img src="images/1.jpg" class="active" alt=""/>
						<img src="images/2a.jpg" alt=""/>
						<img src="images/2b.jpg" alt=""/>
						<img src="images/3.jpg" alt=""/>
						<img src="images/4.jpg" alt=""/>
						<img src="images/5a.jpg" alt=""/>
						<img src="images/5b.jpg" alt=""/>
						<img src="images/6.jpg" alt=""/>

					</div>

					<div id="Content">						
						<?php include('includes/cypher_content.php');?>
					</div>
					<div id="Footer">
						<div id="Copyright">
							Designed and Maintained by <a href="http://www.cypherdesign.com.au/" title="Cypher Design Creative Solutions">Cypher Design Creative Solutions</a><br/>
							<a href="#">Terms of Use</a> | <a href="#">Privacy Statement</a><br/>
                                                        <?php
                                                        function copyright($current_year) {
                                                            $year_created = 2011;
                                                            if ($year_created != $current_year) {
                                                                return $year_created . " - " . $current_year;
                                                            } else {
                                                                return $current_year;
                                                            }
                                                        }
                                                        ?>
                                                        Copyright &copy; <?php echo copyright(2017); ?> <a href="http://www.panuccioautos.com.au">Panuccio Autos</a>. All Rights Reserved.<br/>
						</div>
						<div id="FooterLogo">
							<a href="http://www.cypherdesign.com.au/" title="Cypher Design Creative Solutions"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!--	<div id="booking-container">
            <div id="booking-form-wrapper">
                <div id="booking-title"></div>
                <?php //include('modules/cypher_mod_booking.php');?>	
            </div>
	</div>-->
<!--	<div id="enquiry-container">
            <div id="enquiry-form-wrapper">
                <div id="enquiry-title"></div>
                <?php //include('modules/cypher_mod_enquiry.php');?>	
            </div>
	</div>-->
</body>
</html>
