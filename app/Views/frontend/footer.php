<!-- ================================
       START FOOTER AREA
================================= -->
<section class="footer-area section-bg padding-top-100px padding-bottom-30px">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 responsive-column">
        <div class="footer-item">
          <div class="footer-logo padding-bottom-30px"> <a href="index.html" class="foot__logo"
                  ><img src="<?= base_url();  ?>/assets/hotel_management/images/logo.png" alt="logo"
                /></a> </div>
          <!-- end logo -->
          <p class="footer__desc"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
          <ul class="list-items pt-3">
            <li>
              <div class="footer-social-box">
                <ul class="social-profile">
                  <li> <a href="#"><i class="lab la-facebook-f"></i></a> </li>
                  <li> <a href="#"><i class="lab la-twitter"></i></a> </li>
                  <li> <a href="#"><i class="lab la-instagram"></i></a> </li>
                  <li> <a href="#"><i class="lab la-linkedin-in"></i></a> </li>
                </ul>
              </div>
            </li>
            <li>(+91) 123-456-7890</li>
            <li><a href="#">hotel_resorts@example.com</a></li>
          </ul>
        </div>
        <!-- end footer-item --> 
      </div>
      <!-- end col-lg-3 -->
      <div class="col-lg-3 responsive-column">
        <div class="footer-item">
          <h4
                class="title curve-shape pb-3 margin-bottom-20px"
                data-text="curvs"
              > Quick Links </h4>
          <ul class="list-items list--items">
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="faq.html">FAQ</a></li>
            <li><a href="contact.html">Contact</a></li>
          </ul>
        </div>
        <!-- end footer-item --> 
      </div>
      <!-- end col-lg-3 -->
      <div class="col-lg-6 responsive-column">
        <div class="footer-item">
          <h4
                class="title curve-shape pb-3 margin-bottom-20px"
                data-text="curvs"
              > Contact Us </h4>
          <div class="contact-form-action">
            <form method="post">
              <div class="row">
                <div class="col-lg-6 responsive-column">
                  <div class="input-box">
                    <label class="label-text">Your Name</label>
                    <div class="form-group"> <span class="la la-user form-icon"></span>
                      <input class="form-control" type="text" name="text" placeholder="Your name">
                    </div>
                  </div>
                </div>
                <!-- end col-lg-6 -->
                <div class="col-lg-6 responsive-column">
                  <div class="input-box">
                    <label class="label-text">Your Email</label>
                    <div class="form-group"> <span class="la la-envelope-o form-icon"></span>
                      <input class="form-control" type="email" name="email" placeholder="Email address">
                    </div>
                  </div>
                </div>
                <!-- end col-lg-6 -->
                <div class="col-lg-12">
                  <div class="input-box">
                    <label class="label-text">Message</label>
                    <div class="form-group"> <span class="la la-pencil form-icon"></span>
                      <textarea class="message-control form-control" style="height: 70px;" name="message" placeholder="Write message"></textarea>
                    </div>
                  </div>
                </div>
                <!-- end col-lg-12 -->
                <div class="col-lg-12">
                  <div class="btn-box">
                    <button class="theme-btn" type="submit">Submit</button>
                  </div>
                </div>
                <!-- end col-lg-12 --> 
              </div>
            </form>
          </div>
        </div>
        <!-- end footer-item --> 
      </div>
      <!-- end col-lg-3 --> 
    </div>
  </div>
  <!-- end container -->
  <div class="section-block mt-4"></div>
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-12">
        <div class="copy-right padding-top-30px text-center">
          <p class="copy__desc"> &copy; Copyright Hotel & Resorts 2023. Powered By <a href="https://matrixnodes.com/" target="_blank">Matrix Nodes</a> </p>
        </div>
        <!-- end copy-right --> 
      </div>
      
      <!-- end col-lg-5 --> 
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</section>
<!-- end footer-area --> 
<!-- ================================
       START FOOTER AREA
================================= --> 

<!-- start back-to-top -->
<div id="back-to-top"> <i class="la la-angle-up" title="Go top"></i> </div>
<!-- end back-to-top --> 

<!-- end modal-shared -->
<div class="modal-popup">
      <div
        class="modal fade"
        id="signupPopupForm"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <div>
                <h5 class="modal-title title" id="exampleModalLongTitle">
                  Sign Up
                </h5>
                <p class="font-size-14">Hello! Welcome Create a New Account</p>
              </div>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true" class="la la-close"></span>
              </button>
            </div>
            <div class="modal-body">
              <div class="contact-form-action">
              <div id="flashMessage" style="color: green;"></div> 
                <form method="post"  id="signupform">
                
                  <div class="btn-box">
                  <div class="input-box">
                    <label class="label-text">Username</label>
                    <div class="form-group">
                      <span class="la la-user form-icon"></span>
                      <input
                        class="form-control"
                        type="text"
                        name="username"
                        placeholder="Type your username" id="username"
                      />
                      <span id="usernameError" class="error" style="color: red;"> </span>
                    </div>
                  </div>
                  <!-- end input-box -->
                  <div class="input-box">
                    <label class="label-text">Email Address</label>
                    <div class="form-group">
                      <span class="la la-envelope form-icon"></span>
                      <input
                        class="form-control"
                        type="email"
                        name="email"
                        placeholder="Type your email" id="email" 
                      />
                      <span id="emailError" class="error" style="color: red;"></span>
                    </div>
                  </div>
                  <!-- end input-box -->
                  <div class="input-box">
                    <label class="label-text">Password</label>
                    <div class="form-group">
                      <span class="la la-lock form-icon"></span>
                      <input
                        class="form-control"
                        type="password"
                        name="password"
                        placeholder="Type password"  id='password'
                      />
                      <span id="passwordError" class="error" style="color: red;"></span>
                    </div>
                  </div>
                  <!-- end input-box -->
                  <div class="input-box">
                    <label class="label-text">Repeat Password</label>
                    <div class="form-group">
                      <span class="la la-lock form-icon"></span>
                      <input
                        class="form-control"
                        type="password"
                        name="cpassword"
                        placeholder="Type again password" id='cpassword'
                      />
                      <span id="cpasswordError" class="error" style="color: red;"></span>
                      <span id="passwordError" style="color: red;"></span>
                    </div>
                  </div>
                  <!-- end input-box -->
                  <div class="btn-box pt-3 pb-4">
                  <input type="submit" name="submit" class="theme-btn w-100" value="Register Account" id="submitBtnSignup">
                    <!-- <button type="button" class="theme-btn w-100">
                      Register Account
                    </button> -->
                  </div>
                  <div class="action-box text-center">
                    <p class="font-size-14">Or Sign up Using</p>
                    <ul class="social-profile py-3">
                      <li>
                        <a href="#" class="bg-5 text-white"
                          ><i class="lab la-facebook-f"></i
                        ></a>
                      </li>
                      <li>
                        <a href="#" class="bg-6 text-white"
                          ><i class="lab la-twitter"></i
                        ></a>
                      </li>
                      <li>
                        <a href="#" class="bg-7 text-white"
                          ><i class="lab la-instagram"></i
                        ></a>
                      </li>
                      <li>
                        <a href="#" class="bg-5 text-white"
                          ><i class="lab la-linkedin-in"></i
                        ></a>
                      </li>
                    </ul>
                  </div>
                </form>
              </div>
              <!-- end contact-form-action -->
            </div>
          </div>
        </div>
      </div>
</div>
<!-- end modal-popup -->

<!-- end modal-shared -->
<div class="modal-popup">
  <div
  class="modal fade"
  id="loginPopupForm"
  tabindex="-1"
  role="dialog"
  aria-hidden="true"
  >
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
      <div>
      <h5 class="modal-title title" id="exampleModalLongTitle2">
        Login
      </h5>
      <p class="font-size-14">Hello! Welcome to your account</p>
      </div>
      <button
      type="button"
      class="close"
      data-dismiss="modal"
      aria-label="Close"
      >
      <span aria-hidden="true" class="la la-close"></span>
      </button>
    </div>
    <div class="modal-body">
      <div class="contact-form-action">
      <form method="post" action="<?= base_url();  ?>/login">
        <div class="input-box">
        <?php if (session()->has('success')): ?>
     <div class="alert alert-success"><?= session('success') ?></div>
     <?php endif; ?>

     <?php if (session()->has('error')): ?>
     <div class="alert alert-danger"><?= session('error') ?></div>
     <?php endif; ?>
        <label class="label-text">Username</label>
        <div class="form-group">
          <span class="la la-user form-icon"></span>
          <input
          class="form-control"
          type="text"
          name="username"
          placeholder="Type your username" 
          />
        </div>
        </div>
        <!-- end input-box -->
        <div class="input-box">
        <label class="label-text">Password</label>
        <div class="form-group mb-2">
          <span class="la la-lock form-icon"></span>
          <input
          class="form-control"
          type="password"
          name="password"
          placeholder="Type your password" id="password"
          />
        </div>
        <div
          class="d-flex align-items-center justify-content-between"
        >
          <div class="custom-checkbox mb-0">
          <input type="checkbox" id="rememberchb" />
          <label for="rememberchb">Remember me</label>
          </div>
          <p class="forgot-password">
          <a href="recover.html">Forgot Password?</a>
          </p>
        </div>
        </div>
        <!-- end input-box -->
        <div class="btn-box pt-3 pb-4">
        <input type="submit" name="submit" value="Login Account" class="theme-btn w-100">
        <!-- <button type="button" class="theme-btn w-100">
          Login Account
        </button> -->
        </div>
        <div class="action-box text-center">
        <p class="font-size-14">Or Login Using</p>
        <ul class="social-profile py-3">
          <li>
          <a href="#" class="bg-5 text-white"
            ><i class="lab la-facebook-f"></i
          ></a>
          </li>
          <li>
          <a href="#" class="bg-6 text-white"
            ><i class="lab la-twitter"></i
          ></a>
          </li>
          <li>
          <a href="#" class="bg-7 text-white"
            ><i class="lab la-instagram"></i
          ></a>
          </li>
          <li>
          <a href="#" class="bg-5 text-white"
            ><i class="lab la-linkedin-in"></i
          ></a>
          </li>
        </ul>
        </div>
      </form>
      </div>
      <!-- end contact-form-action -->
    </div>
    </div>
  </div>
  </div>
</div>
<!-- end modal-popup -->  
 <script>
   
 </script> 
<!-- Template JS Files --> 
<script src="<?= base_url();  ?>/assets/hotel_management/js/jquery-3.4.1.min.js"></script> 
<script src="<?= base_url();  ?>/assets/hotel_management/js/jquery-ui.js"></script> 
<script src="<?= base_url();  ?>/assets/hotel_management/js/popper.min.js"></script> 
<script src="<?= base_url();  ?>/assets/hotel_management/js/bootstrap.min.js"></script> 
<script src="<?= base_url();  ?>/assets/hotel_management/js/bootstrap-select.min.js"></script> 
<script src="<?= base_url();  ?>/assets/hotel_management/js/moment.min.js"></script> 
<script src="<?= base_url();  ?>/assets/hotel_management/js/daterangepicker.js"></script> 
<script src="<?= base_url();  ?>/assets/hotel_management/js/owl.carousel.min.js"></script> 
<script src="<?= base_url();  ?>/assets/hotel_management/js/jquery.fancybox.min.js"></script> 
<script src="<?= base_url();  ?>/assets/hotel_management/js/jquery.countTo.min.js"></script> 
<script src="<?= base_url();  ?>/assets/hotel_management/js/animated-headline.js"></script> 
<script src="<?= base_url();  ?>/assets/hotel_management/js/jquery.ripples-min.js"></script> 
<script src="<?= base_url();  ?>/assets/hotel_management/js/quantity-input.js"></script> 
<script src="<?= base_url();  ?>/assets/hotel_management/js/main.js"></script> 
<script src="<?= base_url();  ?>/assets/hotel_management/js/jquery.superslides.min.js"></script> 
<script src="<?= base_url();  ?>/assets/hotel_management/js/superslider-script.js"></script>
<script src="<?= base_url();  ?>/assets/hotel_management/js/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#submitBtnSignup').click(function(e) {
        e.preventDefault(); //alert('hello');

        var formData = $('#signupform').serialize();
        $('.error').text('');
        //alert(formData);
         //$('#submitBtn').hide();
          //$("#submitBtn").attr("disabled", true);
           var name = $("#username").val();
           var email = $("#email").val();
           var password = $("#password").val();
           var cpassword = $("#cpassword").val();
           if(name===""){
            $('#usernameError').text('plz enter username');
            return false;
           
           }
           if(email===""){
            $('#emailError').text('plz enter email');
            return false;
           }
           if(password===""){
            $('#passwordError').text('plz enter password');
            return false;
           }
           if(cpassword===""){
            $('#cpasswordError').text('plz enter confirm password');
            return false;
           }
           if(cpassword !==password){
            $('#cpasswordError').text('please enter password and confirm password same');
            return false;
           }
        $.ajax({
            url: '<?php echo base_url();?>/signup',
            type: 'POST',
            data: formData,
            success: function(response) {
                // Handle success response
                if (response.success) { //alert('hello')
                     //$('#submitBtn').show();
                  // $("#submitBtn").attr("disabled", false);
                   $('.error').text('');
                     $('#signupform')[0].reset();
                        $('#flashMessage').text(response.message).removeClass('error').addClass('success');
                    }
                 else{
                        //$("#submitBtn").attr("disabled", false);
                        $('.error').text('');
                        // Print each error message
                        $.each(response.errors, function(key, value) {
                         // alert(response);
                            $('#' + key + 'Error').text(value); // Update error span with error message
                           //alert(value);
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

function validatefilterform() {

        
        $('.error').text('');  //remove previous error message
       
         var name = $("#destination").val(); // get value by id
         var room_number = $("#room_number").val();
         var adult_number = $("#adult_number").val();
           
           if(name===""){
            $('#destinationError').text('please enter  destination');  
            return false;
           
           }
           if(room_number==="0"){
            $('#room_numberError').text('please enter no. of room numbers');  
            return false;
           
           }
            if(adult_number==="0"){
            $('#adult_numberError').text('please enter number  of adult '); 
            return false;
           
           }
           
          
        
}; 

</script>

</body>
</html>