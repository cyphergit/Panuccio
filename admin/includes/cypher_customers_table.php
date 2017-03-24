<div id="dataTable-container">
  <table id="cypher-dataTable" class="display">
    <thead>
      <tr>
        <th>Customer ID</th>
        <th>E-mail Address</th>        
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <?php
        $sql = "SELECT  
                  UserLogin.UserNumber
                  , Customers.Email                  
                FROM 
                  Customers
                  , UserLogin
                WHERE
                  UserLogin.UserNumber = Customers.CustomersID
                AND
                  UserLogin.Status <> 2
                AND 
                  UserLogin.SystemLevel = 3
                ORDER BY Customers.CustomersID DESC";
        
        $num_rows = mysql_num_rows($sql);
        
        $rs = mysql_query($sql);
        
        while($row = mysql_fetch_array($rs))
		    { 
		      echo "<tr>";			    
          echo "<td style='width:100px;'>$row[0]</td>";
				  echo "<td>$row[1]</td>";                               
          echo "<td width='24'><a onclick=\"LoadUpdateDialog(this);\">Update</a></td>";
          echo "<td width='24'><a onclick=\"deleteRow(this);\">Delete</a></td>";
          echo "<td width='18'><a onclick=\"LoadViewDialog(this);\">View</a></td>";
				  echo "</tr>";
			  }
      ?>
  </table>
</div>
<div id="delete-wrap"></div>
