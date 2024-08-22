<?= view('frontend/header'); 
use App\Models\Hotel_Destination_model;
use App\Models\Hotel_Room_Model;
use App\Models\ReviewModel;
  ?>

<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area bread-bg-3">
  <div class="breadcrumb-wrap">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="breadcrumb-content">
            <div class="section-heading">
              <h2 class="sec__title text-white">Hotel Search Result</h2>
            </div>
          </div>
          <!-- end breadcrumb-content --> 
        </div>
        <!-- end col-lg-6 -->
        <div class="col-lg-6">
          <div class="breadcrumb-list text-right">
            <ul class="list-items">
              <li><a href="index.html">Home</a></li>
              <li>Search Result</li>
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
    START CARD AREA
================================= -->
<section class="card-area section--padding">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="filter-wrap margin-bottom-30px">
          <div class="filter-top d-flex align-items-center justify-content-between pb-4">
            <div>
              <h3 class="title font-size-24"><?=  $hotelCount ?> Hotels found</h3>
              <p class="font-size-14"><span class="mr-1 pt-1">Book with confidence:</span>No hotel booking fees</p>
            </div>
            <div class="layout-view d-flex align-items-center"> <a href="search-result1.html" data-toggle="tooltip" data-placement="top" title="Grid View"><i class="la la-th-large"></i></a> <a href="search-result.html" data-toggle="tooltip" data-placement="top" title="List View" class="active"><i class="la la-th-list"></i></a> </div>
          </div>
          <!-- end filter-top -->
         <!-- <div class="filter-bar d-flex align-items-center justify-content-between">
            <div class="filter-bar-filter d-flex flex-wrap align-items-center">
              <div class="filter-option">
                <h3 class="title font-size-16">Filter by:</h3>
              </div>
              <div class="filter-option">
                <div class="dropdown dropdown-contain"> <a class="dropdown-toggle dropdown-btn dropdown--btn" href="#" role="button" data-toggle="dropdown"> Filter Price </a>
                  <div class="dropdown-menu dropdown-menu-wrap">
                    <div class="dropdown-item">
                      <div class="slider-range-wrap">
                        <div class="price-slider-amount padding-bottom-20px">
                          <label for="amount" class="filter__label">Price:</label>
                          <input type="text" id="amount" class="amounts">
                        </div> -->
                        <!-- end price-slider-amount -->
                     <!--   <div id="slider-range"></div> -->
                        <!-- end slider-range --> 
                    <!--  </div> -->
                      <!-- end slider-range-wrap -->
                     <!-- <div class="btn-box pt-4">
                        <button class="theme-btn theme-btn-small theme-btn-transparent" type="button">Apply</button>
                      </div>
                    </div> -->
                    <!-- end dropdown-item --> 
                <!--  </div> -->
                  <!-- end dropdown-menu --> 
              <!--   </div> -->
                <!-- end dropdown --> 
           <!--   </div> -->
              <!-- <div class="filter-option">
                <div class="dropdown dropdown-contain"> <a class="dropdown-toggle dropdown-btn dropdown--btn" href="#" role="button" data-toggle="dropdown"> Review Score </a>
                  <div class="dropdown-menu dropdown-menu-wrap">
                    <div class="dropdown-item">
                      <div class="checkbox-wrap">
                        <div class="custom-checkbox">
                          <input type="checkbox" id="r1">
                          <label for="r1"> <span class="ratings d-flex align-items-center"> <i class="la la-star"></i> <i class="la la-star"></i> <i class="la la-star"></i> <i class="la la-star"></i> <i class="la la-star"></i> <span class="color-text-3 font-size-13 ml-1">(55.590)</span> </span> </label>
                        </div>
                        <div class="custom-checkbox">
                          <input type="checkbox" id="r2">
                          <label for="r2"> <span class="ratings d-flex align-items-center"> <i class="la la-star"></i> <i class="la la-star"></i> <i class="la la-star"></i> <i class="la la-star"></i> <i class="la la-star-o"></i> <span class="color-text-3 font-size-13 ml-1">(40.590)</span> </span> </label>
                        </div>
                        <div class="custom-checkbox">
                          <input type="checkbox" id="r3">
                          <label for="r3"> <span class="ratings d-flex align-items-center"> <i class="la la-star"></i> <i class="la la-star"></i> <i class="la la-star"></i> <i class="la la-star-o"></i> <i class="la la-star-o"></i> <span class="color-text-3 font-size-13 ml-1">(23.590)</span> </span> </label>
                        </div>
                        <div class="custom-checkbox">
                          <input type="checkbox" id="r4">
                          <label for="r4"> <span class="ratings d-flex align-items-center"> <i class="la la-star"></i> <i class="la la-star"></i> <i class="la la-star-o"></i> <i class="la la-star-o"></i> <i class="la la-star-o"></i> <span class="color-text-3 font-size-13 ml-1">(12.590)</span> </span> </label>
                        </div>
                        <div class="custom-checkbox">
                          <input type="checkbox" id="r5">
                          <label for="r5"> <span class="ratings d-flex align-items-center"> <i class="la la-star"></i> <i class="la la-star-o"></i> <i class="la la-star-o"></i> <i class="la la-star-o"></i> <i class="la la-star-o"></i> <span class="color-text-3 font-size-13 ml-1">(590)</span> </span> </label>
                        </div>
                      </div>
                    </div>  -->
                    <!-- end dropdown-item --> 
               <!--   </div> -->
                  <!-- end dropdown-menu --> 
             <!--   </div> -->
                <!-- end dropdown --> 
            <!--  </div> -->
          <!--    <div class="filter-option">
                <div class="dropdown dropdown-contain"> <a class="dropdown-toggle dropdown-btn dropdown--btn" href="#" role="button" data-toggle="dropdown"> Facilities </a>
                  <div class="dropdown-menu dropdown-menu-wrap">
                    <div class="dropdown-item">
                      <div class="checkbox-wrap">
                        <div class="custom-checkbox">
                          <input type="checkbox" id="catChb1">
                          <label for="catChb1">Pet Allowed</label>
                        </div>
                        <div class="custom-checkbox">
                          <input type="checkbox" id="catChb2">
                          <label for="catChb2">Groups Allowed</label>
                        </div>
                        <div class="custom-checkbox">
                          <input type="checkbox" id="catChb3">
                          <label for="catChb3">Tour Guides</label>
                        </div>
                        <div class="custom-checkbox">
                          <input type="checkbox" id="catChb4">
                          <label for="catChb4">Access for disabled</label>
                        </div>
                        <div class="custom-checkbox">
                          <input type="checkbox" id="catChb5">
                          <label for="catChb5">Room Service</label>
                        </div>
                        <div class="custom-checkbox">
                          <input type="checkbox" id="catChb6">
                          <label for="catChb6">Parking</label>
                        </div>
                        <div class="custom-checkbox">
                          <input type="checkbox" id="catChb7">
                          <label for="catChb7">Restaurant</label>
                        </div>
                        <div class="custom-checkbox">
                          <input type="checkbox" id="catChb8">
                          <label for="catChb8">Pet friendly</label>
                        </div>
                      </div>
                    </div> -->
                    <!-- end dropdown-item --> 
                <!--  </div> -->
                  <!-- end dropdown-menu --> 
             <!--   </div> -->
                <!-- end dropdown --> 
          <!--    </div> -->
          <!--  </div> -->
            <!-- end filter-bar-filter -->
           <!-- <div class="select-contain">
              <select class="select-contain-select">
                <option value="1">Short by default</option>
                <option value="2">Popular Hotel</option>
                <option value="3">Price: low to high</option>
                <option value="4">Price: high to low</option>
                <option value="5">A to Z</option>
              </select>
            </div> -->
            <!-- end select-contain --> 
       <!--   </div> -->
          <!-- end filter-bar --> 
        </div>
        <!-- end filter-wrap --> 
      </div>
      <!-- end col-lg-12 --> 
    </div>
    <!-- end row -->
    <div class="row">
      <div class="col-lg-4">
        <div class="sidebar mt-0">
        <form action="<?= base_url();  ?>/hotels_listing" class="row"  method="post">
          <div class="sidebar-widget">
            <h3 class="title stroke-shape">Search Hotels</h3>
            <div class="sidebar-widget-item">
              <div class="contact-form-action">
                <form action="<?= base_url();  ?>/hotels_listing" class="row"  method="post">
                  <div class="input-box">
                    <label class="label-text">Destination / hotel name</label>
                    <div class="form-group"> <span class="la la-map-marker form-icon"></span>
                      <input class="form-control" type="text"  placeholder="Destination, hotel name" id="destination" name="destination" value="<?=(isset($destination)) ?  set_value("destination", $destination) : set_value("destination");?> " required > 
                      <input type="hidden" <?=$active?> class="form-control" id="destination_id" name="destination_id" value="<?=(isset($destination_id)) ?  set_value("destination_id", $destination_id) : set_value("destination_id");?> ">
                    </div>
                  </div>
                  <div class="input-box">
                    <label class="label-text">Check in - Check out</label>
                    <div class="form-group"> <span class="la la-calendar form-icon"></span>
                      <input class="date-range form-control" type="text" name="daterange" value="<?=(isset($daterange)) ?  set_value("daterange", $daterange) : set_value("daterange");?>">
                    </div>
                  </div>
                  
              </div>
            </div>
            <!-- end sidebar-widget-item -->
            <div class="sidebar-widget-item">
              <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                <label class="font-size-16">Rooms</label>
                <div class="qtyBtn d-flex align-items-center">
                  <input type="text" name="room_number" value="<?=(isset($room_number)) ?  set_value("room", $room_number) : set_value("room");?>">
                </div>
              </div>
              <!-- end qty-box -->
              <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                <label class="font-size-16">Adults <span>18+</span></label>
                <div class="qtyBtn d-flex align-items-center">
                  <input type="text" name="adult_number" value="<?=(isset($adult_number)) ?  set_value("adult", $adult_number) : set_value("adult");?>">
                </div>
              </div>
              <!-- end qty-box -->
              <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                <label class="font-size-16">Children <span>2-12 years old</span></label>
                <div class="qtyBtn d-flex align-items-center">
                  <input type="text" name="child_number" value="<?=(isset($child_number)) ?  set_value("children", $child_number) : set_value("children");?>">
                </div>
              </div>
              <!-- end qty-box --> 
            </div>
            <!-- end sidebar-widget-item -->
            <div class="btn-box pt-2"> <!-- <a href="search-result.html" class="theme-btn">Search Now</a> --> 
            <input type="submit" name="submit" value="Search Now" class="theme-btn">
            </div>
          </div> 
                </form>
          <!-- end sidebar-widget -->
        <!--  <div class="sidebar-widget">
            <h3 class="title stroke-shape">Filter by Price</h3>
            <div class="sidebar-price-range">
              <div class="main-search-input-item">
                <div class="price-slider-amount padding-bottom-20px">
                  <label for="amount2" class="filter__label">Price:</label>
                  <input type="text" id="amount2" class="amounts">
                </div> -->
                <!-- end price-slider-amount -->
             <!--   <div id="slider-range2"></div> -->
                <!-- end slider-range --> 
           <!--   </div> -->
              <!-- end main-search-input-item -->
           <!--   <div class="btn-box pt-4">
                <button class="theme-btn theme-btn-small theme-btn-transparent" type="button">Apply</button>
              </div>
            </div>
          </div> -->
          <!-- end sidebar-widget -->
         <!--  <div class="sidebar-widget">
            <h3 class="title stroke-shape">Review Score</h3>
            <div class="sidebar-category">
              <div class="custom-checkbox">
                <input type="checkbox" id="r6">
                <label for="r6">Excellent</label>
              </div>
              <div class="custom-checkbox">
                <input type="checkbox" id="r7">
                <label for="r7">Very Good</label>
              </div>
              <div class="custom-checkbox">
                <input type="checkbox" id="r8">
                <label for="r8">Average</label>
              </div>
              <div class="custom-checkbox">
                <input type="checkbox" id="r9">
                <label for="r9">Poor</label>
              </div>
              <div class="custom-checkbox">
                <input type="checkbox" id="r10">
                <label for="r10">Terrible</label>
              </div>
            </div>
          </div> -->
          <!-- end sidebar-widget -->
         <!--  <div class="sidebar-widget">
            <h3 class="title stroke-shape">Filter by Rating</h3>
            <div class="sidebar-review">
              <div class="custom-checkbox">
                <input type="checkbox" id="s1">
                <label for="s1"> <span class="ratings d-flex align-items-center"> <i class="la la-star"></i> <i class="la la-star"></i> <i class="la la-star"></i> <i class="la la-star"></i> <i class="la la-star"></i> <span class="color-text-3 font-size-13 ml-1">(55.590)</span> </span> </label>
              </div>
              <div class="custom-checkbox">
                <input type="checkbox" id="s2">
                <label for="s2"> <span class="ratings d-flex align-items-center"> <i class="la la-star"></i> <i class="la la-star"></i> <i class="la la-star"></i> <i class="la la-star"></i> <i class="la la-star-o"></i> <span class="color-text-3 font-size-13 ml-1">(40.590)</span> </span> </label>
              </div>
              <div class="custom-checkbox">
                <input type="checkbox" id="s3">
                <label for="s3"> <span class="ratings d-flex align-items-center"> <i class="la la-star"></i> <i class="la la-star"></i> <i class="la la-star"></i> <i class="la la-star-o"></i> <i class="la la-star-o"></i> <span class="color-text-3 font-size-13 ml-1">(23.590)</span> </span> </label>
              </div>
              <div class="custom-checkbox">
                <input type="checkbox" id="s4">
                <label for="s4"> <span class="ratings d-flex align-items-center"> <i class="la la-star"></i> <i class="la la-star"></i> <i class="la la-star-o"></i> <i class="la la-star-o"></i> <i class="la la-star-o"></i> <span class="color-text-3 font-size-13 ml-1">(12.590)</span> </span> </label>
              </div>
              <div class="custom-checkbox mb-0">
                <input type="checkbox" id="s5">
                <label for="s5"> <span class="ratings d-flex align-items-center"> <i class="la la-star"></i> <i class="la la-star-o"></i> <i class="la la-star-o"></i> <i class="la la-star-o"></i> <i class="la la-star-o"></i> <span class="color-text-3 font-size-13 ml-1">(590)</span> </span> </label>
              </div>
            </div>
          </div> -->
          <!-- end sidebar-widget -->
        <!--  <div class="sidebar-widget">
            <h3 class="title stroke-shape">Facilities</h3>
            <div class="sidebar-category">
              <div class="custom-checkbox">
                <input type="checkbox" id="f1">
                <label for="f1">Air Conditioning</label>
              </div>
              <div class="custom-checkbox">
                <input type="checkbox" id="chb12">
                <label for="chb12">Airport Transport</label>
              </div>
              <div class="custom-checkbox">
                <input type="checkbox" id="f2">
                <label for="f2">Fitness Center</label>
              </div>
              <div class="custom-checkbox">
                <input type="checkbox" id="f3">
                <label for="f3">Flat Tv</label>
              </div>
              <div class="custom-checkbox">
                <input type="checkbox" id="f4">
                <label for="f4">Heater</label>
              </div>
              <div class="custom-checkbox">
                <input type="checkbox" id="f5">
                <label for="f5">Internet – Wifi</label>
              </div>
              <div class="collapse" id="facilitiesMenu">
                <div class="custom-checkbox">
                  <input type="checkbox" id="f6">
                  <label for="f6">Parking</label>
                </div>
                <div class="custom-checkbox">
                  <input type="checkbox" id="f7">
                  <label for="f7">Pool</label>
                </div>
                <div class="custom-checkbox">
                  <input type="checkbox" id="f8">
                  <label for="f8">Restaurant</label>
                </div>
                <div class="custom-checkbox">
                  <input type="checkbox" id="f9">
                  <label for="f9">Smoking Room</label>
                </div>
                <div class="custom-checkbox">
                  <input type="checkbox" id="f10">
                  <label for="f10">Spa &amp; Sauna</label>
                </div>
                <div class="custom-checkbox">
                  <input type="checkbox" id="f11">
                  <label for="f11">Washer &amp; Dryer</label>
                </div>
              </div>
              <a class="btn-text" data-toggle="collapse" href="#facilitiesMenu" role="button" aria-expanded="false" aria-controls="facilitiesMenu"> <span class="show-more">Show More <i class="la la-angle-down"></i></span> <span class="show-less">Show Less <i class="la la-angle-up"></i></span> </a> </div>
          </div> -->
          <!-- end sidebar-widget --> 
          
        </div>
        <!-- end sidebar --> 
      </div>
      <!-- end col-lg-4 -->
      <div class="col-lg-8">
      <?php foreach ($hoteldetails as $hoteldetail){
     ?>
        <div class="card-item card-item-list">
        
          <div class="card-img"> <a href="<?= base_url();  ?>/hotel_details/<?= $hoteldetail->id; ?>" class="d-block"> <img src="<?php  echo base_url(); ?>/uploads/hotel_detail/<?= $hoteldetail->hotel_photo;  ?>" alt="hotel-img" /> </a> <!-- <span class="badge">Bestseller</span> -->
           <!--  <div
                      class="add-to-wishlist icon-element"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="Bookmark"
                    > <i class="la la-heart-o"></i> </div> -->
          </div>
          <div class="card-body">
            <h3 class="card-title"> <a href="<?= base_url();  ?>/hotel_details/<?= $hoteldetail->id; ?>">
            <?= $hoteldetail->hotel_name;  ?></a>
             </h3>
            <p class="card-meta">
            <?php     $hotelDestination = new Hotel_Destination_model();
            $City_data = $hotelDestination->get_city_by_cityID($hoteldetail->city_id); 
           if (isset($City_data)) {
      
           echo $City_data->city; }  ?></p>
              <?php 
            $review = new ReviewModel();
            $ratingscount=0;

            $reviews= $review->asObject()->where('hotel_id', $hoteldetail->id)->findAll();
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
              
           echo  $reviewscount;   } ?> Reviews)</span> </div>
           <?php    }
                   }
               ?>
           
            <div
                      class="card-price d-flex align-items-center justify-content-between"
                    >
              <p> <span class="price__from">From</span> <span class="price__num">₹<?php $room_price = new Hotel_Room_Model();
          $room_price = $room_price->get_min_price($hoteldetail->id); 
         if (isset($room_price)) { echo $formattedValue = number_format( $room_price, 2); }  ?>
         </span> <span class="price__text">Per night</span></p>
              <a href="<?= base_url();  ?>/hotel_details/<?= $hoteldetail->id; ?>" class="btn-text"
                        >See details<i class="la la-angle-right"></i
                      ></a> </div>
          </div>
        </div> <?php  }  ?>
        
      </div>
      <!-- end col-lg-8 --> 
    </div>
    <!-- end row -->
    <div class="row">
      <div class="col-lg-12">
        <div class="btn-box mt-3 text-center">
          <button type="button" class="theme-btn"><i class="la la-refresh mr-1"></i>Load More</button>
          <p class="font-size-13 pt-2">Showing 1 - 6 of 2224 Hotels</p>
        </div>
        <!-- end btn-box --> 
      </div>
      <!-- end col-lg-12 --> 
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</section>
<!-- end card-area --> 
<!-- ================================
    END CARD AREA
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

<?= view('frontend/footer'); ?>
<script type="text/javascript">
 
 
 $("#destination")({  
    source: "<?php echo base_url();?>/get_destination", // path to the get_author method
    minLength: 2,
    select: function( event, ui ) {
      $("#destination_id").val(ui.item.id)
    }
  }); 

 document.getElementById("destination_id").value = "";
 document.getElementById("destination").value = "";
</script>