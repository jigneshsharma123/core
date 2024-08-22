<?=   view('frontend/header'); 
use App\Models\Country_model;
use App\Models\State_model;
use App\Models\Hotel_Destination_model;
use App\Models\ReviewModel;
?>

<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area bread-bg py-0 d-none">
  <div class="breadcrumb-wrap">
    <div class="container">
      <div class="row align-items-center">
      
        <div class="col-lg-6">
          <div class="breadcrumb-btn">
            <div class="btn-box"> <a class="theme-btn" data-fancybox="video" data-src="https://www.youtube.com/watch?v=5u1WISBbo5I"
                               data-speed="700"> <i class="la la-video-camera mr-2"></i>Video </a> <a class="theme-btn" data-src="images/img1.jpg"
                               data-fancybox="gallery"
                               data-caption="Showing image - 01"
                               data-speed="700"> <i class="la la-photo mr-2"></i>More Photos </a> </div>
            <a class="d-none"
                             data-fancybox="gallery"
                             data-src="images/img2.jpg"
                             data-caption="Showing image - 02"
                             data-speed="700"></a> 
      <a class="d-none"
                             data-fancybox="gallery"
                             data-src="images/img3.jpg"
                             data-caption="Showing image - 03"
                             data-speed="700"></a> 
      <a class="d-none"
                             data-fancybox="gallery"
                             data-src="images/img4.jpg"
                             data-caption="Showing image - 04"
                             data-speed="700"></a> 
      </div>
          <!-- end breadcrumb-btn --> 
        </div>
      
     <div class="col-lg-6">
          <div class="breadcrumb-list text-right">
            <ul class="list-items">
              <li><a href="index.html">Home</a></li>
              <li>Hotel Details</li>
            </ul>
          </div>
          <!-- end breadcrumb-list --> 
        </div>
      </div>
      <!-- end row --> 
    </div>
    <!-- end container --> 
  </div>
  <!-- end breadcrumb-wrap --> 
</section>
<!-- end breadcrumb-area --> 
<!-- ================================
    END BREADCRUMB AREA
================================= --> 

<!-- ================================
    START ROOM DETAIL BREAD
================================= -->
<section class="room-detail-bread">
    <div class="full-width-slider carousel-action">
        <div class="full-width-slide-item">
            <img src="<?= base_url(); ?>/uploads/hotel_details/<?= $hoteldetails['hotel_photo'] ?>" alt="">
        </div><!-- end full-width-slide-item -->
        <?php foreach ($hotel_images as $hotel_image){ ?>
        <div class="full-width-slide-item">
            <img src="<?= base_url(); ?>/uploads/hotel_details/hotel_image/<?= $hotel_image->image ?>" alt="">
        </div><!-- end full-width-slide-item -->
        <?php   } ?>
       <!-- end full-width-slide-item -->
    </div><!-- end full-width-slider -->
</section>
<!-- end room-detail-bread -->
<!-- ================================
    END ROOM DETAIL BREAD
================================= -->
  
<!-- ================================
    START TOUR DETAIL AREA
================================= -->
<section class="tour-detail-area padding-bottom-90px">
  <div class="single-content-navbar-wrap menu section-bg" id="single-content-navbar">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="single-content-nav" id="single-content-nav">
            <ul>
              <li><a data-scroll="description" href="#description" class="scroll-link active">Hotel Details</a></li>
              <li><a data-scroll="availability" href="#availability" class="scroll-link">Availability</a></li>
              <li><a data-scroll="amenities" href="#amenities" class="scroll-link">Amenities</a></li>
              <li><a data-scroll="faq" href="#faq" class="scroll-link">Faq</a></li>
              <li><a data-scroll="reviews" href="#reviews" class="scroll-link">Reviews</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end single-content-navbar-wrap -->
  <div class="single-content-box">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="single-content-wrap padding-top-60px">
            <div id="description" class="page-scroll">
              <div class="single-content-item pb-4">
                <h3 class="title font-size-26"><?= $hoteldetails['hotel_name'];  ?></h3>
                <div class="d-flex align-items-center pt-2">
                  <p class="mr-2"><?php     $hotelDestination = new Hotel_Destination_model();
                       $City_data = $hotelDestination->get_city_by_cityID($hoteldetails['city_id']); 
                     if (isset($City_data)) {
      
                        echo $City_data->city; }  ?></p>
                  <p> <span class="badge badge-warning text-white font-size-16"><?php if (isset($ratingcount)) {
                    
                 echo  number_format($ratingcount, 1);   }?></span> <span>(<?= $reviewscount;   ?> Reviews)</span> </p>
                </div>
              </div>
              <!-- end single-content-item -->
              <div class="section-block"></div>
              <div class="single-content-item py-4">
                <div class="row">
                  <div class="col-lg-4 responsive-column">
                    <div class="single-tour-feature d-flex align-items-center mb-3">
                      <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3"> <i class="la la-hotel"></i> </div>
                      <div class="single-feature-titles">
                        <h3 class="title font-size-15 font-weight-medium">Hotel Type</h3>
                        <span class="font-size-13"><?= $hoteldetails['hotel_type'];  ?></span> </div>
                    </div>
                    <!-- end single-tour-feature --> 
                  </div>
                  <!-- end col-lg-4 -->
                  <div class="col-lg-4 responsive-column">
                    <div class="single-tour-feature d-flex align-items-center mb-3">
                      <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3"> <i class="la la-user"></i> </div>
                      <div class="single-feature-titles">
                        <h3 class="title font-size-15 font-weight-medium">Extra People</h3>
                        <span class="font-size-13"><?= $hoteldetails['extra_people'];  ?></span> </div>
                    </div>
                    <!-- end single-tour-feature --> 
                  </div>
                  <!-- end col-lg-4 -->
                  <div class="col-lg-4 responsive-column">
                    <div class="single-tour-feature d-flex align-items-center mb-3">
                      <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3"> <i class="la la-bed"></i> </div>
                      <div class="single-feature-titles">
                        <h3 class="title font-size-15 font-weight-medium">Minimum Stay</h3>
                        <span class="font-size-13"><?= $hoteldetails['minimum_stay'];  ?></span> </div>
                    </div>
                    <!-- end single-tour-feature --> 
                  </div>
                  <!-- end col-lg-4 -->
                  <div class="col-lg-4 responsive-column">
                    <div class="single-tour-feature d-flex align-items-center mb-3">
                      <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3"> <i class="la la-money"></i> </div>
                      <div class="single-feature-titles">
                        <h3 class="title font-size-15 font-weight-medium">Security Deposit</h3>
                        <span class="font-size-13"><?= $hoteldetails['security_deposite']; ?></span> </div>
                    </div>
                    <!-- end single-tour-feature --> 
                  </div>
                  <!-- end col-lg-4 -->
                  <div class="col-lg-4 responsive-column">
                    <div class="single-tour-feature d-flex align-items-center mb-3">
                      <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3"> <i class="la la-globe"></i> </div>
                      <div class="single-feature-titles">
                        <h3 class="title font-size-15 font-weight-medium">Country</h3>
                        <span class="font-size-13">
                          <?php $country = new Country_model();
                        $country_data=$country->get_country_by_countryId($hoteldetails['country_id']);
                        if (isset($country_data)) {
                         echo $country_data->country_name;
                          } ?>
                        </span> </div>
                    </div>
                    <!-- end single-tour-feature --> 
                  </div>
                  <!-- end col-lg-4 -->
                  <div class="col-lg-4 responsive-column">
                    <div class="single-tour-feature d-flex align-items-center mb-3">
                      <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3"> <i class="la la-map"></i> </div>
                      <div class="single-feature-titles">
                        <h3 class="title font-size-15 font-weight-medium">City</h3>
                        <span class="font-size-13">
                       <?php     $hotelDestination = new Hotel_Destination_model();
                       $City_data = $hotelDestination->get_city_by_cityID($hoteldetails['city_id']); 
                       if (isset($City_data)) {
                        echo $City_data->city; }  ?>
                        </span> </div>
                    </div>
                    <!-- end single-tour-feature --> 
                  </div>
                  <!-- end col-lg-4 -->
                  <div class="col-lg-4 responsive-column">
                    <div class="single-tour-feature d-flex align-items-center mb-3">
                      <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3"> <i class="la la-user"></i> </div>
                      <div class="single-feature-titles">
                        <h3 class="title font-size-15 font-weight-medium">Neighborhood</h3>
                        <span class="font-size-13"><?= $hoteldetails['neighborhood'];  ?></span> </div>
                    </div>
                    <!-- end single-tour-feature --> 
                  </div>
                  <!-- end col-lg-4 -->
                  <div class="col-lg-4 responsive-column">
                    <div class="single-tour-feature d-flex align-items-center mb-3">
                      <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3"> <i class="la la-times"></i> </div>
                      <div class="single-feature-titles">
                        <h3 class="title font-size-15 font-weight-medium">Cancellation</h3>
                        <span class="font-size-13"><?= $hoteldetails['cancellation'];  ?></span> </div>
                    </div>
                    <!-- end single-tour-feature --> 
                  </div>
                  <!-- end col-lg-4 --> 
                </div>
                <!-- end row --> 
              </div>
              <!-- end single-content-item -->
              <div class="section-block"></div>
              <div class="single-content-item padding-top-40px padding-bottom-40px">
                <h3 class="title font-size-20">About <?= $hoteldetails['hotel_name'];  ?></h3>
                <p class="py-3"><?= $hoteldetails['description'];  ?></p>
              </div>
              <!-- end single-content-item -->
              <div class="section-block"></div>
            </div>
            <!-- end description -->
            <div id="availability" class="page-scroll">
              <div class="single-content-item padding-top-40px padding-bottom-30px">
                <!-- end contact-form-action -->
                <h3 class="title font-size-20">Available Rooms</h3>
                <?php $count=0; foreach ($hotel_rooms as $p_key){

                  $dataArray = json_decode($p_key['amenities'], true);
      
                  ?>
                <div class="cabin-type padding-top-30px">
                  <div class="cabin-type-item seat-selection-item d-flex">
                    <div class="cabin-type-img flex-shrink-0"> <img src="<?= base_url('/uploads/hotel_rooms/'.$p_key['room_image'])?>" alt=""> </div>
                    <div class="cabin-type-detail">
                      <h3 class="title"><?= $p_key['room_name'] ?></h3>
                      <div class="row padding-top-20px">
                      <?php

                       foreach ($dataArray as $key=>$amet){ 
                          if(array_key_exists($key, $Amenities_room_class)){
                           $classValue=$Amenities_room_class[$key] ;
                          }
                        ?>
                        <div class="col-lg-6 responsive-column">
                          <div class="single-tour-feature d-flex align-items-center mb-3">
                            <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2"> <i class="<?php if(isset($classValue)) { echo $classValue;} ?>"></i> </div>
                            <div class="single-feature-titles">
                              <h3 class="title font-size-15 font-weight-medium"><?= $amet ?></h3>
                            </div>
                          </div>
                        </div><?php } ?>
                        <!-- end col-lg-6 -->
                        
                        <!-- end col-lg-6 -->
                        
                        <!-- end col-lg-6 -->
                        
                        <!-- end col-lg-6 --> 
                      </div>
                      <!-- end row -->
                     <!-- <div class="room-photos"> <a class="btn theme-btn-hover-gray" data-src="<?= base_url('/uploads/hotel_rooms/'.$p_key['room_image'])?>"
                                                   data-fancybox="gallery"
                                                   data-caption="Showing image - 01"
                                                   data-speed="700"> <i class="la la-photo mr-2"></i>Room Photos </a> <!-- <a class="d-none"
                                                     data-fancybox="gallery"
                                                     data-src="images/Amritsar/Hotel_A_Star/Deluxe_Rooms/Deluxe_Rooms2.jpg"
                                                     data-caption="Showing image - 02"
                                                     data-speed="700"></a> <a class="d-none"
                                                     data-fancybox="gallery"
                                                     data-src="images/Amritsar/Hotel_A_Star/Deluxe_Rooms/Deluxe_Rooms3.jpg"
                                                     data-caption="Showing image - 03"
                                                     data-speed="700"></a> <a class="d-none"
                                                     data-fancybox="gallery"
                                                     data-src="images/Amritsar/Hotel_A_Star/Deluxe_Rooms/Deluxe_Rooms4.jpg"
                                                     data-caption="Showing image - 04"
                                                     data-speed="700"></a><a class="d-none"
                                                     data-fancybox="gallery"
                                                     data-src="images/Amritsar/Hotel_A_Star/Deluxe_Rooms/Deluxe_Rooms4.jpg"
                                                     data-caption="Showing image - 05"
                                                     data-speed="700"></a> --> <!-- </div> -->
                    </div>
                    <div class="cabin-price">
                      <p class="text-uppercase font-size-14">Per/night<strong class="mt-n1 text-black font-size-18 font-weight-black d-block">₹<?= $p_key['price']; ?></strong></>
                      <div class="custom-checkbox mb-0">
                        <input type="checkbox" id="selectChb<?= $count=$count+1; ?>"  value="<?= $p_key['id'];  ?>" >
                        <label for="selectChb<?= $count ?>" class="theme-btn theme-btn-small">Select</label>
                      </div>
                    </div>
                  </div>
                  <!-- end cabin-type-item --> 
                </div> <?php   } ?>
                <!-- end cabin-type -->
                
                <!-- end cabin-type -->
                
                <!-- end cabin-type -->
              </div>
              <!-- end single-content-item -->
              <div class="section-block"></div>
            </div>
            <!-- end location-map -->
            <div id="amenities" class="page-scroll">
              <div class="single-content-item padding-top-40px padding-bottom-20px">
                <h3 class="title font-size-20">Amenities</h3>
                <div class="amenities-feature-item pt-4">
                  <div class="row">
                  <?php $HoteldataArray = json_decode($hoteldetails['hotel_amenities'], true);   
                  foreach ($HoteldataArray as $key=> $amet)
                  {    
                    if(array_key_exists($key, $Hotel_Amenities_class))
                       {
                        $classValue=$Hotel_Amenities_class[$key];
                          }
                   ?>
                    <div class="col-lg-4 responsive-column">
                      <div class="single-tour-feature d-flex align-items-center mb-3">
                        <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3"> <i class="<?php if(isset($classValue)) { echo $classValue;} ?>"></i> </div>
                        <div class="single-feature-titles">
                          <h3 class="title font-size-15 font-weight-medium"><?= $amet    ?></h3>
                        </div>
                      </div>
                      <!-- end single-tour-feature --> 
                    </div> <?php  }  ?>
                    <!-- end col-lg-4 -->
                    
                   
                  </div>
                  <!-- end row --> 
                </div>
              </div>
              <!-- end single-content-item -->
              <div class="section-block"></div>
            </div>
            <!-- end faq -->
            <div id="faq" class="page-scroll">
              <div class="single-content-item padding-top-40px padding-bottom-40px">
                <h3 class="title font-size-20">FAQs</h3>
                <div class="accordion accordion-item padding-top-30px" id="accordionExample2">
                <?php $count=1; foreach ($faq_list as $e_key){
                     ?>
                  <div class="card">
                    <div class="card-header" id="faqHeadingFour">
                      <h2 class="mb-0">
                        <button class="btn btn-link d-flex align-items-center justify-content-end flex-row-reverse font-size-16" type="button" data-toggle="collapse" data-target="#faqCollapseFour<?= $count ?>" aria-expanded="true" aria-controls="faqCollapseFour"> <span class="ml-3"><?=  $e_key->question; ?></span> <i class="la la-minus"></i> <i class="la la-plus"></i> </button>
                      </h2>
                    </div>
                    <div id="faqCollapseFour<?= $count ?>" class="collapse " aria-labelledby="faqHeadingFour" data-parent="#accordionExample2">
                      <div class="card-body d-flex">
                        <p><?=  $e_key->answer; ?></p>
                      </div>
                    </div>
                  </div>
                  <?php $count++; }  ?> 
                </div>
              </div>
              <!-- end single-content-item -->
              <div class="section-block"></div>
            </div>
            <!-- end faq -->
            <div id="reviews" class="page-scroll">
              <div class="single-content-item padding-top-40px padding-bottom-40px">
                <h3 class="title font-size-20">Reviews</h3>
                <div class="review-container padding-top-30px">
                  <div class="row align-items-center">
                    <div class="col-lg-4">
                      <div class="review-summary">
                        <h2><?php if (isset($ratingcount)) {
                          
                      echo number_format($ratingcount, 1); } ?><span>/5</span></h2>
                        <p>Excellent</p>
                        <span>Based on <?= $reviewscount; ?> reviews</span> </div>
                    </div>
                    <!-- end col-lg-4 -->
                    <div class="col-lg-8">
                      <div class="review-bars">
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="progress-item">
                              <h3 class="progressbar-title">Service</h3>
                              <div class="progressbar-content line-height-20 d-flex align-items-center justify-content-between">
                                <div class="progressbar-box flex-shrink-0">
                                  <div class="progressbar-line" data-percent="70%">
                                    <div class="progressbar-line-item bar-bg-1"></div>
                                  </div>
                                  <!-- End Skill Bar --> 
                                </div>
                                <div class="bar-percent">4.6</div>
                              </div>
                            </div>
                            <!-- end progress-item --> 
                          </div>
                          <!-- end col-lg-6 -->
                          <div class="col-lg-6">
                            <div class="progress-item">
                              <h3 class="progressbar-title">Location</h3>
                              <div class="progressbar-content line-height-20 d-flex align-items-center justify-content-between">
                                <div class="progressbar-box flex-shrink-0">
                                  <div class="progressbar-line" data-percent="55%">
                                    <div class="progressbar-line-item bar-bg-2"></div>
                                  </div>
                                  <!-- End Skill Bar --> 
                                </div>
                                <div class="bar-percent">4.7</div>
                              </div>
                            </div>
                            <!-- end progress-item --> 
                          </div>
                          <!-- end col-lg-6 -->
                          <div class="col-lg-6">
                            <div class="progress-item">
                              <h3 class="progressbar-title">Value for Money</h3>
                              <div class="progressbar-content line-height-20 d-flex align-items-center justify-content-between">
                                <div class="progressbar-box flex-shrink-0">
                                  <div class="progressbar-line" data-percent="40%">
                                    <div class="progressbar-line-item bar-bg-3"></div>
                                  </div>
                                  <!-- End Skill Bar --> 
                                </div>
                                <div class="bar-percent">2.6</div>
                              </div>
                            </div>
                            <!-- end progress-item --> 
                          </div>
                          <!-- end col-lg-6 -->
                          <div class="col-lg-6">
                            <div class="progress-item">
                              <h3 class="progressbar-title">Cleanliness</h3>
                              <div class="progressbar-content line-height-20 d-flex align-items-center justify-content-between">
                                <div class="progressbar-box flex-shrink-0">
                                  <div class="progressbar-line" data-percent="60%">
                                    <div class="progressbar-line-item bar-bg-4"></div>
                                  </div>
                                  <!-- End Skill Bar --> 
                                </div>
                                <div class="bar-percent">3.6</div>
                              </div>
                            </div>
                            <!-- end progress-item --> 
                          </div>
                          <!-- end col-lg-6 -->
                          <div class="col-lg-6">
                            <div class="progress-item">
                              <h3 class="progressbar-title">Facilities</h3>
                              <div class="progressbar-content line-height-20 d-flex align-items-center justify-content-between">
                                <div class="progressbar-box flex-shrink-0">
                                  <div class="progressbar-line" data-percent="50%">
                                    <div class="progressbar-line-item bar-bg-5"></div>
                                  </div>
                                  <!-- End Skill Bar --> 
                                </div>
                                <div class="bar-percent">2.6</div>
                              </div>
                            </div>
                            <!-- end progress-item --> 
                          </div>
                          <!-- end col-lg-6 --> 
                        </div>
                        <!-- end row --> 
                      </div>
                    </div>
                    <!-- end col-lg-8 --> 
                  </div>
                </div>
              </div>
              <!-- end single-content-item -->
              <div class="section-block"></div>
            </div>
            <!-- end reviews -->
            <div class="review-box">
              <div class="single-content-item padding-top-40px">
                <h3 class="title font-size-20">Showing <?= $reviewscount; ?> guest reviews</h3>
                <div class="comments-list padding-top-50px">
                <?php foreach ($reviews as  $value) { 

                  $dateString = $value->created_at;
                 $date = date('F  d , Y', strtotime($dateString));
                  ?>
                  
                  <div class="comment">
                    <div class="comment-avatar"> <img class="avatar__img" alt="" src="<?= base_url() ?>/assets/hotel_management/images/male-user-placeholder.jpg"> </div>
                    <div class="comment-body">
                      <div class="meta-data">
                        <h3 class="comment__author"><?=  ucfirst($value->name ) ?></h3>
                        <div class="meta-data-inner d-flex"> <span class="ratings d-flex align-items-center mr-1"> <i class="la la-star"></i> <i class="la la-star"></i> <i class="la la-star"></i> <i class="la la-star"></i> <i class="la la-star"></i> </span>
                          <p class="comment__date"><?= $date ?></p>
                        </div>
                      </div>
                      <p class="comment-content"> <?= $value->message;  ?> </p>
                      <div class="comment-reply d-flex align-items-center justify-content-between"> <a class="theme-btn" href="#" data-toggle="modal" data-target="#replayPopupForm"> <span class="la la-mail-reply mr-1"></span>Reply </a>
                        <div class="reviews-reaction"> <a href="#" class="comment-like"><i class="la la-thumbs-up"></i> 13</a> <a href="#" class="comment-dislike"><i class="la la-thumbs-down"></i> 2</a> <a href="#" class="comment-love"><i class="la la-heart-o"></i> 5</a> </div>
                      </div>
                    </div>
                  </div>
                  <!-- end comments -->
                  <!-- <div class="comment comment-reply-item">
                    <div class="comment-avatar"> <img class="avatar__img" alt="" src="images/female-user-placeholder.jpg"> </div>
                    <div class="comment-body">
                      <div class="meta-data">
                        <h3 class="comment__author">Jenny Doe</h3>
                        <div class="meta-data-inner d-flex"> <span class="ratings d-flex align-items-center mr-1"> <i class="la la-star"></i> <i class="la la-star"></i> <i class="la la-star"></i> <i class="la la-star"></i> <i class="la la-star"></i> </span>
                          <p class="comment__date">April 5, 2019</p>
                        </div>
                      </div>
                      <p class="comment-content"> Lorem ipsum dolor sit amet, dolores mandamus moderatius ea ius, sed civibus vivendum imperdiet ei, amet tritani sea id. Ut veri diceret fierent mei, qui facilisi suavitate euripidis </p>
                      <div class="comment-reply d-flex align-items-center justify-content-between"> <a class="theme-btn" href="#" data-toggle="modal" data-target="#replayPopupForm"> <span class="la la-mail-reply mr-1"></span>Reply </a>
                        <div class="reviews-reaction"> <a href="#" class="comment-like"><i class="la la-thumbs-up"></i> 13</a> <a href="#" class="comment-dislike"><i class="la la-thumbs-down"></i> 2</a> <a href="#" class="comment-love"><i class="la la-heart-o"></i> 5</a> </div>
                      </div>
                    </div>
                  </div> --> <?php  }          ?>
                  <!-- end comments -->
                 
                  <!-- end comments -->
                  <div class="btn-box load-more text-center">
                    <button class="theme-btn theme-btn-small theme-btn-transparent" type="button">Load More Review</button>
                  </div>
                </div>
                <!-- end comments-list -->
                <div class="comment-forum padding-top-40px">
                  <div class="form-box">
                    <div class="form-title-wrap">
                      <h3 class="title">Write a Review</h3>
                    </div>
                    <!-- form-title-wrap -->
                    <form method="post" name="reviewfrm"  id="reviewfrm">
                    <div class="form-content">
                      <div class="rate-option p-2">
                        <div class="row">
                          <div class="col-lg-4 responsive-column">
                            <div class="rate-option-item">
                              <label>Service</label>
                              <div class="rate-stars-option">
                                <input type="checkbox" id="lst1" value="1" name="lst" class=" star-light submit_star">
                                <label for="lst1"></label>
                                <input type="checkbox" id="lst2" value="2" class="star-light submit_star" name="lst">
                                <label for="lst2"></label>
                                <input type="checkbox" id="lst3" value="3" class="star-light submit_star"  name="lst">
                                <label for="lst3"></label>
                                <input type="checkbox" id="lst4" value="4" class="star-light submit_star" name="lst">
                                <label for="lst4"></label>
                                <input type="checkbox" id="lst5" value="5" class="star-light submit_star" name="lst">
                                <label for="lst5"></label>
                              </div>
                            </div>
                          </div>
                          <!-- col-lg-4 -->
                          <div class="col-lg-4 responsive-column">
                            <div class="rate-option-item">
                              <label>Location</label>
                              <div class="rate-stars-option">
                                <input type="checkbox" id="l1" value="1" name="l" class="submitloc">
                                <label for="l1"></label>
                                <input type="checkbox" id="l2" value="2" name="l" class="submitloc">
                                <label for="l2"></label>
                                <input type="checkbox" id="l3" value="3" name="l" class="submitloc">
                                <label for="l3"></label>
                                <input type="checkbox" id="l4" value="4" name="l" class="submitloc">
                                <label for="l4"></label>
                                <input type="checkbox" id="l5" value="5" name="l" class="submitloc">
                                <label for="l5"></label>
                              </div>
                            </div>
                          </div>
                          <!-- col-lg-4 -->
                          <div class="col-lg-4 responsive-column">
                            <div class="rate-option-item">
                              <label>Value for Money</label>
                              <div class="rate-stars-option">
                                <input type="checkbox" id="vm1" value="1" name="vm" class="submitvm">
                                <label for="vm1"></label>
                                <input type="checkbox" id="vm2" value="2" name="vm" class="submitvm">
                                <label for="vm2"></label>
                                <input type="checkbox" id="vm3" value="3" name="vm" class="submitvm">
                                <label for="vm3"></label>
                                <input type="checkbox" id="vm4" value="4" name="vm" class="submitvm">
                                <label for="vm4"></label>
                                <input type="checkbox" id="vm5" value="5" name="vm" class="submitvm">
                                <label for="vm5" class="submitvm"></label>
                              </div>
                            </div>
                          </div>
                          <!-- col-lg-4 -->
                          <div class="col-lg-4 responsive-column">
                            <div class="rate-option-item">
                              <label>Cleanliness</label>
                              <div class="rate-stars-option">
                                <input type="checkbox" id="cln1" value="1" name="cln" class="submitcln">
                                <label for="cln1"></label>
                                <input type="checkbox" id="cln2" value="2" name="cln" class="submitcln">
                                <label for="cln2"></label>
                                <input type="checkbox" id="cln3" value="3" name="cln" class="submitcln">
                                <label for="cln3"></label>
                                <input type="checkbox" id="cln4" value="4" name="cln" class="submitcln">
                                <label for="cln4"></label>
                                <input type="checkbox" id="cln5" value="5" name="cln" class="submitcln">
                                <label for="cln5"></label>
                              </div>
                            </div>
                          </div>
                          <!-- col-lg-4 -->
                          <div class="col-lg-4 responsive-column">
                            <div class="rate-option-item">
                              <label>Facilities</label>
                              <div class="rate-stars-option">
                                <input type="checkbox" id="f1" value="1" name="f" class="submitfac">
                                <label for="f1"></label>
                                <input type="checkbox" id="f2" value="2" name="f" class="submitfac">
                                <label for="f2"></label>
                                <input type="checkbox" id="f3" value="3" name="f" class="submitfac">
                                <label for="f3"></label>
                                <input type="checkbox" id="f4" value="4" name="f" class="submitfac">
                                <label for="f4"></label>
                                <input type="checkbox" id="f5" value="5" name="f" class="submitfac">
                                <label for="f5"></label>
                              </div>
                            </div>
                          </div>
                          <!-- col-lg-4 --> 
                        </div>
                        <!-- end row --> 
                      </div>
                      <!-- end rate-option -->
                      <div class="contact-form-action">
                        <!-- <form method="post" action="<?php echo base_url();?>/review"> -->
                          <div class="row">
                            <div class="col-lg-6 responsive-column">
                              <div class="input-box">
                                <label class="label-text">Name</label>
                                <div class="form-group"> <span class="la la-user form-icon"></span>
                                  <input class="form-control" type="text" name="name" placeholder="Your name" id="name">
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-6 responsive-column">
                              <div class="input-box">
                                <label class="label-text">Email</label>
                                <div class="form-group"> <span class="la la-envelope-o form-icon"></span>
                                  <input class="form-control" type="email" name="email" placeholder="Email address" id="email">
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-12">
                              <div class="input-box">
                                <label class="label-text">Message</label>
                                <div class="form-group"> <span class="la la-pencil form-icon"></span>
                                  <textarea class="message-control form-control" name="message" placeholder="Write message" id="message"></textarea>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-12">
                            <div id="flashMessage" style="color: green;"></div>
                              <div class="btn-box">
                              <input type="submit" name="" value="Leave a Review" class="theme-btn" id="submitBtn">
                                <!-- <button type="button" class="theme-btn">Leave a Review</button> -->
                              </div>
                            </div>
                          </div>
                        
                      </div>
                      <!-- end contact-form-action --> 
                    </div>
                    <!-- end form-content --> 
                    </form>
                  </div>
                  <!-- end form-box --> 
                </div>
                <!-- end comment-forum --> 
              </div>
              <!-- end single-content-item --> 
            </div>
            <!-- end review-box --> 
          </div>
          <!-- end single-content-wrap --> 
        </div>
        <!-- end col-lg-8 -->
        <div class="col-lg-4">
          <div class="sidebar single-content-sidebar mb-0">
            <div class="sidebar-widget single-content-widget">
              <div class="sidebar-widget-item">
                <div class="sidebar-book-title-wrap mb-3">
                  <h3 class="title stroke-shape">Your Reservation</h3>
                </div>
              </div>
              <!-- end sidebar-widget-item -->
              <div class="sidebar-widget-item">
                <div class="contact-form-action">
                  <form action="<?= base_url()  ?>/booking_details"  method="post">
                  <input type="hidden" value="<?= $hoteldetails['id']; ?>" id="hotelId" name='hotelId'>
                   <input type="hidden" value="" id="roomId" name='roomId'>
                    <div class="input-box">
                      <label class="label-text">Check in - Check out</label>
                      <div class="form-group"> <span class="la la-calendar form-icon"></span>
                        <input class="date-range form-control" type="text" name="daterange" value="<?php 
                        echo "$daterange"; ?>" 
                        >
                      </div>
                    </div>
                    <div class="input-box">
                      <label class="label-text">Rooms</label>
                      <div class="form-group">
                        <div class="select-contain w-auto">
                          <select class="select-contain-select" name="room">
                            <option value="0">Select Rooms</option>
                            <option value="1" <?=(isset($room_number) and $room_number == 1) ? set_value("room","selected" ) : set_value('room'); ?>  >1 Room</option>
                            <option value="2" <?=(isset($room_number) and $room_number == 2) ? set_value("room","selected" ) : set_value('room'); ?>>2 Rooms</option>
                            <option value="3"<?=(isset($room_number) and $room_number == 3) ? set_value("room","selected" ) : set_value('room'); ?>>3 Rooms</option>
                            <option value="4"<?=(isset($room_number) and $room_number == 4) ? set_value("room","selected" ) : set_value('room'); ?>>4 Rooms</option>
                            <option value="5"<?=(isset($room_number) and $room_number == 5) ? set_value("room","selected" ) : set_value('room'); ?>>5 Rooms</option>
                            <option value="6"<?=(isset($room_number) and $room_number == 6) ? set_value("room","selected" ) : set_value('room'); ?>>6 Rooms</option>
                            <option value="7"<?=(isset($room_number) and $room_number == 7) ? set_value("room","selected" ) : set_value('room'); ?>>7 Rooms</option>
                            <option value="8"<?=(isset($room_number) and $room_number == 8) ? set_value("room","selected" ) : set_value('room'); ?>>8 Rooms</option>
                            <option value="9"<?=(isset($room_number) and $room_number == 9) ? set_value("room","selected" ) : set_value('room'); ?>>9 Rooms</option>
                            <option value="10"<?=(isset($room_number) and $room_number == 10) ? set_value("room","selected" ) : set_value('room'); ?>>10 Rooms</option>
                            <option value="11"<?=(isset($room_number) and $room_number == 11) ? set_value("room","selected" ) : set_value('room'); ?>>11 Rooms</option>
                            <option value="12"<?=(isset($room_number) and $room_number == 12) ? set_value("room","selected" ) : set_value('room'); ?>>12 Rooms</option>
                            <option value="13"<?=(isset($room_number) and $room_number == 13) ? set_value("room","selected" ) : set_value('room'); ?>>13 Rooms</option>
                            <option value="14"<?=(isset($room_number) and $room_number == 14) ? set_value("room","selected" ) : set_value('room'); ?>>14 Rooms</option>
                          </select>
                        </div>
                      </div>
                    </div>
                 
                </div>
              </div>
              <!-- end sidebar-widget-item -->
              <div class="sidebar-widget-item">
                <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                  <label class="font-size-16">Adults <span>Age 18+</span></label>
                  <div class="qtyBtn d-flex align-items-center">
                    <div class="qtyDec"><i class="la la-minus"></i></div>
                    <input type="text" name="adult" value="<?=(isset($adult_number)) ?  set_value("adult", $adult_number) : set_value("adult");?>">
                    <div class="qtyInc"><i class="la la-plus"></i></div>
                  </div>
                </div>
                <!-- end qty-box -->
                <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                  <label class="font-size-16">Children <span>2-12 years old</span></label>
                  <div class="qtyBtn d-flex align-items-center">
                    <div class="qtyDec"><i class="la la-minus"></i></div>
                    <input type="text" name="children" value="<?=(isset($child_number)) ?  set_value("children", $child_number) : set_value("children");?>">
                    <div class="qtyInc"><i class="la la-plus"></i></div>
                  </div>
                </div>
                <!-- end qty-box -->
                <!-- <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                  <label class="font-size-16">Infants <span>0-2 years old</span></label>
                  <div class="qtyBtn d-flex align-items-center">
                    <div class="qtyDec"><i class="la la-minus"></i></div>
                    <input type="text" name="qtyInput" value="0">
                    <div class="qtyInc"><i class="la la-plus"></i></div>
                  </div>
                </div> -->
                <!-- end qty-box --> 
              </div>
              <!-- end sidebar-widget-item -->
              <div class="btn-box pt-2"> <!-- <a href="<?= base_url()  ?>/booking_details" class="theme-btn text-center w-100 mb-2"><i class="la la-shopping-cart mr-2 font-size-18"></i>Book Now</a>  -->
              <input type="submit" name="submit" class="theme-btn" value="Book Now">
               </form>
                
              </div>
            </div>
            <!-- end sidebar-widget -->
            <?php echo   view("frontend/enquiry_form")  ?>
            <!-- end sidebar-widget -->
            <div class="sidebar-widget single-content-widget">
              <h3 class="title stroke-shape">Why Book With Us?</h3>
              <div class="sidebar-list">
                <ul class="list-items">
                  <li><i class="la la-dollar icon-element mr-2"></i>No-hassle best price guarantee</li>
                  <li><i class="la la-microphone icon-element mr-2"></i>Customer care available 24/7</li>
                  <li><i class="la la-thumbs-up icon-element mr-2"></i>Hand-picked Tours & Activities</li>
                  <li><i class="la la-file-text icon-element mr-2"></i>Free Travel Insureance</li>
                </ul>
              </div>
              <!-- end sidebar-list --> 
            </div>
            <!-- end sidebar-widget -->
            <div class="sidebar-widget single-content-widget">
              <h3 class="title stroke-shape">Get a Question?</h3>
              <p class="font-size-14 line-height-24">Do not hesitate to give us a call. We are an expert team and we are happy to talk to you.</p>
              <div class="sidebar-list pt-3">
                <ul class="list-items">
                  <li><i class="la la-phone icon-element mr-2"></i><a href="#">(+91) 123-456-7890</a></li>
                  <li><i class="la la-envelope icon-element mr-2"></i><a href="mailto:hotel_resorts@example.com">hotel_resorts@example.com</a></li>
                </ul>
              </div>
              <!-- end sidebar-list --> 
            </div>
            <!-- end sidebar-widget -->
          </div>
          <!-- end sidebar --> 
        </div>
        <!-- end col-lg-4 --> 
      </div>
      <!-- end row --> 
    </div>
    <!-- end container --> 
  </div>
  <!-- end single-content-box --> 
</section>
<!-- end tour-detail-area --> 
<!-- ================================
    END TOUR DETAIL AREA
================================= -->

<div class="section-block"></div>

<!-- ================================
    START RELATE TOUR AREA
================================= -->
<section class="related-tour-area section--padding">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-heading text-center">
        <?php  if (!empty($paticular_loc_hotels)) {
         
             ?>
          <h2 class="sec__title">You might also like</h2> <?php   } ?>
        </div>
        <!-- end section-heading --> 
      </div>
      <!-- end col-lg-12 --> 
    </div>
    <!-- end row -->
   
    
    <div class="row padding-top-50px">
    <?php foreach ($paticular_loc_hotels as  $paticular_loc_hotel) {
    
          ?>
      <div class="col-lg-4 responsive-column">
        <div class="card-item">
              <div class="card-img"> <a href="<?= base_url();  ?>/hotel_details/<?= $paticular_loc_hotel->id; ?> " class="d-block"> <img src="<?= base_url(); ?>/uploads/hotel_details/<?= $paticular_loc_hotel->hotel_photo ?>" alt="hotel-img" /> </a>
                <!-- <div
                      class="add-to-wishlist icon-element"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="Bookmark"
                    > <i class="la la-heart-o"></i> </div> -->
              </div>
              <div class="card-body">
                <h3 class="card-title"> <a href="hotel-details.html"
                        ><?= $paticular_loc_hotel->hotel_name; ?></a
                      > </h3>
                <p class="card-meta">
                   <?php     $hotelDestination = new Hotel_Destination_model();
                   $City_data = $hotelDestination->get_city_by_cityID($paticular_loc_hotel->city_id); 
                   if (isset($City_data)) {
                   echo $City_data->city; }  ?>
                </p>
                 <?php 
                 $review = new ReviewModel();
                 $ratingscount=0;

                 $reviews= $review->asObject()->where('hotel_id', $paticular_loc_hotel->id)->findAll();
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
             
            echo number_format($rating, 1);  }?>/5</span> <span class="review__text">Average</span> <span class="rating__text">(<?php if (isset($reviewscount)) {
              
           echo  $reviewscount;   } ?> Reviews)</span> </div>
           <?php    }
              } ?>
                
                <div
                      class="card-price d-flex align-items-center justify-content-between"
                    >
                  <p> <span class="price__from">From</span> <span class="price__num">₹1950.00</span> <span class="price__text">Per night</span> </p>
                  <a href="<?= base_url();  ?>/hotel_details/<?= $paticular_loc_hotel->id; ?>" class="btn-text"
                        >See details<i class="la la-angle-right"></i
                      ></a> </div>
              </div>
            </div>
        <!-- end card-item --> 
      </div><?php  }    ?><title>Welcome to An Hotels & Resorts</title>
      <!-- end col-lg-4 -->
    
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</section>
<!-- end related-tour-area -->
<script src="<?= base_url();  ?>/assets/hotel_management/js/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
  function Populate(){
    vals = $('input[type="checkbox"]:checked').map(function() { //alert(this.value);
        return this.value;
    }).get().join(',');
    console.log(vals);
    $('#roomId').val(vals);
}

$('input[type="checkbox"]').on('change', function() {
    Populate()
}).change();



$(document).ready(function(){
    

    function reset_background()
    { //alert('hello');
        for(var count = 1; count <= 5; count++)
        {

            $('#lst'+count).addClass('star-light');

            $('#lst'+count).removeClass('text-warning');

        }
    }

     $('.submit_star').click(function() {
          var rating = $(this).val();
          alert(rating);
        reset_background();

        for(var count = 1; count <= rating; count++)
        {

            $('#lst'+count).removeClass('star-light');

            $('#lst'+count).addClass('text-warning');
        }

    });

     $(document).on('click', '.submit_star', function(){

         serrating_data = $(this).val();

        

     });
  });  
  

    function reset_locbackground()
    { //alert('hello');
        for(var count = 1; count <= 5; count++)
        {

            $('#l'+count).addClass('star-light');

            $('#l'+count).removeClass('text-warning');

        }
    }
     $('.submitloc').click(function() {
          var locrating = $(this).val();
          //alert(locrating);
        reset_locbackground();

        for(var count = 1; count <= locrating; count++)
        {

            $('#l'+count).removeClass('star-light');

            $('#l'+count).addClass('text-warning');
        }   

    });

     $(document).on('click', '.submitloc', function(){

         locrating_data = $(this).val();  

     });


      function reset_vmbackground()
    { //alert('hello');
        for(var count = 1; count <= 5; count++)
        {

            $('#vm'+count).addClass('star-light');

            $('#vm'+count).removeClass('text-warning');

        }
    }
     $('.submitvm').click(function() {
          var vmrating = $(this).val();
          //alert(vmrating);
        reset_vmbackground();

        for(var count = 1; count <= vmrating; count++)
        {

            $('#vm'+count).removeClass('star-light');

            $('#vm'+count).addClass('text-warning');
        }

    });

   $(document).on('click', '.submitvm', function(){

         vmrating_data = $(this).val();  

     });  

    function reset_clnbackground()
    { //alert('hello');
        for(var count = 1; count <= 5; count++)
        {

            $('#cln'+count).addClass('star-light');

            $('#cln'+count).removeClass('text-warning');

        }
    }
     $('.submitcln').click(function() {
          var clnrating = $(this).val();
          //alert(clnrating);
        reset_clnbackground();

        for(var count = 1; count <= vmrating; count++)
        {

            $('#cln'+count).removeClass('star-light');

            $('#cln'+count).addClass('text-warning');
        }

    }); 

       $(document).on('click', '.submitcln', function(){

         clnrating_data = $(this).val();  

     }); 

   function reset_facbackground()
    { //alert('hello');
        for(var count = 1; count <= 5; count++)
        {

            $('#f'+count).addClass('star-light');

            $('#f'+count).removeClass('text-warning');

        }
    }
     $('.submitfac').click(function() {
          var facrating = $(this).val();
          //alert(facrating);
        reset_facbackground();

        for(var count = 1; count <= facrating; count++)
        {

            $('#f'+count).removeClass('star-light');

            $('#f'+count).addClass('text-warning');
        }

    });  
   $(document).on('click', '.submitfac', function(){

         facrating_data = $(this).val();  

     });  

  $('#submitBtn').click(function(e) {
        e.preventDefault(); //alert('hello');

         //$('#submitBtn').hide();
          //$("#submitBtn").attr("disabled", true);
           var name = $('#name').val();
            var email = $('#email').val();
             var message = $('#message').val();
        $.ajax({
            url: '<?php echo base_url();?>/review',
            type: 'POST',
            data: {serrating_data:serrating_data,locrating_data:locrating_data,vmrating_data:vmrating_data,clnrating_data:clnrating_data,facrating_data:facrating_data,name:name,email:email,message:message},
            success: function(response) {
                // Handle success response
                if (response.success) { //alert('hello')
                     //$('#submitBtn').show();
                   //$("#submitBtn").attr("disabled", false);
                   $('.error').text('');
                     $('#reviewfrm')[0].reset();
                        $('#flashMessage').text(response.message).removeClass('error').addClass('success');
                    }
                 else{
                        //$("#submitBtn").attr("disabled", false);
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


</script> 



<?= view('frontend/footer'); ?>