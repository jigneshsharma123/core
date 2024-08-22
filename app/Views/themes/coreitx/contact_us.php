<?php $data['theme'] = $theme_name; ?>
<?php $data_header['meta'] = (isset($meta)) ? $meta : ''; ?>

<?php helper("application_helper"); ?>

<?php echo view('themes/coreitx/header.php'); ?>
<?php echo view('themes/coreitx/banner.php',$data_header) ?>

        <!-- CONTACT INFO
        ================================================== -->
<!--        <section class="bg-light-gray">
            <div class="container">
                <div class="title-style2 text-center mb-2-9 mb-lg-6 wow fadeIn" data-wow-delay="100ms">
                    <span class="sub-title">Our Contact</span>
                    <h2 class="mb-0 h1">We’re Here to Help You</h2>
                </div>
                <div class="row mt-n4">
                    <div class="col-md-6 col-xl-4 mt-4 wow fadeInUp" data-wow-delay="200ms">
                        <div class="card card-style10 border-0 border-radius-10 ms-4 h-100">
                            <div class="card-heading mt-4 position-relative">
                                <h3 class="h5 mb-0 text-white">Location</h3>
                                <i class="icon-map display-7 text-white opacity2 position-absolute top-n10 end-0"></i>
                            </div>
                            <div class="card-body p-1-9">
                                <p class="mb-0">66 Guild Street 512B, Great North Town.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 mt-4 wow fadeInUp" data-wow-delay="400ms">
                        <div class="card card-style10 border-0 border-radius-10 ms-4 h-100">
                            <div class="card-heading mt-4 position-relative">
                                <h3 class="h5 mb-0 text-white">Phone</h3>
                                <i class="icon-mobile display-7 text-white opacity2 position-absolute top-n10 end-0"></i>
                            </div>
                            <div class="card-body p-1-9">
                                <p class="mb-1">+ (124) 1523-567-9874</p>
                                <p class="mb-0">(+44) 123 456 789</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 mt-4 wow fadeInUp" data-wow-delay="600ms">
                        <div class="card card-style10 border-0 border-radius-10 ms-4 h-100">
                            <div class="card-heading mt-4 position-relative">
                                <h3 class="h5 mb-0 text-white">Email</h3>
                                <i class="icon-chat display-7 text-white opacity2 position-absolute top-n10 end-0"></i>
                            </div>
                            <div class="card-body p-1-9">
                                <p class="mb-1">example@yourdomain.com</p>
                                <p class="mb-0">info@yourdomain.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
-->
        <!-- CONTACT FORM
        ================================================== -->
        <section class="section overflow-visible">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 wow fadeIn" data-wow-delay="400ms">
                        <div class="primary-shadow bg-white p-1-6 p-sm-2-9 rounded z-index-9 position-relative">
                            <h2 class="mb-1-9">Connect With Us</h2>
                            
                            <form class="contact quform" method="post" name="contactfrm" id="contactfrm">
                                <div class="quform-elements">
                                    <div class="row">

                                        <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="name">Your Name <span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="name" type="text" name="name" placeholder="Your name here"  required="" />
                                                    <span id="nameError" class="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Text input element -->

                                        <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="email">Your Email <span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="email" type="email" name="email" placeholder="Your email here" required="" />
                                                    <span id="emailError" class="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- End Text input element -->

                                        <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="subject">Your Subject <span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="subject" type="text" name="subject" placeholder="Your subject here"  required="" />
                                                     <span id="subjectError" class="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Text input element -->

                                        <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="phone">Contact Number</label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="phone" type="text" name="phone" placeholder="Your phone here" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Text input element -->

                                    </div>
                                    <div class="row">
                                        <!-- Begin Textarea element -->
                                        <div class="col-md-12">
                                            <div class="quform-element form-group">
                                                <label for="message">Message <span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <textarea class="form-control h-100" id="message" name="message" rows="3" placeholder="Tell us a few words"></textarea>
                                                    <span id="messageError" class="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Textarea element -->

                                        <!-- Begin Captcha element -->
                                        <!-- <div class="col-md-12">
                                            <div class="quform-element">
                                                <div class="form-group">
                                                    <div class="quform-input">
                                                        <input class="form-control" id="type_the_word" type="text" name="type_the_word" placeholder="Type the below word" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="quform-captcha">
                                                        <div class="quform-captcha-inner"> -->
                                                            <!-- <img src="quform/images/captcha/courier-new-light.png" alt="..."> -->
                                                     <!--   </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <!-- End Captcha element -->

                                        <!-- Begin Submit button -->
                                        <div class="col-md-12">
                                            <div class="quform-submit-inner"> <div id="flashMessage"></div>
                                                <!-- <button class="butn-style1" type="submit"><span>Send Message</span></button> -->
                                            <input type="submit" name="" value="Send Message" class="btn btn-success" id="submitBtn">
                                            </div>
                                            <div class="quform-loading-wrap text-start"><span class="quform-loading"></span></div>
                                        </div>
                                        <!-- End Submit button -->

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#submitBtn').click(function(e) {
        e.preventDefault();  //alert('hello');

        var formData = $('#contactfrm').serialize();

        //alert(formData);
         //$('#submitBtn').hide();
          //$("#submitBtn").attr("disabled", true);
        $.ajax({ //alert('hello');
            url: '<?php echo base_url();?>/contact_save',
            type: 'POST',
            data: formData,
            success: function(response) {
                // Handle success response
                if (response.success) { //alert('hello')
                     //$('#submitBtn').show();
                  // $("#submitBtn").attr("disabled", false);
                   $('.error').text('');
                     $('#contactfrm')[0].reset();
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

<?php echo view('themes/coreitx/footer.php'); ?>
