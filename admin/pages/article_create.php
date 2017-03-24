<?php
session_start();
$site = "http://www.panuccioautos.com.au/admin";
if($_SESSION['logged'] != 1) {
echo "<script type=\"text/javascript\">window.location=\"$site/index.php?pg=login\"</script>"; 
} else {
echo "<div id='LogPanel'>";
echo "<div id='Login-Register'>";
echo "<a href='http://www.panuccioautos.com.au/admin/index.php?pg=accountsettings'>Account Settings</a>";
echo "<a href='http://www.panuccioautos.com.au/admin/f_logout.php' class='cypherLogs'>Logout</a>";
echo "</div>";
echo "</div>";
}
?>
<h2>Newsletter - Articles</h2>
<div id="crudControl">
  <a href="index.php?pg=article_create">Add Article</a> |
  <a href="index.php?pg=newsletter_send">Send Newsletter</a>
  <div style="float: right;">
    <a href="index.php?pg=articles">Article Listing</a> |
    <a href="index.php?pg=newsletter">Newsletters</a> |
    <!--<a href="#">Images</a>-->
  </div>
</div>
<div class="dataForm">
  <fieldset>
    <legend>Add New Article</legend>
    <div id='crudForm'>
      <?php
        include('modules/cypher_mod_article.php');
      ?>
    </div>
  </fieldset>
</div>
