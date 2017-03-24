<div id="dataTable-container">
  <table id="cypher-dataTable" class="display">
    <thead>
      <tr>
        <th>ID</th>
        <th>Posted By</th>
        <!--<th>Testimonial</th>-->
        <th>Date Posted</th>
        <th></th>
        <!--<th></th>-->
        <th></th>
      </tr>
    </thead>
    <?php
        $sql = "SELECT 
            TestimonialID
            , CustomerID
            , DateCreated            
          FROM 
            Testimonials          
          ORDER BY TestimonialID DESC";
        
        $num_rows = mysql_num_rows($sql);
        
        $rs = mysql_query($sql);
        
        while($row = mysql_fetch_array($rs))
		    { 
		      echo "<tr>";			    
          echo "<td width='40' valign='top'>$row[0]</td>";
				  echo "<td valign='top' width='150'>$row[1]</td>";                     
          //echo "<td>$row[2]</td>";
          echo "<td width='100' valign='top'>$row[2]</td>";                     
          //echo "<td width='24' valign='top'><a onclick=\"LoadUpdateDialog(this);\">Update</a></td>";
          echo "<td width='24' valign='top'><a onclick=\"deleteRow(this);\">Delete</a></td>";
          echo "<td width='18' valign='top'><a onclick=\"LoadViewDialog(this);\">View</a></td>";
				  echo "</tr>";
			  }
      ?>
  </table>
</div>
<div id="delete-wrap"></div>
