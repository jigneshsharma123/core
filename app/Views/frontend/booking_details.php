<?=   view('frontend/header'); 
use App\Models\Hotel_Destination_model;
use App\Models\ReviewModel;
 ?>

<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area bread-bg-4">
  <div class="breadcrumb-wrap">
    <div class="container">
      <div class="row align-items-center">
		  
        <div class="col-lg-6">
          <div class="breadcrumb-content">
            <div class="section-heading">
              <h2 class="sec__title text-white">Hotel Booking</h2>
            </div>
          </div>
          <!-- end breadcrumb-content --> 
        </div>
        <!-- end col-lg-6 -->
        <div class="col-lg-6">
          <div class="breadcrumb-list text-right">
            <ul class="list-items">
              <li><a href="index.html">Home</a></li>
              <li>Hotel Booking</li>
            </ul>
          </div>
          <!-- end breadcrumb-list --> 
        </div>
        <!-- end col-lg-6 --> 
      </div>
      <!-- end row --> 
    </div>
    <!-- end container --> 
  </div>
  <!-- end bread-svg --> 
</section>
<!-- end breadcrumb-area --> 
<!-- ================================
    END BREADCRUMB AREA
================================= --> 

<!-- ================================
    START BOOKING AREA
================================= -->
<section class="booking-area padding-top-100px padding-bottom-70px">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="form-box">
          <div class="form-title-wrap">
            <h3 class="title">Your Personal Information</h3>
          </div>
          <!-- form-title-wrap -->
          <div class="form-content ">
            <div class="contact-form-action">
              <form method="post" action="<?= base_url()  ?>/booking_request"  name='booking_form' id="booking_form" onsubmit="return validateForm()">
              <input type="hidden" value="<?= $hotel_detail->id; ?>" id="hotelId" name='hotelId'>
              <input type="hidden" value="<?= $reservation['room'] ?>" id="no_of_room" name='no_of_room'>
                <input type="hidden" value="<?= $room_id ?>" id="roomId" name='roomId'>
                <input type="hidden" value="<?= $reservation['room'] ?>" id="adult" name='adult'>
                <input type="hidden" value="<?= $reservation['children'] ?>" id="children" name='children'>
                <input type="hidden" value="<?= $reservation['daterange'] ?>" id="daterange" name='daterange'>
                <div class="row">
                  <div class="col-lg-6 responsive-column">
                    <div class="input-box">
                      <label class="label-text">First Name</label>
                      <div class="form-group"> <span class="la la-user form-icon"></span>
                        <input class="form-control" type="text" name="first_name" id="first_name" placeholder="First name" required="">
                        <span id="first_nameError" class="error" style="color: red;"> </span>
                      </div>
                    </div>
                  </div>
                  <!-- end col-lg-6 -->
                  <div class="col-lg-6 responsive-column">
                    <div class="input-box">
                      <label class="label-text">Last Name</label>
                      <div class="form-group"> <span class="la la-user form-icon"></span>
                        <input class="form-control" type="text" name="last_name" placeholder="Last name">
                      </div>
                    </div>
                  </div>
                  <!-- end col-lg-6 -->
                  <div class="col-lg-6 responsive-column">
                    <div class="input-box">
                      <label class="label-text">Your Email</label>
                      <div class="form-group"> <span class="la la-envelope-o form-icon"></span>
                        <input class="form-control" type="email" name="email" placeholder="Email address" id="email" required="">
                        <span id="emailError" class="error" style="color: red;"> </span>
                      </div>
                    </div>
                  </div>
                  <!-- end col-lg-6 -->
                  <div class="col-lg-6 responsive-column">
                    <div class="input-box">
                      <label class="label-text">Phone Number</label>
                      <div class="form-group"> <span class="la la-phone form-icon"></span>
                        <input class="form-control" type="text" name="phone_no" placeholder="Phone Number" id="phone_no" required="">
                        <span id="phone_noError" class="error" style="color: red;"> </span>
                      </div>
                    </div>
                  </div>
                  <!-- end col-lg-6 -->
                  <div class="col-lg-12">
                    <div class="input-box">
                      <label class="label-text">Address Line</label>
                      <div class="form-group"> <span class="la la-map-marked form-icon"></span>
                        <input class="form-control" type="text" name="address" placeholder="Address line" id="address" required="">
                        <span id="addressError" class="error" style="color: red;"> </span>
                      </div>
                    </div>
                  </div>
                  <!-- end col-lg-12 -->
                  <div class="col-lg-6 responsive-column">
                    <div class="input-box">
                      <label class="label-text">Country</label>
                      <div class="form-group">
                        <div class="select-contain w-auto">
                          <select class="select-contain-select" name="country" id="country" required="">
                          <option value="">Select Country</option>
                          <?php foreach ($countries as  $country) { ?>

                          <option value="<?= $country->id;  ?>"><?= $country->country_name;  ?></option>
                           
                             
                            <?php  } ?>
                          </select>
                          <span id="countryError" class="error" style="color: red;"> </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- end col-lg-6 -->
                  <div class="col-lg-6 responsive-column">
                    <div class="input-box">
                      <label class="label-text">City</label>
                      <div class="form-group">
                        <div class="select-contain w-auto">
                        <input class="form-control" type="text" name="city" placeholder="City " id="city" required="">
                          <!-- <select class="select-contain-select">
                            <option value="country-code">Select country code</option>
                            <option value="1">United Kingdom (+44)</option>
                            <option value="2">United States (+1)</option>
                            <option value="3">Bangladesh (+880)</option>
                            <option value="4">Brazil (+55)</option>
                            <option value="5">China (+86)</option>
                            <option value="6">India (+91)</option>
                          </select> -->
                          <span id="cityError" class="error" style="color: red;"> </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- end col-lg-6 -->
				  <div class="col-lg-12">
					<div class="btn-box">
          <input type="submit" name="submit" class="theme-btn" value="Booking Request" >
					  <!-- <button class="theme-btn" type="submit">Confirm Booking</button> -->
					</div>
				  </div>
				
                  <!-- end col-lg-12 --> 
                </div>
              </form>
            </div>
            <!-- end contact-form-action --> 
          </div>
          <!-- end form-content --> 
        </div>
      </div>
      <!-- end col-lg-8 -->
      <div class="col-lg-4">
        <div class="form-box booking-detail-form">
          <div class="form-title-wrap">
            <h3 class="title">Booking Details</h3>
          </div>
          <!-- end form-title-wrap -->
          <div class="form-content">
            <div class="card-item shadow-none radius-none mb-0">
              <div class="card-img pb-4"> <a href="hotel-details.html" class="d-block"> <img src="<?= base_url() ?>/uploads/hotel_details/<?= $hotel_detail->hotel_photo; ?>" alt="tour-img"> </a> </div>
              <div class="card-body p-0">
                <div class="d-flex justify-content-between">
                  <div>
                    <h3 class="card-title"><?= $hotel_detail->hotel_name; ?></h3>
                    <p class="card-meta">
                    <?php 
                    $hotelDestination = new Hotel_Destination_model();
                    $City_data = $hotelDestination->get_city_by_cityID($hotel_detail->city_id); 
                    if (isset($City_data)) {
      
                   echo $City_data->city; }  ?>
                   </p>
                  </div>
                  
                  <div> <a href="<?= base_url();  ?>/hotel_details/<?= $hotel_detail->id; ?>" class="btn ml-1"><i class="la la-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i></a> </div>
                </div>
                <?php 
                $review = new ReviewModel();
                $ratingscount=0;

                $reviews= $review->asObject()->where('hotel_id', $hotel_detail->id)->findAll();
                $reviewscount=count($reviews);
               if ($reviews !='') {
       //print_r($reviewscount); die;
              foreach ($reviews as $value)
             {
        
            $ratingscount=$ratingscount+$value->avg_rating;
     
     
            }
           if($reviewscount>0){ 
           $rating=$ratingscount/$reviewscount; ?>
          <div class="card-rating"> <span class="badge text-white"><?php if (isset($rating)) {
             
            echo number_format($rating, 1);  }?>/5</span> <span class="review__text">Average</span>
             <span class="rating__text">(<?php if (isset($reviewscount)) {
              
           echo  $reviewscount;   } ?> Reviews)
           </span> </div>


            <?php  }    } ?>
               
                <div class="section-block"></div>
                <ul class="list-items list-items-2 py-2">
                  <li><span>Check in:</span><?=  $checkIN;  ?> </li>
                  <li><span>Check out:</span><?=  $checkOut;  ?></li>
                </ul>
                <div class="section-block"></div>
                <h3 class="card-title pt-3 pb-2 font-size-15"><a href="hotel-details.html">Order Details</a></h3>
                <div class="section-block"></div>
                <ul class="list-items list-items-2 py-3">
                  <li><span>Room Type:</span>
                  <?php 
                        if (isset($room_details)) {
                           
                          
                   foreach ($room_details as  $value) {
                  
                    echo "$value->room_name(₹$value->price)"; 
                      echo " ";

                    } } ?></li>
                  <li><span>Room:</span><?= $reservation['room'] ?> </li>
                  <li><span> Room Price:</span><?php if (isset($room_price)) {
                    
                  echo $room_price; } ?></li> 
                  <li><span>Adults:</span><?= $reservation['adult']; ?></li>
                  <li><span>Children :</span><?= $reservation['children']; ?></li>
                  <li><span>Stay:</span><?php if (isset($stayIn)) {
                  
                  echo $stayIn; echo " "; echo "Nights"; }?>  </li>
                </ul>
                <div class="section-block"></div>
                <ul class="list-items list-items-2 pt-3">
                  <!-- <li><span>Sub Total:</span>₹<?php if (isset($subtotal)) {
                  
                  echo $subtotal; }?></li> -->
                 <!-- <li><span>Taxes And Fees:</span>₹2200</li> -->
                 <!--  <li><span>Total Price:</span>₹<?php if (isset($subtotal)) {
                  
                  echo $subtotal; }?></li> -->
                </ul>
              </div>
            </div>
            <!-- end card-item --> 
          </div>
          <!-- end form-content --> 
        </div>
        <!-- end form-box --> 
      </div>
      <!-- end col-lg-4 --> 
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</section>
<!-- end booking-area --> 
<!-- ================================
    END BOOKING AREA
================================= -->

<div class="section-block"></div>

<!-- ================================
    START INFO AREA
================================= -->
<section class="info-area info-bg padding-top-90px padding-bottom-70px">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 responsive-column"> <a href="#" class="icon-box icon-layout-2 d-flex">
        <div class="info-icon flex-shrink-0 bg-rgb text-color-2"> <i class="la la-phone"></i> </div>
        <!-- end info-icon-->
        <div class="info-content">
          <h4 class="info__title">Need Help? Contact us</h4>
          <p class="info__desc"> Lorem ipsum dolor sit amet, consectetur adipisicing </p>
        </div>
        <!-- end info-content --> 
        </a><!-- end icon-box --> 
      </div>
      <!-- end col-lg-4 -->
      <div class="col-lg-4 responsive-column"> <a href="#" class="icon-box icon-layout-2 d-flex">
        <div class="info-icon flex-shrink-0 bg-rgb-2 text-color-3"> <i class="la la-money"></i> </div>
        <!-- end info-icon-->
        <div class="info-content">
          <h4 class="info__title">Payments</h4>
          <p class="info__desc"> Lorem ipsum dolor sit amet, consectetur adipisicing </p>
        </div>
        <!-- end info-content --> 
        </a><!-- end icon-box --> 
      </div>
      <!-- end col-lg-4 -->
      <div class="col-lg-4 responsive-column"> <a href="#" class="icon-box icon-layout-2 d-flex">
        <div class="info-icon flex-shrink-0 bg-rgb-3 text-color-4"> <i class="la la-times"></i> </div>
        <!-- end info-icon-->
        <div class="info-content">
          <h4 class="info__title">Cancel Policy</h4>
          <p class="info__desc"> Lorem ipsum dolor sit amet, consectetur adipisicing </p>
        </div>
        <!-- end info-content --> 
        </a><!-- end icon-box --> 
      </div>
      <!-- end col-lg-4 --> 
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</section>
<!-- end info-area --> 
<!-- ================================
    END INFO AREA
================================= --> 

<!-- ================================
       START FOOTER AREA
================================= -->
<section class="footer-area section-bg padding-top-100px padding-bottom-30px">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 responsive-column">
        <div class="footer-item">
          <div class="footer-logo padding-bottom-30px"> <a href="index.html" class="foot__logo"
                  ><img src="images/logo.png" alt="logo"
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
                <form method="post">
                  <div class="input-box">
                    <label class="label-text">Username</label>
                    <div class="form-group">
                      <span class="la la-user form-icon"></span>
                      <input
                        class="form-control"
                        type="text"
                        name="text"
                        placeholder="Type your username"
                      />
                    </div>
                  </div>
                  <!-- end input-box -->
                  <div class="input-box">
                    <label class="label-text">Email Address</label>
                    <div class="form-group">
                      <span class="la la-envelope form-icon"></span>
                      <input
                        class="form-control"
                        type="text"
                        name="text"
                        placeholder="Type your email"
                      />
                    </div>
                  </div>
                  <!-- end input-box -->
                  <div class="input-box">
                    <label class="label-text">Password</label>
                    <div class="form-group">
                      <span class="la la-lock form-icon"></span>
                      <input
                        class="form-control"
                        type="text"
                        name="text"
                        placeholder="Type password"
                      />
                    </div>
                  </div>
                  <!-- end input-box -->
                  <div class="input-box">
                    <label class="label-text">Repeat Password</label>
                    <div class="form-group">
                      <span class="la la-lock form-icon"></span>
                      <input
                        class="form-control"
                        type="text"
                        name="text"
                        placeholder="Type again password"
                      />
                    </div>
                  </div>
                  <!-- end input-box -->
                  <div class="btn-box pt-3 pb-4">
                    <button type="button" class="theme-btn w-100">
                      Register Account
                    </button>
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
    <script src="<?= base_url();  ?>/assets/hotel_management/js/jquery-3.6.0.min.js"></script>
      

<script type="text/javascript">
function validateForm() {

        
        $('.error').text('');
       
           var name = $("#first_name").val();
           var email = $("#email").val();
           var phone_no = $("#phone_no").val();
           var country = $("#country").val();
           var address = $("#address").val();
           var city = $("#city").val();
           if(name===""){
            $('#first_nameError').text('please enter first name');
            return false;
           
           }
           if(email===""){
            $('#emailError').text('please enter email');
            return false;
           }
           if(phone_no===""){
            $('#phone_noError').text('please enter mobile number');
            return false;
           }
           if(address===""){
            $('#addressError').text('please enter address');
            return false;
           }
            
           if(country===""){
            $('#countryError').text('please select country');
            return false;
           }
           if(city===""){
            $('#cityError').text('please enter city');
            return false;
           }
           
          
        
};  </script>

      <?= view('frontend/footer'); ?>
