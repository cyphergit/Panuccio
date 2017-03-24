<script type="text/javascript" src="scripts/highslide/highslide-with-gallery.js"></script>
<link rel="stylesheet" type="text/css" href="scripts/highslide/highslide.css" />
<script type="text/javascript">
hs.graphicsDir = 'scripts/highslide/graphics/';
hs.align = 'center';
hs.transitions = ['expand', 'crossfade'];
hs.outlineType = 'rounded-white';
hs.fadeInOut = true;
hs.numberPosition = 'caption';
hs.dimmingOpacity = 0.75;

// Add the controlbar
if (hs.addSlideshow) hs.addSlideshow({
	//slideshowGroup: 'group1',
	interval: 5000,
	repeat: false,
	useControls: true,
	fixedControls: 'fit',
	overlayOptions: {
		opacity: .75,
		position: 'bottom center',
		hideOnMouseOut: true
	}
});
</script>
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
          echo "<td width='100'>";
          
          $item_q = "SELECT * FROM PreownedImage WHERE PreownedID = '$pID'";
          $item_rs = mysql_query($item_q);
          $item_img = mysql_fetch_array($item_rs);
          $item_img_count = mysql_num_rows($item_rs);
      
          if ($item_img_count == 0) {
            echo "<img src='images/preowned-no-image2.gif' alt='No Image' class='preowned-img'/>";
          } else {
            echo "<div class='highslide-gallery' style='width: 100px;'>";
            echo "<a href='images_preowned/$item_img[2]' id='thumb$i' class='highslide' onclick=\"return hs.expand(this, { slideshowGroup: $i } )\">";
            echo "<img src='$site_host/images_preowned/$item_img[2]' alt='$item_img[1]' class='preowned-img'/>";
            echo "</a>";
            echo "<div class='hidden-container'>";            
            
            while($other_img = mysql_fetch_array($item_rs)) {
              echo "<a href='images_preowned/$other_img[2]' class='highslide' onclick=\"return hs.expand(this, { thumbnailId: 'thumb$i', slideshowGroup: $i })\"></a>";
            }
            
            echo "</div>";            
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
