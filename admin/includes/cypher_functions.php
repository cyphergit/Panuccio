<?php
  $site_host = "http://www.panuccioautos.com.au";
  //$site_host = "http://localhost/Panuccio";

  function GetIDCount($counter_val) {
  
    $rs = mysql_query($counter_val);
    $row_id = mysql_fetch_array($rs);
    $getidcount = $row_id[0];
    $newidcount = $getidcount + 1;
    
    return $newidcount;
    
  }
  
  function LogCheck($user_val) {

    $log_r = mysql_query("SELECT * FROM Log WHERE UserLog = '$user_val'");
    $log_count = mysql_num_rows($log_r);
    
    return $log_count;
    
  }
  
  function LogUser($log_val,$log_name) {
    
    if ($log_val == 0) {
      mysql_query("INSERT INTO Log(UserLog,SessionCount,LogDateTime) VALUES('$log_name','1',now())");      
    } else {
      return false;
    }
    
    return true;
    
  }
?>