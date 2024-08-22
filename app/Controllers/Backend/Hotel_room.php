<?php

namespace App\Controllers\Backend;
use CodeIgniter\Controller; 
use App\Controllers\BaseController;
use App\Models\Hotel_Room_Model;
use App\Models\HotelDetail;


class Hotel_room extends BaseController
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

       $hoteldetails = new Hotel_Room_Model();
       $hotelRoom_data=$hoteldetails->findAll();
      $this->mViewData['hotel_room_list'] = $hotelRoom_data;
      $this->mViewData['page_title'] = 'Admin Panel - Hotel Rooms'; 
      echo view('backend/hotel_rooms/index', $this->mViewData );  
      }

      public function add()
    {  
      $hoteldetails = new HotelDetail();
      $hotel=$hoteldetails->findAll();
      $this->mViewData['hotels'] =$hotel;
      $this->mViewData['Room_Amenities'] = unserialize(Amenities);
      $this->mViewData['form_action'] = 'create';
      $this->mViewData['page_title'] = 'Add Hotel Room';
      echo view('backend/hotel_rooms/form', $this->mViewData);
     
     } 
      public function create()
     { 
      
      
      $hotelRooms = new Hotel_Room_Model();
      $hoteldetails = new HotelDetail();
      $hotel=$hoteldetails->findAll();
      $this->mViewData['hotels'] =$hotel;
      $this->mViewData['Room_Amenities'] = unserialize(Amenities);
      $this->mViewData['form_action'] = 'create';
      $this->mViewData['page_title'] = 'Add Hotel Room';

       $rules=[

              'hotel' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please select  hotel  ',
            ],
            ],
            'room' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please enter  name  ',
            ],
            ],
            'price' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please enter  price  ',
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
            return view('backend/hotel_rooms/form',$this->mViewData);
        }
         else 
             {
                  //echo "hello"; die;
              $image=$this->request->getFile('photo');
              $name=$image->getRandomName();         
              $hotel=$this->request->getPost('hotel');
              $room=$this->request->getPost('room');
              $price=$this->request->getPost('price');
               $amenities_json_data = json_encode(array_combine($this->request->getPost('amenities'),$this->request->getPost('amenities')));
              
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
                'hotel_id'     =>$hotel,
                'room_name'    =>$room,
                'price'        =>$price,
                'amenities'    =>$amenities_json_data,
                'room_image'=>$name,
                'is_active'=>$is_active,
               
                
            ]; 
            //echo "<pre>";  print_r($hotel_des_data); die;
            
      if ($image->isValid() && !$image->hasMoved())
        {
           $upload_dir="uploads/hotel_rooms/";
           $image->move($upload_dir,$name); 
         }
       $hotelRooms->insert($hotel_room_data);

      
       return redirect()->to('admin/hotel_room');   

        }    

       
     }

     public function edit($id)
     {
      $this->mViewData['Room_Amenities'] = unserialize(Amenities);
      $hoteldetails = new HotelDetail();
      $hotel=$hoteldetails->findAll();
      $this->mViewData['hotels'] =$hotel;
      $hotelRooms = new Hotel_Room_Model();
      $HotelRoom=$hotelRooms->where('id', $id)->first();
      $dataArray = json_decode($HotelRoom['amenities'], true);
      $this->mViewData['hotel_room_amenities']=$dataArray;
      $this->mViewData['hotel_room_edit'] = $HotelRoom; 
      $this->mViewData['page_title'] = 'Edit Hotel Room';
      $this->mViewData['form_action'] = 'update/'.$id;
      return view('backend/hotel_rooms/form',$this->mViewData);
     }

    public function update($id)
  {
    $hoteldetails = new HotelDetail();
      $hotel=$hoteldetails->findAll();
      $this->mViewData['hotels'] =$hotel;
    $this->mViewData['page_title'] = 'Edit Hotel Room';
     $this->mViewData['form_action'] = 'update/'.$id;
     
      $rules=[

              'hotel' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please Select   hotel',
            ],
            ],
            
       ];
       if (!$this->validate($rules)) {

             $this->mViewData['validation']=$this->validator;
            return view('backend/hotel_rooms/form',$this->mViewData);
        }else{  
              $hotelRooms = new Hotel_Room_Model();
             $image=$this->request->getRandomName('photo');
              //$name=$image->getName();         
              $hotel=$this->request->getPost('hotel');
              $room=$this->request->getPost('room');
              $price=$this->request->getPost('price');
              $amenities_json_data = json_encode(array_combine($this->request->getPost('amenities'),$this->request->getPost('amenities')));
                  
    
       $image_detail=$hotelRooms->where('id', $id)->first();
       $old_img_name=$image_detail['room_image']; 
       if ($image->isValid() && !$image->hasMoved()) { 
            
            if (file_exists("uploads/hotel_rooms/".$old_img_name)) {
              if ($old_img_name !='') {
                
              unlink("uploads/hotel_rooms/".$old_img_name);
               }
            }
            $imageName=$image->getRandomName();
            
            $upload_dir="uploads/hotel_rooms/";
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
       $hotel_room_update = [
               'hotel_id'     =>$hotel,
                'room_name'    =>$room,
                'price'        =>$price,
                'amenities'    =>$amenities_json_data,
                'room_image'=>$imageName,
                'is_active'=>$is_active,
               
               
               
            ]; 
             

            $test=$hotelRooms->update($id,$hotel_room_update);
             // print_r($test); die;
      
       return redirect()->to('admin/hotel_room'); 
   }
  } 

  public function delete($id)
    {
        $hotelRooms = new Hotel_Room_Model();
        $hotelRooms->where('id', $id)->delete();
        return redirect()->to('admin/hotel_room');
    }

    public function changestatus($id)
    {  
        
        $hotelRooms = new Hotel_Room_Model();
        $Hotel_room=$hotelRooms->where('id', $id)->first();
        
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
       $hotelRooms->update($id,$update_data);
       return redirect()->to('admin/hotel_room');
    
  }

}