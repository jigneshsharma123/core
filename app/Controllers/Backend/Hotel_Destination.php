<?php

namespace App\Controllers\Backend;
use CodeIgniter\Controller; 
use App\Controllers\BaseController;
use App\Models\Hotel_Destination_model;
use App\Models\Country_model;
use App\Models\State_model;
use App\Models\Hotel_Desti_image_model;
use App\Models\Hotel_Desti_Itinerary_model;
 


class Hotel_Destination extends BaseController
{ 
  public function __construct() 
    {   
        helper(['form', 'url']);  
        $session=session();
        $data['current_page'] = 'Hotel Destination';
      if ($session->has('admin_logged_in')) {
        
        $this->mViewData['session_data']=$session->get('admin_logged_in');
       }else{

        return view('backend/login/index');
       }

   }

   public function index() 
     {

       $hotelDestination = new Hotel_Destination_model();
       $hotelDes_data=$hotelDestination->findAll();
      $this->mViewData['hotel_des_list'] = $hotelDes_data;
      $this->mViewData['page_title'] = 'Admin Panel - Hotel Destination'; 
      echo view('backend/hotel_destination/index', $this->mViewData );  
      }
    public function add()
    {  
      
       $country = new Country_model();
       $country_data=$country->findAll();
       $this->mViewData['countries']=$country_data;
      $this->mViewData['form_action'] = 'create';
      $this->mViewData['page_title'] = 'Add Hotel Destination';
      echo view('backend/hotel_destination/form', $this->mViewData);
     
     }

     public function create()
   {   
       //print_r($_POST); die;
       $country = new Country_model();
       $country_data=$country->findAll();
       $this->mViewData['countries']=$country_data;
       $hotelDestination = new Hotel_Destination_model();
       $this->mViewData['form_action'] = 'create';
      $this->mViewData['page_title'] = 'Add Hotel Destination';

       $rules=[

              'country' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please select  country  ',
            ],
            ],
             'state' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please select  state  ',
            ],
            ],
             'city' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please enter  city  ',
            ],
            ],
             'description' => [ 
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please enter  description  ',
            ],
            ],
            'video_url' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please enter youtube  url  ',
            ],
            ],
             'banner_image' => [ 
               'rules'  => 'uploaded[banner_image]|mime_in[banner_image,image/jpg,image/jpeg,image/png,image/gif]|max_size[banner_image,4096]|max_dims[banner_image,1920,1024]',
               'errors' => [
                'uploaded' => 'Please upload banner  image  ',
                'max_size' => 'uploaded  banner  image size large ',
            ],    

            ],
            'photo' => [
               'rules'  => 'uploaded[photo]|mime_in[photo,image/jpg,image/jpeg,image/png,image/gif]|max_size[photo,4096]|max_dims[photo,1000,500]',
               'errors' => [
                'uploaded' => 'Please upload   image  ',
                'max_size' => 'uploaded  image size large ',
            ],
            ]


           ];
        if (!$this->validate($rules)) {
              
             $this->mViewData['validation']=$this->validator;
            return view('backend/hotel_destination/form',$this->mViewData);
        }
         else 
             {
                  //echo "hello"; die;
              $image=$this->request->getFile('photo');
              $banner_image=$this->request->getFile('banner_image');
              $bannername=$banner_image->getRandomName();
              $name=$image->getRandomName();         
              $country=$this->request->getPost('country');
              $state=$this->request->getPost('state');
              $city=$this->request->getPost('city');
              $description=$this->request->getPost('description');
               $video_url=$this->request->getPost('video_url');
              //print_r($this->request->getPost('is_active')); die;
              if ($this->request->getPost('is_active') == "1")
              {
               $is_active = 1;
               }   
             else
               {

                $is_active = 0;

               }
              // print_r($is_active); die;
          $hotel_des_data = [
                'country_id'     =>$country,
                'state_id'    =>$state,
                'city'      =>$city,
                'description'       =>$description,
                'video_url'=>$video_url,
                'photo'=>$name,
                'banner_image'=>$bannername,
                'is_active'=>$is_active,
               
                
            ]; 
            //echo "<pre>";  print_r($hotel_des_data); die;
       if ($banner_image->isValid() && !$banner_image->hasMoved())
        {
           $upload_dir="uploads/hotel_destinations/destination_banner/";
           $banner_image->move($upload_dir,$bannername); 
         }     
      if ($image->isValid() && !$image->hasMoved())
        {
           $upload_dir="uploads/hotel_destinations/";
           $image->move($upload_dir,$name); 
         }
       $hotelDestination->insert($hotel_des_data);
       $last_insert_id = $hotelDestination->getInsertID();
        foreach( $this->request->getFileMultiple('dest_image') as $file)
             {   
              $imagename=$file->getRandomName(); 
                
          if ($file->isValid() && !$file->hasMoved())
        {
           $upload_dir="uploads/hotel_destinations/destination_image/";
           $file->move($upload_dir,$name); 
         }
                
      $Hotel_Desti_image = new Hotel_Desti_image_model();
                 $upload_data=[
                     'destination_id'=>$last_insert_id,
                    'image'=>$imagename
                     

                ];
                
                $Hotel_Desti_image->insert($upload_data); 
             }

      
       return redirect()->to('admin/hotel_destination');   

        }    

    } 

    public function edit($id)
  {
    $hotelDestination = new Hotel_Destination_model();
    $HotelDes=$hotelDestination->where('id', $id)->first();
    $countryId=$HotelDes['country_id'];
     //print_r($countryId); die;
    $country = new Country_model();
    $country_data=$country->findAll();
    $this->mViewData['countries']=$country_data;
    $state = new State_model();
    $state_data=$state->get_states_by_country($countryId);
     $this->mViewData['states']=$state_data;
        
    $this->mViewData['hotel_des_edit'] = $HotelDes; 
    $this->mViewData['page_title'] = 'Edit Hotel Destination';
    $this->mViewData['form_action'] = 'update/'.$id;
    return view('backend/hotel_destination/form',$this->mViewData);    

  } 
    public function update($id)
  {
    $this->mViewData['page_title'] = 'Edit Hotel Destination';
     $this->mViewData['form_action'] = 'update/'.$id;
     
      $rules=[

              'country' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please Select   country',
            ],
            ],
            
       ];
       if (!$this->validate($rules)) {

             $this->mViewData['validation']=$this->validator;
            return view('backend/hotel_destination/form',$this->mViewData);
        }else{  
              $hotelDestination = new Hotel_Destination_model();
             $image=$this->request->getFile('photo');
              //$name=$image->getName();         
              $country=$this->request->getPost('country');
              $state=$this->request->getPost('state');
              $city=$this->request->getPost('city');
              $description=$this->request->getPost('description');
              $video_url=$this->request->getPost('video_url');
              $banner_image=$this->request->getFile('banner_image');    
    
       $image_detail=$hotelDestination->where('id', $id)->first();
       $old_img_name=$image_detail['photo'];
       $old_banner_image=$image_detail['banner_image']; 
       if ($image->isValid() && !$image->hasMoved()) { 
            
            if (file_exists("uploads/hotel_destinations/".$old_img_name)) {
              if ($old_img_name !='') {
                
             
              unlink("uploads/hotel_destinations/".$old_img_name);
               }
            }
            $imageName=$image->getRandomName();
            
            $upload_dir="uploads/hotel_destinations/";
           $image->move($upload_dir,$imageName); 

            
           } 
        else{

          $imageName=$old_img_name;


        }
        if ($banner_image->isValid() && !$banner_image->hasMoved()) { 
            
            if (file_exists("uploads/hotel_destinations/destination_banner/".$old_banner_image)) {
              if ($old_banner_image !='') {
                
             
              unlink("uploads/hotel_destinations/destination_banner/".$old_banner_image);
               }
            }
            $bannerimageName=$banner_image->getRandomName();
            
            $upload_dir="uploads/hotel_destinations/destination_banner/";
           $banner_image->move($upload_dir,$bannerimageName); 

            
           } 
        else{

          $bannerimageName=$old_banner_image;


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
                'country_id'     =>$country,
                'state_id'    =>$state,
                'city'      =>$city,
                'description'       =>$description,
                'video_url'=>$video_url,
                'photo'=>$imageName,
                'is_active'       =>$is_active
               
               
            ]; 
             

            $test=$hotelDestination->update($id,$hotel_update_data);
             // print_r($test); die;
      foreach($this->request->getFileMultiple('dest_image') as $file)
             {  

              $updatename=$file->getRandomName(); 

        if ($updatename !='' ) { 
                
          if ($file->isValid() && !$file->hasMoved())
        {
           $upload_dir="uploads/hotel_destinations/destination_image/";
           $file->move($upload_dir,$updatename); 
         }
                
                 $Hotel_Desti_image = new Hotel_Desti_image_model();
                 $upload_data=[
                     'destination_id'=>$id,
                    'image'=>$updatename
                     

                ];
                
                $Hotel_Desti_image->insert($upload_data); 
             } 

             }   
      
       return redirect()->to('admin/hotel_destination'); 
   }
  }

    public function changestatus($id)
    {  
        
        $hotelDestination = new Hotel_Destination_model();
        $des_changeStatus=$hotelDestination->where('id', $id)->first();
          
        
        if($des_changeStatus['is_active']==1)
        {
           
            $new_status=0;
         }
       else
       {
        
         $new_status="1";
       }

       $update_status_data=[

       'is_active' => $new_status

       ];
       //$data['is_active'] = $new_status;
       //print_r($update_status_data); die;
       $hotelDestination->update($id,$update_status_data);
       return redirect()->to('admin/hotel_destination');
    
  }

  public function change_display_homepage($id)
    {  
        
        $hotelDestination = new Hotel_Destination_model();
        $home_page_display=$hotelDestination->where('id', $id)->first();
        
        if( $home_page_display['display_on_homepage']==1){
           
            $new_status=0;
         }
       else
       {
        
         $new_status="1";
       }
       $update_data=[
       'display_on_homepage'=>$new_status

       ];
       $hotelDestination->update($id,$update_data);
       return redirect()->to('admin/hotel_destination');
    
  }

    public function delete($id)
    {
        $hotelDestination = new Hotel_Destination_model();
        $hotelDestination->where('id', $id)->delete();
        $Hotel_Desti_image = new Hotel_Desti_image_model();
        $hotelDestination->where('destination_id', $id)->delete();
        $desti_itinerary = new Hotel_Desti_Itinerary_model();
        $desti_itinerary->where('destination_id', $id)->delete();

        return redirect()->to('admin/hotel_destination');
    }

     public function get_states()
    {   
        $country_id = $this->request->getpost('country_id');        //print_r($country_id); die; 
        $state = new State_model();
        $states = $state->where('country_id', $country_id)->findAll(); 
        echo json_encode($states);
    } 

    public function get_hotelDestination()
    {   
        $state_id = $this->request->getpost('stateid');        //print_r($country_id); die; 
        $hotelDestination = new Hotel_Destination_model();
        $destinations = $hotelDestination->where('state_id', $state_id)->findAll(); 
        echo json_encode($destinations);
    } 

    public function hotel_desti_gallery($id)

    { 
        $Hotel_Desti_image = new Hotel_Desti_image_model();
        $medias=$Hotel_Desti_image->get_image_by_destination_id($id);
        $this->mViewData['medias'] = $medias;
        $this->mViewData['page_title'] = 'Hotel  Image - Media Gallery';
        $view_file = 'backend/hotel_destination/hotel_desti_gallery';
        $this->session = \Config\Services::session();
        //$id = $this->session->get('id');
        $this->session->set('previous_id', $id);
        return view($view_file,$this->mViewData);
        
    }

     public function delete_gallery($id)
    {
        $medias = new Hotel_Desti_image_model();
        $medias->where("id", $id)->delete();
         $this->session = \Config\Services::session();
          $id = $this->session->get('previous_id');
        return redirect()->to('admin/destination_gallery/'.$id); 
    }


  } 
 ?>      