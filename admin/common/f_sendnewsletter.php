<?php  
  include('../../conf.inc.php');
  
  $mailAll = $_POST['txtCMailingList'];
  $mailSpecific = $_POST['txtMembersEmail'];
  $mailOption = $_POST['txtMailingVal'];
  
  $mailNewsletter = $_POST['selNewsletter'];
  
  $cur_date = date("F Y");
  
  if ($mailOption == "1") {  
    $emailTo = $mailAll;  
  } else {  
    $emailTo = $mailSpecific;  
  }
  
  $sql = "SELECT
            Newsletter.NewsletterName
            , NewsletterItem.Title
            , NewsletterArticle.ArticleContent
          FROM
            Newsletter, NewsletterItem, NewsletterArticle
          WHERE
            Newsletter.NewsletterID = NewsletterItem.NewsletterID
          AND
            NewsletterItem.Title = NewsletterArticle.ArticleTitle
          AND
            Newsletter.NewsletterName = '$mailNewsletter'
          ORDER BY 
            NewsletterArticle.ArticleID
          DESC";
  
  $rs = mysql_query($sql);
  //$row = mysql_fetch_array($rs);
  
  //$emailFrom = 'admin@panuccioautos.com.au';  
  $emailFrom = 'newsletter@panuccioautos.com.au';  
  $subject = 'Panuccio Autos - Monthly Newsletter';

  $body = "<html>";
  $body .= "<head>";
  $body .= "</head>";
  $body .= "<body style=\"background-color: #1e1f21; color: #fff; font-size: 12px; font-family: Calibri;\">";  
  $body .= "<div style='border-bottom: dotted 1px #999; padding: 8px 8px 8px 8px;'>";
  $body .= "<img src='http://www.panuccioautos.com.au/images/nletter_heading2.gif' alt='Panuccio Autos' title='Panuccio Autos'/>";
  $body .= "</div>";
  $body .= "<div style='min-height: 500px; padding: 8px 8px 8px 18px;'>";
  $body .= "<h1 style='margin-top: 0px; margin-bottom: 4px;'>$mailNewsletter</h1>";
  $body .= "<span style='font-style; italic; color: #999;'>$cur_date</span>";
  
    while($row = mysql_fetch_array($rs)) {
  
      $aTitle = $row[1];
      $aContent = $row[2];
  
      $body .= "<div style='width: 450px; padding-bottom: 10px;'>";
      $body .= "<h3 style='color: #ff5f09;'>$aTitle</h3>";
      $body .= "<p style='text-align: justify;'>$aContent</p>";
      $body .= "</div>";
    
    }  
    
  $body .= "</div>";   
  $body .= "<div style='padding: 8px 8px 8px 8px;'>";
  $body .= "To unsubscribe from future emails, please click here <a href='http://www.panuccioautos.com.au/index.php?pg=unsubscribe' alt='Unsubscribe Here' style='color: #f08115;'>here</a>.";
  $body .= "</div>";
  $body .= "<div style='border-top: dotted 1px #999; padding: 8px 8px 8px 8px;'>";
  $body .= "Copyright © 2011 Panuccio Autos. All Rights Reserved.";
  $body .= "</div>";
  $body .= "</body>";
  $body .= "</html>";

  $headers = "MIME-Version: 1.0\r\n";
  $headers .= "From: Panuccio Autos - Monthly Newsletter<$emailFrom>\r\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    
  mail($emailTo, $subject, $body, $headers);
  $emailSent = true;
  
  echo "<script type=\"text/javascript\">alert(\"Panuccio Autos Monthly Newsletter sent!\"); window.location=\"http://www.panuccioautos.com.au/admin/index.php?pg=newsletter_send\"</script>";
?>