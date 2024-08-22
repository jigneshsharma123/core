<?php

namespace App\Controllers\Backend;
use CodeIgniter\Controller; 
use App\Controllers\BaseController;
use App\Models\HotelDetail;
use App\Models\Hotel_Destination_model;
use App\Models\Country_model;
use App\Models\State_model;
use App\Models\Hotel_image_model;
use App\Libraries\Common_Functions;
use App\Models\Hotel_Room_Model; 


class Hotel_Management extends BaseController
{ 
	public function __construct() 
    {   
        helper(['form', 'url']);
        $session=session();
        $data['current_page'] = 'Hotel Management';
      if ($session->has('admin_logged_in')) {
        
        $this->mViewData['session_data']=$session->get('admin_logged_in');
       }else{

        return view('backend/login/index');
       }
       $this->mViewData['toolbar'] = [

       ['Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat'],
       ['Image', 'Table', 'HorizontalRule', 'SpecialChar'],
       ['Link', 'Unlink', 'Anchor'],
       ['Styles', 'Format'],
       ['Scayt'],
       ['Maximize'],
       ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote'],
       ['Source'],
    
      ];
      $this->mViewData['width'] = '100%';
      $this->mViewData['height'] = '300px';
      $this->mViewData['language'] = 'en';
      $this->mViewData['autoParagraph'] = false;
      $this->mViewData['fillEmptyBlocks'] = false;
      $this->mViewData['forcePasteAsPlainText'] = true;
      }
      public function index() 
     {

       $hoteldetails = new HotelDetail();
       $hoteldetail_data=$hoteldetails->findAll();
      $this->mViewData['hotel_detail_list'] = $hoteldetail_data;
      $this->mViewData['page_title'] = 'Admin Panel - Hotel Detail'; 
      echo view('backend/hotel_management/index', $this->mViewData );  
     


      }

    public function add()
    {  
       $country = new Country_model();
       $country_data=$country->findAll();
       $this->mViewData['countries']=$country_data;
       $this->mViewData['amenities_checkbox'] = unserialize(Hotel_Amenities);
      $this->mViewData['form_action'] = 'create';
      $this->mViewData['page_title'] = 'Add Hotel Detail';
      echo view('backend/hotel_management/form', $this->mViewData);
     
     }

   public function create()
   {   
       $hoteldetails = new HotelDetail();
       $country = new Country_model();
       $country_data=$country->findAll();
       $this->mViewData['countries']=$country_data;
       $this->mViewData['amenities_checkbox'] = unserialize(Hotel_Amenities);
      $this->mViewData['page_title'] = 'Add Hotel Detail';

       $rules=[

              'hname' => [ 
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please enter name  ',
            ],
            ],
            'hotel_type' => [ 
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please enter hotel type  ',
            ],
            ],
            'extra_people' => [ 
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please enter extra people charge ',
            ],
            ],
            'minimum_stay' => [ 
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please enter minimum stay',
            ],
            ],
            'available_room' => [ 
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please enter available room',
            ],
            ],
            'security_deposite' => [ 
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please enter security deposite',
            ],
            ],
            'country' => [ 
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please select country',
            ],
            ],
            'state' => [ 
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please select state',
            ],
            ],
            'city' => [ 
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please select city',
            ],
            ],
            'cancellation' => [ 
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please enter cancellation',
            ],
            ],
            'description' => [ 
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please enter description',
            ],
            ],
            'image' => [
               'rules'  => 'uploaded[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/gif]|max_size[image,4096]|max_dims[image,1300,800]',
               'errors' => [
                'uploaded' => 'Please upload   image  ',
                'max_size' => 'uploaded  image size large ',
            ],
            ]
           ];
        if (!$this->validate($rules)) {
              
             $this->mViewData['validation']=$this->validator;
            return view('backend/hotel_management/form',$this->mViewData);
        }
         else 
             { 
                  //echo "hello"; die;
              $image=$this->request->getFile('image');
              $name=$image->getRandomName();         
              $hname=$this->request->getPost('hname');
              $slugs = new Common_Functions();
              $slug=$slugs->create_unique_slug($hname,'HotelDetail');
              $hotel_type=$this->request->getPost('hotel_type');
              $extra_people=$this->request->getPost('extra_people');
              $minimum_stay=$this->request->getPost('minimum_stay');
              $cancellation=$this->request->getPost('cancellation');
              $available_room=$this->request->getPost('available_room');
              $security_deposite=$this->request->getPost('security_deposite');
              $country=$this->request->getPost('country');
              $state=$this->request->getPost('state');
              $city=$this->request->getPost('city');
              $neighborhood=$this->request->getPost('neighborhood');
              $description=$this->request->getPost('description');
              $amenities_json_data = json_encode(array_combine($this->request->getPost('amenities'),$this->request->getPost('amenities')));
              if ($this->request->getPost('is_active') == "1")
              {
               $is_active = 1;
               }   
             else
               {
              $is_active = 0;
               }
          $hotel_detail_data = [
                'hotel_name'     =>$hname,
                'slug'=>$slug,
                'hotel_type'    =>$hotel_type,
                'extra_people'=>$extra_people,
                'minimum_stay'=>$minimum_stay,
                'cancellation'=>$cancellation,
                'available_room'      =>$available_room,
                'security_deposite'       =>$security_deposite,
                'country_id'   =>$country,
                'state_id'  =>$state,
                'city_id'      =>$city,                
                'neighborhood'     =>$neighborhood,
                'hotel_amenities'=>$amenities_json_data,
                'description'=>$description,
                'hotel_photo'=>$name,
                'is_active'       =>$is_active
               
                
            ]; 
            
      if ($image->isValid() && !$image->hasMoved())
        {
           $upload_dir="uploads/hotel_details/";
           $image->move($upload_dir,$name); 
         }
       $hoteldetails->insert($hotel_detail_data);
       $last_insert_id = $hoteldetails->getInsertID();
        foreach($this->request->getFileMultiple('hotel_image') as $file)
             {   
              $imagename=$file->getRandomName(); 
                
          if ($file->isValid() && !$file->hasMoved())
        {
           $upload_dir="uploads/hotel_details/hotel_image/";
           $file->move($upload_dir,$name); 
         }
                
                 $Hotel_image = new Hotel_image_model();
                 $upload_data=[
                     'hotel_id'=>$last_insert_id,
                    'image'=>$imagename
                     

                ];
                
                $Hotel_image->insert($upload_data); 
             }

      
       return redirect()->to('admin/hotel_management');   

        }    

    }  
     public function edit($id)
  {
    helper('json');
    $hoteldetails = new HotelDetail();
    $detailHotel=$hoteldetails->where('id', $id)->first();
    $this->mViewData['amenities_checkbox'] = unserialize(Hotel_Amenities); 
     
      $dataArray = json_decode($detailHotel['hotel_amenities'], true);
      //print_r($dataArray); die;
      $this->mViewData['hotel_amenities_data']=$dataArray;
    $countryId=$detailHotel['country_id']; 
    $stateId=$detailHotel['state_id']; 
    $country = new Country_model();
    $country_data=$country->findAll();
    $state = new State_model();
    $state_data=$state->get_states_by_country($countryId);
    //print_r($state_data); die;
    $hotelDestination = new Hotel_Destination_model();
    $city_data=$hotelDestination->get_city_by_stateId($stateId);
    //print_r($city_data); die;
    $this->mViewData['cities']=$city_data;
    $this->mViewData['states']=$state_data;
    $this->mViewData['countries']=$country_data;  
    $this->mViewData['hotel_detail_edit'] = $detailHotel; 
    $this->mViewData['page_title'] = 'Edit Hotel Detail';
    $this->mViewData['form_action'] = 'update/'.$id;
    return view('backend/hotel_management/form',$this->mViewData);    

  }
  public function update($id)
  {
    $this->mViewData['page_title'] = 'Edit Hotel Detail';
     $this->mViewData['form_action'] = 'update/'.$id;
     
      $rules=[

              'hname' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please enter  name  ',
            ],
            ],
            
       ];
       if (!$this->validate($rules)) {

             $this->mViewData['validation']=$this->validator;
            return view('backend/hotel_management/form',$this->mViewData);
        }else{  
              $hoteldetails = new HotelDetail();
              $image=$this->request->getFile('image');
              //$name=$image->getName();         
              $hname=$this->request->getPost('hname');
              $hotel_type=$this->request->getPost('hotel_type');
              $extra_people=$this->request->getPost('extra_people');
              $minimum_stay=$this->request->getPost('minimum_stay');
              $cancellation=$this->request->getPost('cancellation');
              $available_room=$this->request->getPost('available_room');
              $security_deposite=$this->request->getPost('security_deposite');
              $country=$this->request->getPost('country');
              $state=$this->request->getPost('state');
              $city=$this->request->getPost('city');
              $neighborhood=$this->request->getPost('neighborhood');
              $description=$this->request->getPost('description'); 
              $amenities_json_data = json_encode(array_combine($this->request->getPost('amenities'),$this->request->getPost('amenities')));   
    
       $image_detail=$hoteldetails->where('id', $id)->first();
       $old_img_name=$image_detail['hotel_photo']; 
       if ($image->isValid() && !$image->hasMoved()) { 
            
            if (file_exists("uploads/hotel_details/".$old_img_name)) {
              if ($old_img_name !="") {
                unlink("uploads/hotel_details/".$old_img_name);
              }
              
            }
            $imageName=$image->getRandomName();
            
            $upload_dir="uploads/hotel_details/";
           $image->move($upload_dir,$imageName); 

            
           } 
        else{

          $imageName=$old_img_name;


        }   
           
          
          if ($this->request->getPost('is_active') == "1")
          {
              $is_active = 1;
           }   
          else
          {
              $is_active = 0;
            }
       $hotel_update_data = [
                'hotel_name'     =>$hname,
                'hotel_type'    =>$hotel_type,
                'extra_people'=>$extra_people,
                'minimum_stay'=>$minimum_stay,
                'cancellation'=>$cancellation,
                'available_room'      =>$available_room,
                'security_deposite'       =>$security_deposite,
                'country_id'   =>$country,
                'state_id'  =>$state,
                'city_id'      =>$city,                
                'neighborhood'     =>$neighborhood,
                'hotel_amenities'=>$amenities_json_data,
                'description'=>$description,
                'hotel_photo'=>$imageName,
                'is_active'       =>$is_active,
               
            ]; 
             
            $hoteldetails->update($id,$hotel_update_data);
      $gallery= $this->request->getFileMultiple('hotel_image');
      //print_r($gallery); die;

      
        
      foreach($this->request->getFileMultiple('hotel_image') as $file)
             {  

              $updatename=$file->getRandomName(); 

        if ($updatename !='' ) { 
                
          if ($file->isValid() && !$file->hasMoved())
        {
           $upload_dir="uploads/hotel_detail/hotel_image/";
           $file->move($upload_dir,$updatename); 
         }
                
                 $Hotel_image = new Hotel_image_model();
                 $upload_data=[
                     'hotel_id'=>$id,
                    'image'=>$updatename
                     

                ];
                
                $Hotel_image->insert($upload_data); 
             } 

             } 
       return redirect()->to('admin/hotel_management'); 
   }
  }

    public function delete($id)
    {
        $hoteldetails = new HotelDetail();
        $hoteldetails->where('id', $id)->delete();
        $hotelRooms = new Hotel_Room_Model(); 
        $hotelRooms->where('hotel_id', $id)->delete();
        $Hotel_image = new Hotel_image_model();
        $Hotel_image->where('hotel_id', $id)->delete();
        return redirect()->to('admin/hotel_management');
    }
     public function changestatus($id)
    {  
        
        $hoteldetails = new HotelDetail();
        $HotelManagement=$hoteldetails->where('id', $id)->first();
        
        if( $HotelManagement['is_active']==1){
           
            $new_status=0;
         }
       else
       {
        
         $new_status="1";
       }
       $update_data=[
       'is_active'=>$new_status

       ];
       $hoteldetails->update($id,$update_data);
       return redirect()->to('admin/hotel_management');
    
  }
  public function changepopular($id)
    {  
        
        $hoteldetails = new HotelDetail();
        $HotelManagement=$hoteldetails->where('id', $id)->first();
        
        if( $HotelManagement['popular_hotel']==1){
           
            $new_status=0;
         }
       else
       {
        
         $new_status="1";
       }
       $update_data=[
       'popular_hotel'=>$new_status

       ];
       $hoteldetails->update($id,$update_data);
       return redirect()->to('admin/hotel_management');
    
  }

    public function hotel_gallery($id)

    { 
        $medias = new Hotel_image_model();
        $medias=$medias->get_image_by_hotel_id($id);
        $this->mViewData['medias'] = $medias;
        $this->mViewData['page_title'] = 'Hotel  Image - Media Gallery';
        $view_file = 'backend/hotel_management/hotel_gallery';
        $this->session = \Config\Services::session();
        //$id = $this->session->get('id');
        $this->session->set('previous_id', $id);
        return view($view_file,$this->mViewData);
        
    }
    public function delete_gallery($id)
    {
        $medias = new Hotel_image_model();
        $medias->where("id", $id)->delete();
         $this->session = \Config\Services::session();
          $id = $this->session->get('previous_id');
        return redirect()->to('admin/hotel_gallery/'.$id); 
    }


   }    