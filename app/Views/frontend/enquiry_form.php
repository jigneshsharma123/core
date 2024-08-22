<div class="sidebar-widget single-content-widget">
   <h3 class="title stroke-shape">Enquiry Form</h3>
   <div class="enquiry-forum">
      <div class="form-box">
         <div class="form-content">
            <div class="contact-form-action">
               <form method="post" name="enquiry" id="enquiry">
                  <div class="input-box">
                     <label class="label-text">Your Name</label>
                     <div class="form-group">
                        <span class="la la-user form-icon"></span>
                        <input class="form-control" type="text" name="name" placeholder="Your name" required="">
                        <span id="nameError" class="error"></span>
                     </div>
                  </div>
                  <div class="input-box">
                     <label class="label-text">Your Email</label>
                     <div class="form-group">
                        <span class="la la-envelope-o form-icon"></span>
                        <input class="form-control" type="email" name="email" placeholder="Email address" required="">
                        <span id="emailError" class="error"></span>
                     </div>
                  </div>
                  <div class="input-box">
                     <label class="label-text">Message</label>
                     <div class="form-group">
                        <span class="la la-pencil form-icon"></span>
                        <textarea class="message-control form-control" name="message" placeholder="Write message"></textarea>
                        <span id="messageError" class="error"></span>
                     </div>
                  </div>
                  <div class="input-box">
                     <div class="form-group">
                        <div class="custom-checkbox mb-0">
                           <input type="checkbox" id="agreeChb" name="privacy">
                           <label for="agreeChb">I agree with <a href="#">Terms of Service</a> and
                           <a href="#">Privacy Statement</a>
                           </label>
                           <span id="privacyError" class="error"></span>
                        </div>
                     </div>
                  </div>
                  <div id="flashMessage"></div>
                  <div class="btn-box">
                      <input type="submit" name="" value="Submit Enquiry" class="theme-btn" id="submitBtn">  <!-- <button type="button" class="theme-btn" id="submitBtn" >Submit Enquiry</button>  --> 
                  </div>
               </form>
            </div>
            <!-- end contact-form-action -->
         </div>
         <!-- end form-content -->
      </div>
      <!-- end form-box -->
   </div>
   <!-- end enquiry-forum -->
</div>
<!-- end sidebar-widget -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#submitBtn').click(function(e) {
        e.preventDefault(); //alert('hello');

        var formData = $('#enquiry').serialize();
        //alert(formData);
         //$('#submitBtn').hide();
          $("#submitBtn").attr("disabled", true);
        $.ajax({
            url: '<?php echo base_url();?>/enquiry_form',
            type: 'POST',
            data: formData,
            success: function(response) {
                // Handle success response
                if (response.success) { //alert('hello')
                     //$('#submitBtn').show();
                   $("#submitBtn").attr("disabled", false);
                   $('.error').text('');
                     $('#enquiry')[0].reset();
                        $('#flashMessage').text(response.message).removeClass('error').addClass('success');
                    }
                 else{
                        $("#submitBtn").attr("disabled", false);
                        $('.error').text('');
                        // Print each error message
                        $.each(response.errors, function(key, value) {
                            $('#' + key + 'Error').text(value); // Update error span with error message
                        });



                 }   
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error(error);
            }
        });
    });
});
</script>
<style>
    #flashMessage {
        color: green;
    }
</style>