<?php
namespace App\Controllers\frontend;
use App\Controllers\BaseController;
use App\Models\HotelDetail;
use App\Models\Hotel_Destination_model;
use App\Models\Hotel_Room_Model;
use App\Models\Hotel_faqs_model;
use App\Models\Hotel_image_model;
use App\Models\Hotel_Enquiry_model;
use App\Models\ReviewModel;
use App\Models\Hotel_Desti_Itinerary_model;
use App\Models\Hotel_Desti_image_model;
use App\Models\Country_model;
use App\Models\Hotel_Booking_model;
use App\Models\Hotel_Banner_model;
use App\Models\Hotel_Banner_Image_Model;


class Index extends BaseController
{    
      public function __construct()
    { 
      helper('form');
      $this->session = \Config\Services::session();

    }
    public function index()
    {   
        $hotelbanner = new Hotel_Banner_model();
        $banner_detail= $hotelbanner->where('page','Home')->first();
        $bannerGalleryImage = new Hotel_Banner_Image_Model();
        $bannerImage=  $bannerGalleryImage->asObject()->where('banner_id',$banner_detail['id'])->findAll();
        //echo "<pre>"; print_r($bannerGalleryImage); die;
        $hoteldetails = new HotelDetail();
        $hoteldetails=$hoteldetails->get_popular_hotel(); 
        $this->mViewData['popular_hoteldetails'] = $hoteldetails;
        $hotelDestination = new Hotel_Destination_model();
        $desti_home=$hotelDestination->get_desti_display_on_homepage(); 
        $review = new ReviewModel();
        $review= $review->get_review_for_homepage();
         //print_r($review); die;
        $this->mViewData['banner_detail']=$banner_detail;
        $this->mViewData['banner_images']=$bannerImage;
        $this->mViewData['reviewscount']=Count($review);
        $this->mViewData['reviews'] = $review;
        $this->mViewData['homepage_destinations'] = $desti_home;
        $this->mViewData['active'] = '';
        return view('frontend/index',$this->mViewData);
    }

    
    public function search_result()
    {  
        $hoteldetails = new HotelDetail();
        
        $session = \Config\Services::session();
        $session->set('destination', $_POST['destination']);
        $session->set('daterange', $_POST['daterange']);
        $session->set('room_number', $_POST['room_number']);
        $session->set('adult_number', $_POST['adult_number']);
        $session->set('child_number', $_POST['child_number']);

        if ($_POST['destination_id'] !='') {
          $hoteldetails=$hoteldetails->get_hotel($_POST['destination_id']);  
           $session->set('destination_id', $_POST['destination_id']);
        }else{
                
            $hoteldetails=$hoteldetails->get_hotel($_POST['destination']); 
           // print_r($hoteldetails); die;
        }
        $this->mViewData['destination']=$_POST['destination'];
        $this->mViewData['daterange']=$_POST['daterange'];
        $this->mViewData['room_number']=$_POST['room_number'];
        $this->mViewData['adult_number']=$_POST['adult_number'];
        $this->mViewData['child_number']=$_POST['child_number'];
        $this->mViewData['active'] = '';
        $this->mViewData['hoteldetails'] = $hoteldetails;
        $this->mViewData['hotelCount']=count($this->mViewData['hoteldetails']);

    	 return view('frontend/search_result',$this->mViewData);

    }

    public function hotel_details($id)
    {   
          
       $session = \Config\Services::session();
       $hoteldetails = new HotelDetail(); 
        //$hoteldetails->get_hotel_detail();
       $hoteldetail = $hoteldetails->find($id);
       $this->mViewData['destination']=$session->get('destination');
       $this->mViewData['daterange']=$session->get('daterange');
       $this->mViewData['room_number']=$session->get('room_number');
       $this->mViewData['adult_number']=$session->get('adult_number');
       $this->mViewData['child_number']=$session->get('child_number');

       $this->mViewData['Hotel_Amenities_class'] = unserialize(Hotel_Amenities_class);
       $this->mViewData['Amenities_room_class'] = unserialize(Amenities_room_class);
       $hotelRooms = new Hotel_Room_Model();
       $HotelRoom=$hotelRooms->where('hotel_id', $id)->find();
       $paticular_loc_hotel = $hoteldetails->get_hotel_by_cityId($hoteldetail['city_id']);
       $this->mViewData['paticular_loc_hotels']=$paticular_loc_hotel;
       $hotel_faq = new Hotel_faqs_model();
       $faq= $hotel_faq->asObject()->findAll();
       $this->mViewData['faq_list'] = $faq;
       $review = new ReviewModel();
       $reviews= $review->asObject()->where('hotel_id', $id)->findAll();
       $avgcount=0;
       foreach ($reviews as  $value) {

       $avgcount=$avgcount+ $value->avg_rating;
       
        }
       $reviewCounts=Count($reviews);
       $this->mViewData['reviewscount']=$reviewCounts;
       if($reviewCounts>0){
       $this->mViewData['ratingcount']=$avgcount/$reviewCounts;
       }
       $this->mViewData['reviews'] = $reviews;
     
       $Hotel_image = new Hotel_image_model();
       $multi_image = $Hotel_image->asObject()->where('hotel_id', $id)->findAll();
     //echo "<pre>"; print_r($multi_image); die;
       $this->mViewData['hotel_images']=$multi_image;
       $this->mViewData['hotel_rooms']=$HotelRoom;
       $this->mViewData['hoteldetails']=$hoteldetail;
       $this->session = \Config\Services::session();
        //$id = $this->session->get('id');
       $this->session->set('previous_id', $id);
       $this->session->set('desti_id', $hoteldetail['city_id']);

       return view('frontend/hotel_details',$this->mViewData);


    }

    public function get_destination()
     {
        $hotelDestination = new Hotel_Destination_model();
       // print_r($_GET['term']); die;
        if (isset($_GET['term'])){
        $q = strtolower($_GET['term']);
        //print_r($q); die;
        $hotelDestination->get_city($q);

        }   
        exit();

    }

    public function save_enquiry_form()
    {
        $validation = \Config\Services::validation();

        // Set the validation rules
        $rules=[

              'name' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please enter  name  ',
            ],
            ],
            'email' => [
            'rules'  => 'required|valid_email',
            'errors' => [
                'required' => 'Please enter  email  ',
                'valid_email' => 'Please enter  valid email',
            ],
            ],
            'message' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please enter  message  ',
            ],
            ],
            'privacy' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please check  I agree field  ',
            ],
            ],
            ];
        if (!$this->validate($rules)) {
            // Form validation failed, return the errors
           $data['success'] = false;
            $data['validation']=$this->validator;
            return $this->response->setJSON([
                'success' => false,
                'errors'  => $validation->getErrors(),
            ]);
        } else {
            // Form validation succeeded, do something
             $name=$this->request->getPost('name');
             $email_id=$this->request->getPost('email');
             $message=$this->request->getPost('message');
            $hotel_review_data = [
                'name'=>$name,
                'email_id'=>$email_id,
                'message'=>$message
               
                
            ];  //print_r($hotel_review_data); die;
            $enquiry = new Hotel_Enquiry_model();
            $enquiry->insert($hotel_review_data);
            $data['success'] = true;
            $data['message'] = 'Your  enquiry submitted successfully.';
        }
          return $this->response->setJSON($data);
    }

    public function save_review()
    {  //echo "<pre>";
      //print_r($_POST);  die;
      $this->session = \Config\Services::session();
      $id = $this->session->get('previous_id');
      $destination_id = $this->session->get('desti_id');
       //print_r($id); die;
      $service=$this->request->getvar('serrating_data');
      $loction=$this->request->getvar('locrating_data');
      $value_mn=$this->request->getvar('vmrating_data');
      $cleaniness=$this->request->getvar('clnrating_data');
      $facilities=$this->request->getvar('facrating_data');
      $name=$this->request->getvar('name');
      $email_id=$this->request->getvar('email');
      $message=$this->request->getvar('message');
       $avg=($service+$loction+$value_mn+$cleaniness+$facilities)/5;
       //print_r($avg); die;

      $hotel_review_data = [
                'hotel_id'=>$id,
                'destination_id'=>$destination_id,
                'name'     =>$name,
                'email'    =>$email_id,
                'message'       =>$message,
                'service_rating'=>$service,
                'location_rating'=>$loction,
                'value_for_money_rating'=>$value_mn,
                'cleanliness_rating'=>$cleaniness,
                'facilities_rating'=>$facilities,
                'avg_rating'=>$avg,
                'created_at'=>date('Y-m-d H:i:s')
               
                
            ];  //print_r($hotel_review_data); die;
            $review = new ReviewModel();
            $review->insert($hotel_review_data);

            $this->session = \Config\Services::session();
          $id = $this->session->get('previous_id');
             $data['success'] = true;
             $data['message'] = 'Your  review submitted successfully.';

          //print_r($id); die;
          //return redirect()->to('hotel_details/'.$id);
           return $this->response->setJSON($data);  


     } 

    public function tour_details($id)
    {
        $hotelDestination = new Hotel_Destination_model();
        $destination=$hotelDestination->get_city_by_cityID($id); //print_r($destination); die;
        $this->mViewData['tour_destinations'] = $destination;
        $desti_itinerary = new Hotel_Desti_Itinerary_model();
        $desti_itineraries=$desti_itinerary->get_itinerary($destination->id); 
        
        $this->mViewData['itineraries'] = $desti_itineraries;
        $destination_image = new Hotel_Desti_image_model();
        $destination_image= $destination_image->asObject()->where('destination_id', $destination->id)->findAll();
        $this->mViewData['destination_images'] = $destination_image;
        $hoteldetails = new HotelDetail();
        $paticular_loc_hotel = $hoteldetails->get_hotel_by_cityId($destination->id);
        //print_r($paticular_loc_hotel); die;
       $this->mViewData['paticular_loc_hotels']=$paticular_loc_hotel;
       $review = new ReviewModel();
       $ratingscount=0;
       $reviews= $review->asObject()->where('destination_id', $id)->findAll();
       $reviewscount=count($reviews);
       //print_r($reviewscount); die;
      foreach ($reviews as $value)
      {
        
      $ratingscount=$ratingscount+$value->avg_rating;
      }
      if($reviewscount>0){
       $rating=$ratingscount/$reviewscount;
        $this->mViewData['rating']=number_format($rating, 1); }
     
       $this->mViewData['destination_review'] = $reviewscount;
      //print_r($ratingscount); die;
      return view('frontend/tour_details',$this->mViewData);
    } 

    public function booking()
    {
      //echo "<pre>";
      //print_r($_POST); die;
      $date = explode ("-", $_POST['daterange']);
      $checkinDate=$date[0];
      $date_replace = str_replace('/', '-', $checkinDate);
      $checkInnewDate = date("Y-m-d", strtotime($date_replace));
      $checkin_date = strtotime($checkInnewDate);

      $checkoutDate=$date[1];
      $checkdate = str_replace('/', '-', $checkoutDate);
      $checkOutnewDate = date("Y-m-d", strtotime($checkdate));
      $checkout_date = strtotime($checkOutnewDate);
      $datediff = $checkout_date - $checkin_date;
      $stayIn=round($datediff / (60 * 60 * 24));
      if ($stayIn==0) {
      $stayIn=1;
    }
      $this->mViewData['stayIn']=$stayIn; 
     //print_r(round($datediff / (60 * 60 * 24))); die;
      $this->mViewData['checkIN']=date('d/M/Y', strtotime(str_replace('/', '-', $date[0])));
      $this->mViewData['checkOut']=date('d/M/Y', strtotime(str_replace('/', '-', $date[1])));    
      $hotelid=$_POST['hotelId'];     
      $this->mViewData['room_id']=$_POST['roomId'];
      $room_ids = explode (",", $_POST['roomId']);
        
      $reservation=[
         'room'=>$_POST['room'],
         'adult'=>$_POST['adult'],
         'children'=>$_POST['children'],
         'daterange'=>$_POST['daterange']

      ];  //print_r($reservation); die;
        

        $hotelRooms = new Hotel_Room_Model();
      //$HotelRoom=$hotelRooms->get_room_detail($room_ids);
      // $this->mViewData['room_details']=$HotelRoom;
        $roomprice=0;
        $hotelRoom=array();
        $i=0;
        if ($_POST['roomId'] !="") {
          
        
       foreach ($room_ids as  $value) {
        $hotelRoom[$i]= $hotelRooms->asObject()->find($value);
        $roomprice=$roomprice +  $hotelRoom[$i]->price;
         $i++;
       }
      $this->mViewData['room_details']=$hotelRoom;
      $this->mViewData['room_price']=$roomprice;
      $this->mViewData['subtotal']=$roomprice *$stayIn;
      }
      $this->mViewData['reservation']=$reservation;
      

       $country = new Country_model();
       $country_data=$country->asObject()->findAll();
       $this->mViewData['countries']=$country_data;
       // $this->session = \Config\Services::session();
       //$hotel_id=$this->session->get('previous_id');
       $hoteldetails = new HotelDetail();
       $hotel_detail= $hoteldetails->asObject()->find($hotelid);
       // print_r($hotel_detail); die;
       $this->mViewData['hotel_detail']=$hotel_detail;
       return view('frontend/booking_details',$this->mViewData);
    } 

    public function booking_request_save()
    {
       //echo "<pre>";
       //print_r($_POST); die;
       $date = explode ("-", $_POST['daterange']);
       $checkinDate=$date[0];
     
       $date_replace = str_replace('/', '-', $checkinDate);
       $checkInnewDate = date("Y-m-d", strtotime($date_replace));
      
      $checkin_date = strtotime($checkInnewDate);

      $checkoutDate=$date[1];
      $checkdate = str_replace('/', '-', $checkoutDate);
      $checkOutnewDate = date("Y-m-d", strtotime($checkdate));
      $checkout_date = strtotime($checkOutnewDate);
      $datediff = $checkout_date - $checkin_date;
      $stayIn=round($datediff / (60 * 60 * 24));
      if ($stayIn==0) {
      $stayIn=1;
    }
      $room_ids = explode (",", $_POST['roomId']);
      $hotelRooms = new Hotel_Room_Model();
        $roomprice=0;
        $hotelRoom=array();
        $i=0;
       if ($_POST['roomId'] !="") {
          
        
       foreach ($room_ids as  $value) {
        $hotelRoom[$i]= $hotelRooms->asObject()->find($value);
        $roomprice=$roomprice +  $hotelRoom[$i]->price;
         $i++;
       }
       $this->mViewData['room_details']=$hotelRoom;
     
      }
      $room_id =  json_encode($room_ids);
      //print_r($room_id); die;
      $first_name=$this->request->getPost('first_name');
      $last_name=$this->request->getPost('last_name');
      $email=$this->request->getPost('email');
      $phone_no=$this->request->getPost('phone_no');
      $address=$this->request->getPost('address');
      $country=$this->request->getPost('country');
      $city=$this->request->getPost('city');
      $hotelId=$this->request->getPost('hotelId');
       //$roomId=$this->request->getPost('roomId');
      $no_of_room=$this->request->getPost('no_of_room');
      $adult=$this->request->getPost('adult');
      $children=$this->request->getPost('children');
      $hotel_booking_data=[

                    'first_name'=>$first_name,
                    'last_name'=>$last_name,
                    'email'    =>$email,
                     'phone_no'=>$phone_no,
                     'address'=>$address,
                     'country_id'=>$country,
                     'city'=>$city,
                     'per_room_price'=>$roomprice,
                     'no_of_adults'=>$adult,
                     'no_of_childrens'=>$children,
                     'hotel_id'=>$hotelId,
                     'check_in'=>$checkInnewDate,
                     'check_out'=>$checkOutnewDate,
                     'stay'=>$stayIn,
                     'no_of_rooms'=>$no_of_room,
                     'room_type_id'=>$room_id
      ]; //echo "<pre>";  print_r($hotel_booking_data);  die;
      $hotelbooking = new Hotel_Booking_model();
      $success= $hotelbooking->insert($hotel_booking_data);
      //print_r($success); die;

     return view('frontend/thank_you');


    }

}

