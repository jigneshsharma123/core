<?php  echo view('frontend/header');
use App\Models\Hotel_Destination_model;
use App\Models\Hotel_Room_Model;
use App\Models\ReviewModel;
  ?>

<!-- ================================
    START HERO-WRAPPER AREA
================================= -->
<section class="hero-wrapper hero-wrapper7">
  <div class="hero-box">
    <div id="fullscreen-slide-contain">
      <ul class="slides-container">
      <?php  foreach ($banner_images as  $banner_image) {
        if (isset($banner_image->image)) {
          
        
         ?>
        <li><img src="<?= base_url();  ?>/uploads/hotel_banners/banner_gallery_image/<?= $banner_image->image; ?>" alt="" /></li>
        <?php  } } ?>
        <!-- <li><img src="<?= base_url();  ?>/assets/hotel_management/images/hero-bg1.jpg" alt="" /></li>
        <li><img src="<?= base_url();  ?>/assets/hotel_management/images/hero-bg2.jpg" alt="" /></li>
        <li><img src="<?= base_url();  ?>/assets/hotel_management/images/hero-bg3.jpg" alt="" /></li>
        <li><img src="<?= base_url();  ?>/assets/hotel_management/images/hero-bg4.jpg" alt="" /></li> -->
      </ul>
    </div>
    <!-- End background slider -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="hero-content pb-5">
            <div class="section-heading">
              <p class="sec__desc pb-2">
              <?php
              if (isset($banner_detail)) {
                 echo $banner_detail['title'];
              }
              ?></p>
              <h2 class="sec__title"> 
              <?php
              if (isset($banner_detail)) {
                 echo $banner_detail['description'];
              }
              ?>
              </h2>
            </div>
          </div>
          <!-- end hero-content -->
          <div class="search-fields-container">
            <div class="contact-form-action">
              <form action="<?= base_url();  ?>/hotels_listing" class="row"  method="post" name="destiForm" id="destiForm" onsubmit="return validatefilterform()">
                <div class="col-lg-3 pr-0">
                  <div class="input-box">
                    <label class="label-text"
                          >Destination / Hotel name</label
                        >
                    <div class="form-group"> <span class="la la-map-marker form-icon"></span>
                      <input
                            class="form-control"
                            type="text"
                            placeholder="Enter City or property" id="destination" name="destination"  required  
                          />
                          <input type="hidden" <?=$active?> class="form-control" id="destination_id" name="destination_id" >
                           <span id="destinationError" class="error" style="color: red;"></span>
  <br>
                    </div>
                  </div>
                </div>
                <!-- end col-lg-3 -->
                <div class="col-lg-3 pr-0">
                  <div class="input-box">
                    <label class="label-text">Check in - Check out</label>
                    <div class="form-group"> <span class="la la-calendar form-icon"></span>
                      <input
                            class="date-range form-control"
                            type="text"
                            name="daterange"
                          />
                    </div>
                  </div>
                </div>
                <!-- end col-lg-3 -->
               <!--  <div class="col-lg-3 pr-0">
                  <div class="input-box">
                    <label class="label-text">Room Type</label>
                    <div class="form-group">
                      <div
                            class="select-contain select-contain-shadow w-auto"
                          >
                        <select class="select-contain-select">
                          <option value="0">Select Type</option>
                          <option value="1">Single</option>
                          <option value="2">Double</option>
                          <option value="3">Triple</option>
                          <option value="4">Quad</option>
                          <option value="5">Queen</option>
                          <option value="6">King</option>
                          <option value="7">Twin</option>
                          <option value="8">Double-double</option>
                          <option value="9">Studio</option>
                          <option value="10">Suite</option>
                          <option value="11">Mini Suite</option>
                          <option value="12">President Suite</option>
                          <option value="13">President Suite</option>
                          <option value="14">Apartments</option>
                          <option value="15">Connecting rooms</option>
                          <option value="16">Murphy Room</option>
                          <option value="17">Accessible Room</option>
                          <option value="18">Cabana</option>
                          <option value="19">Adjoining rooms</option>
                          <option value="20">Adjacent rooms</option>
                          <option value="21">Villa</option>
                          <option value="22">Executive Floor</option>
                          <option value="23">Smoking room</option>
                          <option value="24">Non-Smoking Room</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div> -->
                <!-- end col-lg-3 -->
                <div class="col-lg-3">
                  <div class="input-box">
                    <label class="label-text">Guests and Rooms</label>
                    <div class="form-group">
                      <div class="dropdown dropdown-contain gty-container"> <a
                              class="dropdown-toggle dropdown-btn"
                              href="#"
                              role="button"
                              data-toggle="dropdown"
                              aria-expanded="false"
                            > <span
                                class="adult"
                                data-text="Adult"
                                data-text-multi="Adults"
                                >0 Adult</span
                              > - <span
                                class="children"
                                data-text="Child"
                                data-text-multi="Children"
                                >0 Child</span
                              > </a>
                        <div class="dropdown-menu dropdown-menu-wrap">
                          <div class="dropdown-item">
                            <div
                                  class="qty-box d-flex align-items-center justify-content-between"
                                >
                              <label>Rooms</label>
                              <div class="qtyBtn d-flex align-items-center">
                                <div class="qtyDec"> <i class="la la-minus"></i> </div>
                                <input
                                      type="text"
                                      name="room_number"
                                      value="0"
                                      class="qty-input"
                                     id="room_number"/>
                                    
                                <div class="qtyInc"> <i class="la la-plus"></i> </div>
                              </div>
                            </div>
                          </div>
                          <div class="dropdown-item">
                            <div
                                  class="qty-box d-flex align-items-center justify-content-between"
                                >
                              <label>Adults</label>
                              <div class="qtyBtn d-flex align-items-center">
                                <div class="qtyDec"> <i class="la la-minus"></i> </div>
                                <input
                                      type="text"
                                      name="adult_number"
                                      value="0" id="adult_number"
                                    />
                                <div class="qtyInc"> <i class="la la-plus"></i> </div>
                              </div>
                            </div>
                          </div>
                          <div class="dropdown-item">
                            <div
                                  class="qty-box d-flex align-items-center justify-content-between"
                                >
                              <label>Children</label>
                              <div class="qtyBtn d-flex align-items-center">
                                <div class="qtyDec"> <i class="la la-minus"></i> </div>
                                <input
                                      type="text"
                                      name="child_number"
                                      value="0"
                                    />
                                <div class="qtyInc"> <i class="la la-plus"></i> </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- .end dropdown-contain --> 
                    </div>
                    <span id="room_numberError" class="error" style="color: red;"> </span>
                    <span id="adult_numberError" class="error" style="color: red;"> </span>
                  </div>
                </div>
                <!-- end col-lg-3 -->
             
             <div class="col-lg-3 pr-0">
                  <div class="input-box">
                    <label class="label-text"></label>
                    <div class="form-group"> 
                    <div class="btn-box pt-2">
              <input type="submit" name="submit" value="Search Now" class="theme-btn">
               <!--<a href="<?= base_url();  ?>/hotels_listing" class="theme-btn"
                      >Search Now</a
                    > --> </div>
                      
                    </div>
                  </div>
                </div>
              <!-- <div class="btn-box pt-2">
              <input type="submit" name="submit" value="Search Now" class="theme-btn">
               <a href="<?= base_url();  ?>/hotels_listing" class="theme-btn"
                      >Search Now</a
                    >  </div>  --> </form>
            </div>
          </div>
        </div>
        <!-- end col-lg-12 --> 
      </div>
      <!-- end row --> 
    </div>
    <!-- end container --> 
  </div>
</section>
<!-- end hero-wrapper --> 
<!-- ================================
    END HERO-WRAPPER AREA
================================= --> 

<!-- ================================
    START INFO AREA
================================= -->
<section class="info-area info-bg padding-top-50px padding-bottom-50px text-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 responsive-column">
        <div class="icon-box icon-layout-2 d-flex align-items-center">
          <div class="info-icon flex-shrink-0 bg-rgb radius-round-full"> <img src="<?= base_url();  ?>/assets/hotel_management/images/browser.png" class="w-50" alt=""> </div>
          <!-- end info-icon-->
          <div class="info-content">
            <h4 class="info__title">Best Selection</h4>
            <p class="info__desc"> Praesent commodo cursus magna, vel scelerisque nisl
              consectetur et. </p>
          </div>
          <!-- end info-content --> 
        </div>
        <!-- end icon-box --> 
      </div>
      <!-- end col-lg-4 -->
      <div class="col-lg-4 responsive-column">
        <div class="icon-box icon-layout-2 d-flex align-items-center">
          <div class="info-icon flex-shrink-0 bg-rgb-2 radius-round-full"> <img src="<?= base_url();  ?>/assets/hotel_management/images/layout.png" class="w-50" alt=""> </div>
          <!-- end info-icon-->
          <div class="info-content">
            <h4 class="info__title">Best Price Guarantee</h4>
            <p class="info__desc"> Praesent commodo cursus magna, vel scelerisque nisl
              consectetur et. </p>
          </div>
          <!-- end info-content --> 
        </div>
        <!-- end icon-box --> 
      </div>
      <!-- end col-lg-4 -->
      <div class="col-lg-4 responsive-column">
        <div class="icon-box icon-layout-2 d-flex align-items-center">
          <div class="info-icon flex-shrink-0 bg-rgb-3 radius-round-full"> <img src="<?= base_url();  ?>/assets/hotel_management/images/support.png" class="w-50" alt=""> </div>
          <!-- end info-icon-->
          <div class="info-content">
            <h4 class="info__title">24/7 Support</h4>
            <p class="info__desc"> Praesent commodo cursus magna, vel scelerisque nisl
              consectetur et. </p>
          </div>
          <!-- end info-content --> 
        </div>
        <!-- end icon-box --> 
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

<div class="section-block"></div>

<!-- ================================
    START DESTINATION AREA
================================= -->
<section class="destination-area section--padding">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <div class="section-heading">
          <h2 class="sec__title"> Places to Visited</h2>
          <p class="sec__desc pt-3"> Experiencing the Culture and Energy of Top Travel Destinations </p>
        </div>
        
        <!-- end section-heading --> 
      </div>
    </div>
    <!-- end row -->
    <div class="row padding-top-50px">
      <div class="col-lg-4">
      <?php if (isset($homepage_destinations['0']['id']) ) {
        
         ?>
        <div class="card-item destination-card" onclick="window.location.href='<?= base_url()   ?>/tour_details/<?= $homepage_destinations['0']['id'];   ?>'">
          <div class="card-img"> <img src="<?= base_url();  ?>/uploads/hotel_destinations/<?= $homepage_destinations['0']['photo'];   ?>" alt="destination-img" />
            <!--                <span class="badge">new york</span>--> 
          </div>
          <div class="card-body">
            <h3 class="card-title"> <a href="<?= base_url()   ?>/tour_details/<?= $homepage_destinations['0']['id'];   ?>"> <?= $homepage_destinations['0']['city'];   ?></a> </h3>
            <div class="card-rating"> <span class="rating__text"><a href="<?= base_url()   ?>/tour_details/<?= $homepage_destinations['0']['id'];   ?>"><?=  substr($homepage_destinations['0']['description'], 0, 90);   ?>. . . . . . .</a></span> </div>
          </div>
        </div> 
      <?php } if (isset($homepage_destinations['1']['id']) ) {
        
         ?>
        <!-- end card-item -->
        <div class="card-item destination-card" onclick="window.location.href='<?= base_url()   ?>/tour_details/<?= $homepage_destinations['1']['id'];   ?>'">
          <div class="card-img"> <img src="<?= base_url();  ?>/uploads/hotel_destinations/<?= $homepage_destinations['1']['photo'];   ?>" alt="destination-img" /> 
            <!--                <span class="badge">chicago</span>--> 
          </div>
          <div class="card-body">
            <h3 class="card-title"> <a href="<?= base_url()   ?>/tour_details/<?= $homepage_destinations['1']['id'];   ?>"><?= $homepage_destinations['1']['city'];   ?></a> </h3>
            <div class="card-rating"> <span class="rating__text"><a href="tour-details.html"><?=  substr($homepage_destinations['1']['description'], 0, 90);   ?>. . . . . . .</a></span> </div>
          </div>
        </div> <?php  } ?>
        <!-- end card-item --> 
      </div>
      <!-- end col-lg-4 -->
      <div class="col-lg-4">
      <?php  if (isset($homepage_destinations['2']['id']) ) {
        
         ?>
        <div class="card-item destination-card" onclick="window.location.href='<?= base_url()   ?>/tour_details/<?= $homepage_destinations['2']['id'];   ?>'">
          <div class="card-img"> <img src="<?= base_url();  ?>/uploads/hotel_destinations/<?= $homepage_destinations['2']['photo'];   ?>" alt="destination-img" /> 
            <!--                <span class="badge">Hong Kong</span>--> 
          </div>
          <div class="card-body">
            <h3 class="card-title"> <a href="<?= base_url()   ?>/tour_details/<?= $homepage_destinations['2']['id'];   ?>"><?= $homepage_destinations['2']['city'];   ?></a> </h3>
            <div class="card-rating"> <span class="rating__text"><a href="<?= base_url()   ?>/tour_details/<?= $homepage_destinations['2']['id'];   ?>"><?=  substr($homepage_destinations['2']['description'], 0, 90);   ?>. . . . . . .</a></span> </div>
          </div>
        </div>
        <!-- end card-item -->
         <?php } if (isset($homepage_destinations['3']['id']) ) {
        
         ?>
        <div class="card-item destination-card" onclick="window.location.href='<?= base_url()   ?>/tour_details/<?= $homepage_destinations['3']['id'];   ?>'">
          <div class="card-img"> <img src="<?= base_url();  ?>/uploads/hotel_destinations/<?= $homepage_destinations['3']['photo'];   ?>" alt="destination-img" /> 
            <!--                <span class="badge">Las Vegas</span>--> 
          </div>
          <div class="card-body">
            <h3 class="card-title"> <a href="<?= base_url()   ?>/tour_details/<?= $homepage_destinations['3']['id'];   ?>"><?= $homepage_destinations['3']['city'];   ?></a> </h3>
            <div class="card-rating"> <span class="rating__text"><a href="<?= base_url()   ?>/tour_details/<?= $homepage_destinations['3']['id'];   ?>"><?=  substr($homepage_destinations['3']['description'], 0, 90);   ?>. . . . . . .</a></span> </div>
          </div>
        </div> <?php  } ?>
        <!-- end card-item --> 
      </div>
      <!-- end col-lg-4 -->
      <div class="col-lg-4">
      <?php  if (isset($homepage_destinations['4']['id']) ) {
        
         ?>
        <div class="card-item destination-card" onclick="window.location.href='<?= base_url()   ?>/tour_details/<?= $homepage_destinations['4']['id'];   ?>'">
          <div class="card-img"> <img src="<?= base_url();  ?>/uploads/hotel_destinations/<?= $homepage_destinations['4']['photo'];   ?>"> </div>
          <div class="card-body">
            <h3 class="card-title"> <a href="<?= base_url()   ?>/tour_details/<?= $homepage_destinations['4']['id'];   ?>"><?= $homepage_destinations['4']['city'];   ?></a> </h3>
            <div class="card-rating"> <span class="rating__text"><a href="<?= base_url()   ?>/tour_details/<?= $homepage_destinations['4']['id'];   ?>"><?=  substr($homepage_destinations['4']['description'], 0, 90);   ?>. . . . . . .</a></span> </div>
          </div>
        </div> <?php   } ?>
        <!-- end card-item --> 
      </div>
      <!-- end col-lg-4 --> 
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</section>
<!-- end destination-area --> 
<!-- ================================
    END DESTINATION AREA
================================= --> 

<!-- ================================
    START HOTEL AREA
================================= -->
<section class="hotel-area section-bg section-padding overflow-hidden padding-right-100px padding-left-100px">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-heading text-center">
          <h2 class="sec__title line-height-55"> Most Popular Hotel <br />
            Destinations </h2>
        </div>
        <!-- end section-heading --> 
      </div>
      <!-- end col-lg-12 --> 
    </div>
    <!-- end row -->
    <div class="row padding-top-50px">
      <div class="col-lg-12">
        <div class="hotel-card-wrap">
          <div class="hotel-card-carousel carousel-action">
          <?php foreach ($popular_hoteldetails as  $popular_hoteldetail) { ?>
          
     
            <div class="card-item mb-0">
              <div class="card-img"> <a href="<?= base_url();  ?>/hotel_details/<?= $popular_hoteldetail->id; ?>" class="d-block"> <img src="<?php  echo base_url(); ?>/uploads/hotel_details/<?= $popular_hoteldetail->hotel_photo;  ?>" alt="hotel-img" /> </a> <span class="badge"></span>
                <!-- <div
                      class="add-to-wishlist icon-element"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="Bookmark"
                    > <i class="la la-heart-o"></i> </div> -->
              </div>
              <div class="card-body">
                <h3 class="card-title"> <a href="<?= base_url();  ?>/hotel_details/<?= $popular_hoteldetail->id; ?>"
                        ><?= $popular_hoteldetail->hotel_name; ?></a
                      > </h3>
                <p class="card-meta"><?php     $hotelDestination = new Hotel_Destination_model();
        $City_data = $hotelDestination->get_city_by_cityID($popular_hoteldetail->city_id); 
        if (isset($City_data)) {
      
     echo $City_data->city; }  ?></p>
          <?php 
            $review = new ReviewModel();
           $ratingscount=0;

            $reviews= $review->asObject()->where('hotel_id', $popular_hoteldetail->id)->findAll();
        $reviewscount=count($reviews);
       //print_r($reviewscount); die;
    foreach ($reviews as $value)
     {
        
      $ratingscount=$ratingscount+$value->avg_rating;
     
     
     }
       $rating=$ratingscount/$reviewscount;


               ?>
                <div class="card-rating"> <span class="badge text-white"><?= number_format($rating, 1) ?>/5</span> <span class="review__text">Average</span> <span class="rating__text">(<?= $reviewscount;  ?> Reviews)</span> </div>
                <div
                      class="card-price d-flex align-items-center justify-content-between"
                    >
                  <p> <span class="price__from">From</span> <span class="price__num">₹<?php $room_price = new Hotel_Room_Model();
        $room_price = $room_price->get_min_price($popular_hoteldetail->id); 
        if (isset($room_price)) { echo $formattedValue = number_format( $room_price, 2);
      }  ?></span> <span class="price__text">Per night</span> </p>
                  <a href="<?= base_url();  ?>/hotel_details/<?= $popular_hoteldetail->id; ?>" class="btn-text"
                        >See details<i class="la la-angle-right"></i
                      ></a> </div>
              </div>
            </div> <?php   }   ?>
          </div>
          <!-- end hotel-card-carousel --> 
        </div>
      </div>
      <!-- end col-lg-12 --> 
    </div>
    <!-- end row --> 
  </div>
  <!-- end container-fluid --> 
</section>
<!-- end hotel-area --> 
<!-- ================================
    END HOTEL AREA
================================= --> 

<!-- ================================
       START TESTIMONIAL AREA
================================= -->
<section class="testimonial-area section-padding">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-heading text-center mb-0">
          <h2 class="sec__title">Our Happy Travelers</h2>
        </div>
        <!-- end section-heading --> 
      </div>
      <!-- end col-lg-12 --> 
    </div>
    <!-- end row  -->
    <div class="row padding-top-50px">
      <div class="col-lg-12">
        <div class="testimonial-carousel carousel-action">
        <?php foreach ($reviews as  $review) {
         
                ?>
          <div class="testimonial-card">
            <div class="testi-desc-box">
              <p class="testi__desc"> <?= $review->message;  ?> </p>
            </div>
            <div class="author-content d-flex align-items-center">
              <div class="author-bio">
                <h4 class="author__title"><?= $review->name;  ?></h4>
               <!--- <span class="author__meta">United States</span> --> <span class="ratings d-flex align-items-center"> <i class="la la-star"></i> <i class="la la-star"></i> <i class="la la-star"></i> <i class="la la-star"></i> <i class="la la-star"></i> </span> </div>
            </div>
          </div>  <?php    }   ?>
          <!-- end testimonial-card -->
         
          <!-- end testimonial-card -->
          
          <!-- end testimonial-card -->
          
          <!-- end testimonial-card --> 
        </div>
        <!-- end testimonial-carousel --> 
      </div>
      <!-- end col-lg-12 --> 
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</section>
<!-- end testimonial-area --> 
<!-- ================================
       START TESTIMONIAL AREA
================================= --> 

<?php echo  view('frontend/footer'); ?>
<script type="text/javascript">
 
 
 $("#destination").autocomplete({  
    source: "<?php echo base_url();?>/get_destination", // path to the get_author method
    minLength: 2,
    select: function( event, ui ) {
      $("#destination_id").val(ui.item.id)
    }
  }); 

 document.getElementById("destination_id").value = "";
 document.getElementById("destination").value = "";
</script>


