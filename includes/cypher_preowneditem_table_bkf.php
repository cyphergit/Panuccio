<div id="dataTable-container">
  <table id="cypher-dataTable" class="display">
    <thead>
      <tr>
        <th>Item ID</th>
        <th>Thumbnail</th>
        <th>Item</th>
        <th></th>
      </tr>
    </thead>
    <?php
        include('conf.inc.php');
    
        $sql = "SELECT 
                    ItemName
                  , Brand
                  , Model
                  , Engine
                  , Transmission
                  , Description
                  , Price
                  , PreOwnedID
                FROM 
                  Preowned 
                WHERE Status = '1' 
                ORDER BY PreOwnedID ASC";
        
        $num_rows = mysql_num_rows($sql);
        
        $rs = mysql_query($sql);
        
        while($row = mysql_fetch_array($rs))
		    { 
          $i = $i + 1;
          $pItem = $row[0];
          $pBrand = $row[1];
          $pModel = $row[2];
          $pEngine = $row[3];
        
          if ($pEngine = '') {
        
            $itemEngine = 'n/a';
        
          } else {
      
            $itemEngine = $row[3];
      
          }
            
          $pTransmission = $row[4];
          $pDesc = $row[5];
          $pPrice = $row[6];
          $pID = $row[7];
        
		      echo "<tr>";			    
          echo "<td width='10'>$pID</td>";
          echo "<td width='10'>";
          
          $item_q = "SELECT * FROM PreownedImage WHERE PreownedID = '$pID'";
          $item_rs = mysql_query($item_q);
          $item_img = mysql_fetch_array($item_rs);
          $item_img_count = mysql_num_rows($item_rs);
      
          if ($item_img_count == 0) {
            echo "<img src='images/preowned-no-image2.gif' alt='No Image' class='preowned-img'/>";
          } else {
            echo "<div class='highslide-gallery'>";
            echo "<a href='#' id='thumb$i'>";
            echo "<img src='$site_host/images_preowned/$item_img[2]' alt='$item_img[1]' class='preowned-img' style='max-width: 100px; height: auto;'/>";
            echo "</a>";
            echo "</div>";
          }
          
          echo "</td>";
				  echo "<td width='260' style='padding-top: 12px;'>";
          echo "<div class='preowned-item-title'>$pItem</div>";
          echo "<span>Repaired and Restored By:  Panuccio Autos</span><br/>";
          echo "<span>Transmission:  $pTransmission</span><br/>";
          echo "<span>Engine:  $itemEngine</span><br/><br/>";
          echo "<span>Our Price:<br/>  <span style='font-weight: bold;'>$$pPrice</span></span><br/><br/>";
          echo "</td>";                     
          echo "<td width='40' style='text-align: center;'><a onclick=\"LoadViewDialog(this);\">View Specs</a></td>";
				  echo "</tr>";
			  }
      ?>
  </table>
</div>
<div id="delete-wrap"></div>
