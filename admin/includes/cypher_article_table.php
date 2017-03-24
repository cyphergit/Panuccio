<div id="dataTable-container">
  <table id="cypher-dataTable" class="display">
    <thead>
      <tr>
        <th>Article ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>Date Published</th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <?php
        $sql = "SELECT * FROM NewsletterArticle WHERE Status = '1' ORDER BY ArticleID DESC";
        
        $num_rows = mysql_num_rows($sql);
        
        $rs = mysql_query($sql);
        
        while($row = mysql_fetch_array($rs))
		    { 
		      echo "<tr>";			    
          echo "<td width='10'>$row[0]</td>";
				  echo "<td width='220'>$row[1]</td>";                     
          echo "<td width='150'>$row[3]</td>";                     
          echo "<td width='30'>$row[4]</td>";
          echo "<td width='24'><a onclick=\"LoadUpdateDialog(this);\">Update</a></td>";
          echo "<td width='24'><a onclick=\"deleteRow(this);\">Delete</a></td>";
          echo "<td width='18'><a onclick=\"LoadViewDialog(this);\">View</a></td>";
				  echo "</tr>";
			  }
      ?>
  </table>
</div>
<div id="delete-wrap"></div>
