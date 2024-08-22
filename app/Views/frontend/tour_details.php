<?php  echo view('frontend/header'); 
use App\Models\Hotel_Destination_model;
use App\Models\Country_model;
use App\Models\State_model;
use App\Models\Hotel_Room_Model;
use App\Models\ReviewModel;
$state = new State_model();
$states = $state->get_states_by_stateId($tour_destinations->state_id); 
 $country = new Country_model(); 
$country_data=$country->get_country_by_countryId($tour_destinations->country_id);
 ?>

<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area bread-bg-2 py-0">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-btn">
                        <div class="btn-box">
                            <a class="theme-btn" data-fancybox="video" data-src="<?= $tour_destinations->video_url; ?>"
                               data-speed="700">
                                <i class="la la-video-camera mr-2"></i>Video
                            </a>
                            <a class="theme-btn" data-src="<?= base_url();  ?>/uploads/hotel_destinations/<?= $tour_destinations->photo; ?>"
                               data-fancybox="gallery"
                               data-caption="Showing image - 01"
                               data-speed="700">
                                <i class="la la-photo mr-2"></i>More Photos
                            </a>
                        </div>
                         <?php $count=1; foreach ($destination_images as $destination_image) {
                                  
                                   ?>
                        <a class="d-none"
                             data-fancybox="gallery"
                             data-src="<?= base_url(); ?>/uploads/hotel_destinations/destination_image/<?= $destination_image->image; ?>"
                             data-caption="Showing image - 0<?= $count=$count+1;  ?>"
                             data-speed="700"></a> <?php } ?>
                        
                    </div><!-- end breadcrumb-btn -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumb-wrap -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
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
                            <li><a data-scroll="description" href="#description" class="scroll-link active">Description</a></li>
                            <li><a data-scroll="itinerary" href="#itinerary" class="scroll-link">Itinerary</a></li>
                            <li><a data-scroll="photo" href="#photo" class="scroll-link">Photo</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end single-content-navbar-wrap -->
    <div class="single-content-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-content-wrap padding-top-60px">
                        <div id="description" class="page-scroll">
                            <div class="single-content-item">
                                <h3 class="title font-size-26"><?= $tour_destinations->city; ?></h3>
                                <div class="d-flex flex-wrap align-items-center pt-2">
                                    <p class="mr-2"><?php echo $states->state_name; ?>, <?php echo $country_data->country_name; ?></p>
                                    <p>
                                        <span class="badge badge-warning text-white font-size-16"><?php if (isset($rating)) {
                                           
                                        echo $rating; }?></span>
                                        <span>(<?php if (isset($destination_review)) {
                                            
                                        echo $destination_review;   } ?> Reviews)</span>
                                    </p>
                                </div>
                            </div><!-- end single-content-item -->
							
                            <div class="single-content-item padding-bottom-40px">
                                <p class="py-3"><?= $tour_destinations->description; ?></p>
                                <!-- end row -->
                                
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                        </div><!-- end description -->
                        <div id="itinerary" class="page-scroll">
                            <div class="single-content-item padding-top-40px padding-bottom-40px">
                                <h3 class="title font-size-20">Itinerary</h3>
                                <div class="accordion accordion-item padding-top-30px" id="accordionExample">
                                <?php  $count=0; foreach ($itineraries as  $itinerary) { ?>
                                  
                               
                                    <div class="card">
                                        <div class="card-header" id="faqHeadingOne">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link d-flex align-items-center justify-content-between font-size-16" type="button" data-toggle="collapse" data-target="#faqCollapseOne<?= $count=$count+1; ?>" aria-expanded="true" aria-controls="faqCollapseOne">
                                                    <span><?= $itinerary->title; ?></span>
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="faqCollapseOne<?= $count; ?>" class="collapse " aria-labelledby="faqHeadingOne" data-parent="#accordionExample">
                                            <div class="card-body d-flex align-items-center">
                                                <div class="flex-shrink-0 mt-2 mr-4">
                                                    <img src="<?= base_url(); ?>/uploads/hotel_destinations/desti_itinerary/<?= $itinerary->itinerary_photo;  ?>" alt="destination-img">
                                                </div>
                                                <p><?=  $itinerary->description; ?></p>
                                            </div>
                                        </div>
                                    </div> <?php } ?>   <!-- end card -->
                                </div>
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                        </div><!-- end itinerary -->
                        <div id="photo" class="page-scroll">
                            <div class="single-content-item padding-top-40px padding-bottom-40px">
                                <h3 class="title font-size-20">Photo</h3>
                                <div class="gallery-carousel carousel-action padding-top-30px">
                                <?php foreach ($destination_images as $destination_image) {
                                  
                                   ?>
                                    <div class="card-item mb-0">
                                        <div class="card-img">
                                            <img src="<?= base_url(); ?>/uploads/hotel_destinations/destination_image/<?= $destination_image->image; ?>" alt="Destination-img">
                                        </div>
                                    </div> <?php }  ?><!-- end card-item -->
                                </div><!-- end gallery-carousel -->
                            </div><!-- end single-content-item -->
                        </div><!-- end photo -->
                       
                    </div><!-- end single-content-wrap -->
                </div><!-- end col-lg-8 -->
                <div class="col-lg-4">
                <div class="sidebar single-content-sidebar mb-0">
                <div class="sidebar-widget single-content-widget">
							  <div class="sidebar-widget-item">
								<div class="sidebar-book-title-wrap mb-3">
								  <h3 class="title stroke-shape">Your Reservation</h3>
								</div>
							  </div><!-- end sidebar-widget-item -->
                            <div class="sidebar-widget-item">
                <div class="contact-form-action">
                  <form action="<?= base_url();  ?>/hotels_listing" class="row"  method="post">
                  <input class="form-control" type="hidden"  placeholder="Destination, hotel name" id="destination" name="destination" value="<?=(isset($tour_destinations)) ?  set_value("destination", $tour_destinations->city) : set_value("destination");?> "  > 
                   <input type="hidden"  class="form-control" id="destination_id" name="destination_id" value="<?= $tour_destinations->id; ?>" >
                    <div class="input-box">
                      <label class="label-text">Check in - Check out</label>
                      <div class="form-group"> <span class="la la-calendar form-icon"></span>
                        <input class="date-range form-control" type="text" name="daterange">
                      </div>
                    </div>
                    <!-- <div class="input-box">
                      <label class="label-text">Rooms</label>
                      <div class="form-group">
                        <div class="select-contain w-auto">
                          <select class="select-contain-select">
                            <option value="0">Select Rooms</option>
                            <option value="1">1 Room</option>
                            <option value="2">2 Rooms</option>
                            <option value="3">3 Rooms</option>
                            <option value="4">4 Rooms</option>
                            <option value="5">5 Rooms</option>
                            <option value="6">6 Rooms</option>
                            <option value="7">7 Rooms</option>
                            <option value="8">8 Rooms</option>
                            <option value="9">9 Rooms</option>
                            <option value="10">10 Rooms</option>
                            <option value="11">11 Rooms</option>
                            <option value="12">12 Rooms</option>
                            <option value="13">13 Rooms</option>
                            <option value="14">14 Rooms</option>
                          </select>
                        </div>
                      </div>
                    </div> -->
                  
                </div>
              </div><!-- end sidebar-widget-item -->
                            <div class="sidebar-widget-item">
                 <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                  <label class="font-size-16">Room <span></span></label>
                  <div class="qtyBtn d-flex align-items-center">
                    <div class="qtyDec"><i class="la la-minus"></i></div>
                    <input type="text" name="room_number" value="0">
                    <div class="qtyInc"><i class="la la-plus"></i></div>
                  </div>
                </div>           
                <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                  <label class="font-size-16">Adults <span>Age 18+</span></label>
                  <div class="qtyBtn d-flex align-items-center">
                    <div class="qtyDec"><i class="la la-minus"></i></div>
                    <input type="text" name="adult_number" value="0">
                    <div class="qtyInc"><i class="la la-plus"></i></div>
                  </div>
                </div>
                <!-- end qty-box -->
                <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                  <label class="font-size-16">Children <span>2-12 years old</span></label>
                  <div class="qtyBtn d-flex align-items-center">
                    <div class="qtyDec"><i class="la la-minus"></i></div>
                    <input type="text" name="child_number" value="0">
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
              </div><!-- end sidebar-widget-item -->
                            <div class="btn-box pt-2">
                                <!-- <a href="tour-booking.html" class="theme-btn text-center w-100 mb-2">Search Now</a> -->
                              <input type="submit" name="submit" value="Search Now" class="theme-btn">  
                            </div> </form>
                        </div><!-- end sidebar-widget -->
                        
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
                            </div><!-- end sidebar-list -->
                        </div><!-- end sidebar-widget -->
                        <div class="sidebar-widget single-content-widget">
                            <h3 class="title stroke-shape">Get a Question?</h3>
                            <p class="font-size-14 line-height-24">Do not hesitate to give us a call. We are an expert team and we are happy to talk to you.</p>
                            <div class="sidebar-list pt-3">
                                <ul class="list-items">
                                    <li><i class="la la-phone icon-element mr-2"></i><a href="#">(+91) 123-456-7890</a></li>
                                    <li><i class="la la-envelope icon-element mr-2"></i><a href="mailto:info@hotel_resorts.com">info@hotel_resorts.com</a></li>
                                </ul>
                            </div><!-- end sidebar-list -->
                        </div><!-- end sidebar-widget -->
                    </div><!-- end sidebar -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end single-content-box -->
</section><!-- end tour-detail-area -->
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
                <?php if (  !empty($paticular_loc_hotels)) {
                
                   ?>
                    <h2 class="sec__title">Hotels in <?= $tour_destinations->city; ?></h2>  <?php  }  ?>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row padding-top-50px">
        <?php foreach ($paticular_loc_hotels as  $paticular_loc_hotel) { ?>
       
            
            <div class="col-lg-4 responsive-column">
				
				
				<div class="card-item trending-card">
              <div class="card-img"> <a href="hotel-details.html" class="d-block"> <img src="<?php  echo base_url(); ?>/uploads/hotel_details/<?= $paticular_loc_hotel->hotel_photo;  ?>" alt="hotel-img" /> </a> <span class="badge">Bestseller</span>
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
      }
               ?>
                
                <div
                      class="card-price d-flex align-items-center justify-content-between"
                    >
                  <p> <span class="price__from">From</span> <span class="price__num">₹<?php $room_price = new Hotel_Room_Model();
        $room_price = $room_price->get_min_price($paticular_loc_hotel->id); 
        if (isset($room_price)) { echo $formattedValue = number_format( $room_price, 2);
      }  ?></span> <span class="price__text">Per night</span> </p>
                  <a href="<?= base_url();  ?>/hotel_details/<?= $paticular_loc_hotel->id; ?>" class="btn-text"
                        >See details<i class="la la-angle-right"></i
                      ></a> </div>
              </div>
            </div>
				
				
               <!-- end card-item -->
            </div> <?php  } ?> <!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end related-tour-area -->
<!-- ================================
    END RELATE TOUR AREA
================================= -->


<?php echo  view('frontend/footer'); ?>