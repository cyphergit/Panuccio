<script type="text/javascript">
        function CancelSubmission() {             
            location.href="http://www.panuccioautos.com.au/admin/index.php?pg=newsletter"
        }

        function validateForm(cypherArticleForm) {

            if (document.cypherArticleForm.txtATitle.value == "") {
                alert("Please provide a title for your Article!");
                document.cypherArticleForm.txtATitle.focus();
                return false;
            }
            
            if (document.cypherArticleForm.txtAAuthor.value == "") {
                alert("Please provide an author for your Article!");
                document.cypherArticleForm.txtAAuthor.focus();
                return false;
            }            
            
            if (document.cypherArticleForm.txtAContent.value == "") {
                alert("Please provide a content for your Article!");
                document.cypherArticleForm.txtAContent.focus();
                return false;
            }
            
            return true;
        }
        
</script>
<form id="cypherArticleForm" name="cypherArticleForm" method="POST" action="common/q_createArticle.php" onsubmit="return validateForm(this);">
  <p>
    Please fill-up the required fields below.
  </p>
  <table>
    <tr>
      <td><label>Title:</label></td>
      <td><input type="text" id="txtATitle" name="txtATitle" class="cypher-FormField"/></td>
    </tr>
    <tr>
      <td><label>Author:</label></td>
      <td><input type="text" id="txtAAuthor" name="txtAAuthor" class="cypher-FormField"/></td>
    </tr>    
    <tr>
      <td><label>Content:</label></td>
      <td>
        <textarea id="txtAContent" name="txtAContent" col="10" style="height: 150px; width: 500px; border: solid 1px Gray; padding: 0px 0px 4px 4px;"></textarea>
      </td>
    </tr>    
  </table>
  <div class="form_buttons">
    <input id="cypher-Submit" type="Submit" value="Add"/>
    <input id="cypher-Cancel" type="button" value="Cancel" onclick="CancelSubmission();"/>
    <input id="reset" type="reset" value="Reset"/>
  </div>
</form>