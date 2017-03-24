<script type="text/javascript">
        function CancelSubmission() { 
            location.href="http://www.panuccioautos.com.au/admin/index.php?pg=testimonials"
        }

        function validateForm(cypherTestimonialForm) {

            if (document.cypherTestimonialForm.txtTestimonial.value == "") {
                alert("Please enter your Testimonial!");
                document.cypherTestimonialForm.txtTestimonial.focus();
                return false;
            }
            
            if (document.cypherTestimonialForm.txtTStat.value == "") {
                alert("Please rate the testimonial if it is Satisfactory or Unsatisfactory!");
                return false;
            }
                              
            return true;
        }
        
        function SatisfiedStatus () {
          
            document.cypherTestimonialForm.txtTStat.value = 1;
                  
        }
        
        function UnsatisfiedStatus () {
          
            document.cypherTestimonialForm.txtTStat.value = 2;
                  
        }                  
        
</script>
<form id="cypherTestimonialForm" name="cypherTestimonialForm" method="POST" action="common/q_createTestimonial.php" onsubmit="return validateForm(this);">
  <p>
    Please fill-up the required fields below.
  </p>
  <table>
    <tr>
      <td valign="top" style="padding-top: 8px;">
        <label>Testimonial From:</label>
      </td>
      <td>
        <input type="text" id="txtTCustomer" name="txtTCustomer" class="cypher-FormField"/>
      </td>
    </tr>
    <tr>
      <td valign="top" style="padding-top: 8px;"><label>The Testimonial:</label></td>
      <td>
        <textarea id="txtTestimonial" name="txtTestimonial" col="16" style="height: 160px; width: 350px;" class="cypher-FormField"></textarea>
      </td>
    </tr>
    <tr>
      <td><input type="hidden" id="txtTStat" name="txtTStat"/></td>
      <td>
        <input type="button" id="btnSatisfied" name="btnSatisfied" value="Satisfied" onclick="SatisfiedStatus()"/>
        <input type="button" id="btnUnsatisfied" name="btnUnsatisfied" value="Unsatisfied" onclick="UnsatisfiedStatus()"/>
      </td>
    </tr>
  </table>
  <div class="form_buttons">
    <input id="cypher-Submit" type="Submit" value="Post"/>
    <input id="cypher-Cancel" type="button" value="Cancel" onclick="CancelSubmission();"/>
    <input id="reset" type="reset" value="Reset"/>
  </div>
</form>