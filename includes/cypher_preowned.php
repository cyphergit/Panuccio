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
          ORDER BY PreOwnedID DESC";
        
  
  $num_rows = mysql_num_rows($sql);
        
  $rs = mysql_query($sql);
  
  if (mysql_num_rows($rs) > 0) {
    
    echo "<div id='paging'>";
    
    while($row = mysql_fetch_array($rs))
	  { 
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

      echo "<div style='height: 140px; width: 530px; padding: 4px 4px 4px 4px;'>";
      echo "<div style='float: left; width: 180px; height: 135px; padding-left: 10px;'>";
      
      $item_q = "SELECT * FROM PreOwnedImage WHERE PreOwnedID = '$pID'";
      $item_rs = mysql_query($item_q);
      $item_img = mysql_fetch_array($item_rs);
      $item_img_count = mysql_num_rows($item_rs);
      
      if ($item_img_count == 0) {
        echo "<img src='images/preowned-no-image.gif' alt='No Image' class='preowned-img'/>";
      } else {
        echo "<img src='$site_host/admin/images_preowned/$item_img[2]' alt='$item_img[1]' class='preowned-img' style='max-width: 180px; height: auto;'/>";
      }
      
      echo "</div>";
      echo "<div style='float: right; width: 300px; padding-right: 20px;'>";
      echo "<div class='preowned-item-title'>$pItem</div>";
      echo "<div id='preownedSpecs' class='preowned-item-desc'>";
      echo "<span>Repaired and Restored By:  Panuccio Autos</span><br/>";
      echo "<span>Transmission:  $pTransmission</span><br/>";
      echo "<span>Engine:  $itemEngine</span><br/><br/>";
      echo "<span>Our Price:<br/>  <span style='font-weight: bold;'>$$pPrice</span></span><br/><br/>";
      echo "<a onclick='LoadPreownedDetail();' alt='See Full Details'>See Full Details</a>";
      echo "<input type='hidden' id='itemCode' name='itemCode' value='$pID'/>";      
      echo "</div>";
      echo "</div>";
      echo "</div>";
	  }

    echo "</div>";
  
  } else {
  
    echo "<em>No Pre Owned item(s) as of the moment.</em>";
  
  }
  
?>