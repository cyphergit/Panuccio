﻿<div id="dataTable-container">
  <table id="cypher-dataTable" class="display">
    <thead>
      <tr>
        <th>Image ID</th>
        <th>Preowned Item Set</th>
        <th>Image File</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <?php
        $sql = "SELECT
                  PreownedImage.ImageID
                  , Preowned.ItemName
                  , PreownedImage.ItemImage
                FROM 
                  PreownedImage, Preowned
                WHERE
                  PreownedImage.PreOwnedID = Preowned.PreOwnedID
                AND
                  Preowned.Status = '1'
                ORDER BY ImageID DESC";
        
        $num_rows = mysql_num_rows($sql);
        
        $rs = mysql_query($sql);
        
        while($row = mysql_fetch_array($rs))
		    { 
		      echo "<tr>";			    
          echo "<td width='60'>$row[0]</td>";
				  echo "<td>$row[1]</td>";
          echo "<td>$row[2]</td>";
          echo "<td width='24'><a onclick=\"deleteRow(this);\">Delete</a></td>";
          echo "<td width='18'><a onclick=\"LoadViewDialog(this);\">View</a></td>";
				  echo "</tr>";
			  }
      ?>
  </table>
</div>
<div id="delete-wrap"></div>
