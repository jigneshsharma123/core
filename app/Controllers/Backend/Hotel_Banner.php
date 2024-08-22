<?php

namespace App\Controllers\Backend;
use CodeIgniter\Controller; 
use App\Controllers\BaseController;
use App\Models\Hotel_faqs_model;
use App\Models\HotelDetail;
use App\Models\Hotel_Banner_model; 
use App\Models\Hotel_Banner_Image_Model; 

class Hotel_Banner extends BaseController
{ 
  public function __construct() 
    {   
        helper(['form', 'url']);
        $session=session();
        $data['current_page'] = 'Hotel Faqs';
      if ($session->has('admin_logged_in')) {
        
        $this->mViewData['session_data']=$session->get('admin_logged_in');
       }else{

        return view('backend/login/index');
       }

     }
       public function index() 
     {

        $hotelBanner = new Hotel_Banner_model();
    $banner= $hotelBanner->asObject()->findAll();
    $mViewData['banner_list'] = $banner;
    //$this->mViewData['partial'] = 'admin/faqs/index';
    $mViewData['page_title'] = 'Hotel Banner';
    echo view('backend/hotel_banner/index', $mViewData); 
      }

      public function add()
      {
        
        $this->mViewData['form_action'] = 'create';
      $this->mViewData['page_title'] = 'Add Hotel Banner';
      echo view('backend/hotel_banner/form', $this->mViewData);

      }

      public function create()
     { 
        $hotelBanner= new Hotel_Banner_model();
      $this->mViewData['form_action'] = 'create';
      $this->mViewData['page_title'] = 'Add Hotel Banner';

       $rules=[

              'title' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Enter   Banner Title  ',
            ],
            ],
            'page' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Enter   page   ',
            ],
            ],
            
           
            'photo' => [
               'rules'  => 'uploaded[photo]|mime_in[photo,image/jpg,image/jpeg,image/png,image/gif]|max_size[photo,4096]|max_dims[photo,1930,1025]',
               'errors' => [
                'uploaded' => 'Please upload   image  ',
                'max_size' => 'uploaded  image size large ',
            ],
                

            ]
           ];
        if (!$this->validate($rules)) {
              
             $this->mViewData['validation']=$this->validator;
            return view('backend/hotel_banner/form',$this->mViewData);
        }
         else 
             {
                  //echo "hello"; die;
              $image=$this->request->getFile('photo');
              $name=$image->getRandomName();         
              $title=$this->request->getPost('title');
              $page=$this->request->getPost('page');
              $description=$this->request->getPost('description');
              $link=$this->request->getPost('link');
              $link_text=$this->request->getPost('link_text');
               
              
              if ($this->request->getPost('is_active') == "1")
              {
               $is_active = 1;
               }   
             else
               {

                $is_active = 0;

               }
              // print_r($is_active); die;
          $hotel_banner_data = [
                'title'     =>$title,
                'page' =>$page,
                'description'    =>$description,
                'link'        =>$link,
                'link_text'    =>$link_text,
                'banner_image'=>$name,
                'is_active'=>$is_active,
               
                
            ]; 
            //echo "<pre>";  print_r($hotel_des_data); die;
            
      if ($image->isValid() && !$image->hasMoved())
        {
           $upload_dir="uploads/hotel_banners/";
           $image->move($upload_dir,$name); 
         }
       $hotelBanner->insert($hotel_banner_data);
       $last_insert_id = $hotelBanner->getInsertID();
       foreach( $this->request->getFileMultiple('banner_image') as $file)
             {   
              $imagename=$file->getRandomName(); 
                
          if ($file->isValid() && !$file->hasMoved())
        {
           $upload_dir="uploads/hotel_banners/banner_gallery_image/";
           $file->move($upload_dir,$name); 
         }
                
      $Hotel_banner_image = new Hotel_Banner_Image_Model();

         $upload_data=[

                     'banner_id'=>$last_insert_id,
                     'image'=>$imagename
                    
                     ];
                
                $Hotel_banner_image->insert($upload_data); 
             }

      
       return redirect()->to('admin/hotel_banner');   

        }    

       
     }

      public function edit($id)
     {
      
      
      $hotelBanner = new Hotel_Banner_model();
      $banner=$hotelBanner->where('id', $id)->first();
      $this->mViewData['hotel_banner_edit'] = $banner; 
      $this->mViewData['page_title'] = 'Edit Hotel Banner';
      $this->mViewData['form_action'] = 'update/'.$id;
      return view('backend/hotel_banner/form',$this->mViewData);
     }
       public function update($id)
  {
   
     $hotelBanner = new Hotel_Banner_model();
    $this->mViewData['page_title'] = 'Edit Hotel Banner';
     $this->mViewData['form_action'] = 'update/'.$id;
     
      $rules=[

              'title' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please enter   title',
            ],
            ],
            'page' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Enter   page   ',
            ],
            ],
            
       ];
       if (!$this->validate($rules)) {

             $this->mViewData['validation']=$this->validator;
            return view('backend/hotel_banner/form',$this->mViewData);
        }else{  
               $image=$this->request->getFile('photo');
              //$name=$image->getName();         
              $title=$this->request->getPost('title');
              $page=$this->request->getPost('page');
              $description=$this->request->getPost('description');
              $link=$this->request->getPost('link');
              $link_text=$this->request->getPost('link_text');
                  
    
       $image_detail=$hotelBanner->where('id', $id)->first();
       $old_img_name=$image_detail['banner_image']; 
       if ($image->isValid() && !$image->hasMoved()) { 
            
            if (file_exists("uploads/hotel_banners/".$old_img_name)) {
              if ($old_img_name !='') {
                
              unlink("uploads/hotel_banners/".$old_img_name);
               }
            }
            $imageName=$image->getRandomName();
            
            $upload_dir="uploads/hotel_banners/";
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
        $hotel_banner_update = [
                'title'     =>$title,
                'page' =>$page,
                'description'    =>$description,
                'link'        =>$link,
                'link_text'    =>$link_text,
                'banner_image'=>$imageName,
                'is_active'=>$is_active,
               
                
            ]; 
             

            $test=$hotelBanner->update($id,$hotel_banner_update);
             // print_r($test); die;
      
       return redirect()->to('admin/hotel_banner'); 
   }
  } 
     public function changestatus($id)
    {  
        
        $hotelBanner = new Hotel_Banner_model();
        $des_changeStatus=$hotelBanner->where('id', $id)->first();
          
        
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
      
       $hotelBanner->update($id,$update_status_data);
       return redirect()->to('admin/hotel_banner');
    
  }

    public function delete($id)
    {
        $hotelBanner = new Hotel_Banner_model();
        $hotelBanner->where('id', $id)->delete();
      

        return redirect()->to('admin/hotel_banner');
    }

     public function hotel_banner_gallery($id)

    { 
        $Hotel_banner_image = new Hotel_Banner_Image_Model();
        $medias=$Hotel_banner_image->get_image_by_banner_id($id);
        $this->mViewData['medias'] = $medias;
        $this->mViewData['page_title'] = 'Hotel  Banner - Media Gallery';
        $view_file = 'backend/hotel_banner/hotel_banner_gallery';
        $this->session = \Config\Services::session();
        //$id = $this->session->get('id');
        $this->session->set('previous_id', $id);
        return view($view_file,$this->mViewData);
        
    }
    public function delete_banner_gallery($id)
    {
        $medias = new Hotel_Banner_Image_Model();
        $medias->where("id", $id)->delete();
         $this->session = \Config\Services::session();
          $id = $this->session->get('previous_id');
        return redirect()->to('admin/hotel_banner_gallery/'.$id); 
    }

}