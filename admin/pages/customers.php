<?php
include('../conf.inc.php');
session_start();

if($_SESSION['logged'] != 1) {
echo "<script type=\"text/javascript\">window.location=\"$site/index.php?pg=login\"</script>"; 
} else {
echo "<div id='LogPanel'>";
echo "<div id='Login-Register'>";
echo "<a href=\"$site_host/admin/index.php?pg=accountsettings\">Account Settings</a>";
echo "<a href=\"$site_host/admin/f_logout.php\"' class='cypherLogs'>Logout</a>";
echo "</div>";
echo "</div>";
}
?>
<script type="text/javascript">
  var sitehost = 'http://localhost/Panuccio/'
  //var sitehost = 'http://www.panuccioautos.com.au/'
  
  function deleteRow(r) {
  
			var answer = confirm("Delete this entry?")
			if (answer){
				var i=r.parentNode.parentNode.rowIndex;
				
				var table = document.getElementById('cypher-dataTable');
				var row = table.rows[i];
				var cell = row.cells[0];
				content = cell.firstChild.nodeValue;
				
				$("#delete-wrap").append('<form name="deleteForm" id="deleteForm" action="common/q_deleteCustomer.php" method="post"><input id="entryID" name="entryID" type="hidden" value="' + content + '"/></form>');
				
				document.deleteForm.submit();
				
				//alert(content);
			}	else {
      
				alert("Operation Cancelled.");
        
			}	
      
  }
  
  function LoadUpdateDialog(r) {

      var i=r.parentNode.parentNode.rowIndex;

      var table = document.getElementById('cypher-dataTable');
      var row = table.rows[i];
      var cell = row.cells[0];
      content = cell.firstChild.nodeValue;

      document.cookie = 'IDValue = '+ content +'';
      document.cookie = 'Process = Update';

      var w = document.body.clientWidth, h = document.body.clientHeight;
      var popW = 500, popH = 350;
      var leftPos = (w-popW)/2, topPos = (h-popH)/2;

      window.open(sitehost + 'admin/views/view_customer.php','customerWindow','width='+ popW +',height='+ popH +',top=' + topPos +',left=' + leftPos +',resizable=yes,scrollbars=yes');      
      
      //alert(document.cookie);
    
  }

  function LoadViewDialog(r) {
  
      var i=r.parentNode.parentNode.rowIndex;
      
      var table = document.getElementById('cypher-dataTable');
      var row = table.rows[i];
      var cell = row.cells[0];
      content = cell.firstChild.nodeValue;

      document.cookie = 'IDValue = '+ content +'';
      document.cookie = 'Process = View';

      var w = document.body.clientWidth, h = document.body.clientHeight;
      var popW = 500, popH = 350;
      var leftPos = (w-popW)/2, topPos = (h-popH)/2;

      window.open(sitehost + 'admin/views/view_customer.php','customerWindow','width='+ popW +',height='+ popH +',top=' + topPos +',left=' + leftPos +',resizable=yes,scrollbars=yes');
      
      //alert(document.cookie);
    
  }
</script>

<h2>Customers</h2>
<div id="crudControl">
  <a href="index.php?pg=customers_create">Add Customer</a> |
  <div style="float: right;">
    <a href="index.php?pg=customers">Customer Listing</a> |
    <a href="index.php?pg=useraccount">User Accounts</a>
  </div>
</div>
<div>
  <?php include('includes/cypher_customers_table.php');?>
</div>
