<?php    
  include('../../conf.inc.php');  

  $tMessage = nl2br($_POST['txtTestimonial']);
  $tRating = $_POST['txtTStat'];
  $tCustomer = $_POST['txtTCustomer'];
  
  $cur_date = date("y-m-d h:m:s");
  
	mysql_query("INSERT INTO Testimonials (CustomerID, TestimonialMsg, IsSatisfied, DateCreated)
    VALUES ('$tCustomer','$tMessage','$tRating','$cur_date')") or die (mysql_error());
  
  echo "<script type=\"text/javascript\">alert(\"Testimonial Posted!\");window.location=\"$site_host/admin/index.php?pg=testimonials\"</script>";

  mysql_close($db_connect); // Closes the connection.

?>