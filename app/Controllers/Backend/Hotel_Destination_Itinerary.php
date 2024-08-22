<?php

namespace App\Controllers\Backend;
use CodeIgniter\Controller; 
use App\Controllers\BaseController;
use App\Models\Hotel_Desti_Itinerary_model;
use App\Models\Hotel_Destination_model;


class Hotel_Destination_Itinerary extends BaseController
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

       $desti_itinerary = new Hotel_Desti_Itinerary_model();
       $hoteldesti_itinerary=$desti_itinerary->asObject()->findAll();
      $this->mViewData['hotel_itinerary_list'] = $hoteldesti_itinerary;
      $this->mViewData['page_title'] = 'Admin Panel - Destination Itinerary'; 
      echo view('backend/hotel_dest_itinerary/index', $this->mViewData );  
      }

      public function add()
    {  
      $hotelDestination = new Hotel_Destination_model();
      $Destination=$hotelDestination->findAll();
      $this->mViewData['destinations'] =$Destination;
      $this->mViewData['form_action'] = 'create';
      $this->mViewData['page_title'] = 'Add Hotel Itinerary';
      echo view('backend/hotel_dest_itinerary/form', $this->mViewData);
     
     } 

       public function create()
     { 
    //echo "<pre>";  print_r($_POST); die;
      
      $desti_itinerary = new Hotel_Desti_Itinerary_model();
      $hotelDestination = new Hotel_Destination_model();
      $Destination=$hotelDestination->findAll();
      $this->mViewData['destinations'] =$Destination;
      $this->mViewData['form_action'] = 'create';
      $this->mViewData['page_title'] = 'Add Hotel Itinerary';

       $rules=[

              'destination_id' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please select  destination  ',
            ],
            ],
            'title' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please enter  title  ',
            ],
            ],
            'description' => [
            'rules'  => 'required', 
            'errors' => [
                'required' => 'Please enter  description  ',
            ],
            ],
             'photo' => [
               'rules'  => 'uploaded[photo]|mime_in[photo,image/jpg,image/jpeg,image/png,image/gif]|max_size[photo,4096]|max_dims[photo,1300,800]',
               'errors' => [
                'uploaded' => 'Please upload   image  ',
                'max_size' => 'uploaded  image size large ',
            ],
            ]
           ];
        if (!$this->validate($rules)) {
              
             $this->mViewData['validation']=$this->validator;
            return view('backend/hotel_dest_itinerary/form',$this->mViewData);
        }
         else 
             {
                  //echo "hello"; die;
              $image=$this->request->getFile('photo');
              
              $name=$image->getRandomName();
               // print_r($name); die;       
              $destination_id=$this->request->getPost('destination_id');
              $title=$this->request->getPost('title');
              $description=$this->request->getPost('description');
               
              
              if ($this->request->getPost('is_active') == "1")
              {
               $is_active = 1;
               }   
             else
               {

                $is_active = 0;

               }
              // print_r($is_active); die;
          $hotel_room_data = [
                'destination_id'     =>$destination_id,
                'title'    =>$title,
                'itinerary_photo'        =>$name,
                'description'    =>$description,
                'is_active'=>$is_active,
               
                
            ]; 
            //echo "<pre>";  print_r($hotel_des_data); die;
            
      if ($image->isValid() && !$image->hasMoved())
        {
           $upload_dir="uploads/hotel_destinations/desti_itinerary/";
           $image->move($upload_dir,$name); 
         }
       $desti_itinerary->insert($hotel_room_data);

      
       return redirect()->to('admin/destination_itinerary');   

        }    

       
     }  

     public function edit($id)
     {
      
      $hotelDestination = new Hotel_Destination_model();
      $Destination=$hotelDestination->findAll();
      $this->mViewData['destinations'] =$Destination;
      $desti_itinerary = new Hotel_Desti_Itinerary_model();
      $Hotel_itinerary=$desti_itinerary->where('id', $id)->first();
      $this->mViewData['hotel_itinerary_edit'] = $Hotel_itinerary; 
      $this->mViewData['page_title'] = 'Edit  Hotel Itinerary';
      $this->mViewData['form_action'] = 'update/'.$id;
      return view('backend/hotel_dest_itinerary/form',$this->mViewData);
     }

     public function update($id)
  {
    $hotelDestination = new Hotel_Destination_model();
      $Destination=$hotelDestination->findAll();
      $this->mViewData['destinations'] =$Destination;
    $this->mViewData['page_title'] = 'Edit  Hotel Itinerary';
     $this->mViewData['form_action'] = 'update/'.$id;
     
      $rules=[

              'destination_id' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please Select   destination',
            ],
            ],
            
       ];
       if (!$this->validate($rules)) {

             $this->mViewData['validation']=$this->validator;
            return view('backend/hotel_dest_itinerary/form',$this->mViewData);
        }else{  
            $desti_itinerary = new Hotel_Desti_Itinerary_model();
              $image=$this->request->getFile('photo');
                     
              $destination_id=$this->request->getPost('destination_id');
              $title=$this->request->getPost('title');
              $description=$this->request->getPost('description');
                  
    
       $image_detail=$desti_itinerary->where('id', $id)->first();
       $old_img_name=$image_detail['itinerary_photo']; 
       if ($image->isValid() && !$image->hasMoved()) { 
            
            if (file_exists("uploads/hotel_destinations/desti_itinerary/".$old_img_name)) {
              if ($old_img_name !='') {
                
              unlink("uploads/hotel_destinations/desti_itinerary/".$old_img_name);
               }
            }
            $imageName=$image->getRandomName();
            
            $upload_dir="uploads/hotel_destinations/desti_itinerary/";
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
       $hotel_itinerary_update = [
               'destination_id'     =>$destination_id,
                'title'    =>$title,
                'itinerary_photo'        =>$imageName,
                'description'    =>$description,
                'is_active'=>$is_active,
               
               
               
            ]; 
             

            $test=$desti_itinerary->update($id,$hotel_itinerary_update);
             // print_r($test); die;
      
       return redirect()->to('admin/destination_itinerary'); 
   }
  } 

     public function changestatus($id)
    {  
        
        $desti_itinerary = new Hotel_Desti_Itinerary_model();
        $Hotel_room=$desti_itinerary->where('id', $id)->first();
        
        if( $Hotel_room['is_active']==1){
           
            $new_status=0;
         }
       else
       {
        
         $new_status="1";
       }
       $update_data=[
       'is_active'=>$new_status

       ];
       $desti_itinerary->update($id,$update_data);
       return redirect()->to('admin/destination_itinerary');
    
  }

     public function delete($id)
    {
        $desti_itinerary = new Hotel_Desti_Itinerary_model();
        $itinerary_photo=$desti_itinerary->find($id);
        if ($itinerary_photo['itinerary_photo'] !='') 
        {
        unlink("uploads/hotel_destinations/desti_itinerary/".$itinerary_photo['itinerary_photo']);
        }
        $desti_itinerary->where('id', $id)->delete();
        return redirect()->to('admin/destination_itinerary');
    }  


   }   