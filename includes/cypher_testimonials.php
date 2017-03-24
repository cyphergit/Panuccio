<?php
  include('conf.inc.php');
  
  $sql = "SELECT 
            TestimonialID
            , CustomerID
            ,Testimonials.TestimonialMsg
            ,Testimonials.DateCreated
          FROM 
            Testimonials
          ORDER BY DateCreated DESC";
        
  
  $num_rows = mysql_num_rows($sql);
        
  $rs = mysql_query($sql);
  
  if (mysql_num_rows($rs) > 0) {
    
    echo "<div id='paging'>";
  
    while($row = mysql_fetch_array($rs))
	  { 
      $UserEmail = $row[1];
      $TestimonialMsg = $row[2];
          
      echo "<p>";
      echo "<span class='callout'></span>";      
	    echo "<em>$TestimonialMsg</em><br/><br/>";
      echo "<em><b> - $UserEmail</b></em><br/><br/>";      
      echo "</p>";
  
	  }
  
    echo "</div>";
  
  } else {
  
    echo "<em>No Testimonial(s) as of the moment.</em>";
  
  }
  
?>