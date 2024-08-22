<?php

namespace App\Controllers\Backend;
use CodeIgniter\Controller; 
use App\Controllers\BaseController;
use App\Models\Hotel_faqs_model;
use App\Models\HotelDetail;

class Hotel_faqs extends BaseController
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

        $hotel_faq = new Hotel_faqs_model();
    $faq= $hotel_faq->asObject()->findAll();
    $mViewData['faq_list'] = $faq;
    //$this->mViewData['partial'] = 'admin/faqs/index';
    $mViewData['page_title'] = 'Hotel FAQs';
    echo view('backend/hotel_faqs/index', $mViewData); 
      }

      public function add()
      {
        $hoteldetails = new HotelDetail();
      $hotel=$hoteldetails->findAll();
      $this->mViewData['hotels'] =$hotel;
      $this->mViewData['faqs_categories'] = unserialize(Faqs_category);
        $this->mViewData['form_action'] = 'create';
      $this->mViewData['page_title'] = 'Add Hotel Faqs';
      echo view('backend/hotel_faqs/form', $this->mViewData);

      }

      public function create()
   {   
      $hoteldetails = new HotelDetail();
      $hotel=$hoteldetails->findAll();
      $this->mViewData['hotels'] =$hotel;
      $this->mViewData['faqs_categories'] = unserialize(Faqs_category);
       $hotel_faq = new Hotel_faqs_model();
      $this->mViewData['page_title'] = 'Add Hotel Faqs';

       $rules=[

              'question' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please enter  question  ',
            ],
            ],
            'answer' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please enter  answer  ',
            ],
            ],

           ];
        if (!$this->validate($rules)) {
              
             $this->mViewData['validation']=$this->validator;
            return view('backend/hotel_faqs/form',$this->mViewData);
        }
         else 
             {
                  //echo "hello"; die;
              $hotel=$this->request->getPost('hotel');
              $category=$this->request->getPost('category'); 
              $question=$this->request->getPost('question');
              $answer=$this->request->getPost('answer');
              
              
              if ($this->request->getPost('is_active') == "1")
              {
               $is_active = 1;
               }   
             else
               {
              $is_active = 0;
               }
          $hotel_faq_data = [
                'hotel_id'=>$hotel,
                'category'=>$category,
                'question'     =>$question,
                'answer'    =>$answer,
                'is_active'       =>$is_active,
                ''
               
                
            ]; 
            
     
       $hotel_faq->insert($hotel_faq_data);

      
       return redirect()->to('admin/hotel_faqs');   

        }    

    } 
    public function edit($id)
  {
    $hoteldetails = new HotelDetail();
    $hotel=$hoteldetails->findAll();
    $this->mViewData['hotels'] =$hotel;
    $this->mViewData['faqs_categories'] = unserialize(Faqs_category);
    $hotel_faq = new Hotel_faqs_model();
    $HotelFaq=$hotel_faq->where('id', $id)->first();    
    $this->mViewData['hotel_faq_edit'] = $HotelFaq; 
    $this->mViewData['page_title'] = 'Edit Hotel Faq';
    $this->mViewData['form_action'] = 'update/'.$id;
    return view('backend/hotel_faqs/form',$this->mViewData);    

  }  

  public function update($id)
  {
    $this->mViewData['page_title'] = 'Edit Hotel Faqs';
     $this->mViewData['form_action'] = 'update/'.$id;
     
      $rules=[

              'question' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please Enter   question',
            ],
            ],
            
       ];
       if (!$this->validate($rules)) {

             $this->mViewData['validation']=$this->validator;
            return view('backend/hotel_faqs/form',$this->mViewData);
        }else{     
              $hotel=$this->request->getPost('hotel');
              $category=$this->request->getPost('category');    
              $question=$this->request->getPost('question');
              $answer=$this->request->getPost('answer');
              
          
          if ($this->request->getPost('is_active') == "1")
          {
              $is_active = 1;
           }   
          else
          {
              $is_active = 0;
            }
       $faq_update_data = [

                 'hotel_id'=>$hotel,
                'category'=>$category, 
                'question'     =>$question,
                'answer'    =>$answer,
                'is_active'       =>$is_active
               
               
            ]; 
             
            $hotel_faq = new Hotel_faqs_model();
            $test=$hotel_faq->update($id,$faq_update_data);
             // print_r($test); die;
      
       return redirect()->to('admin/hotel_faqs'); 
   }
  }

  public function delete($id)
    {
        $hotel_faq = new Hotel_faqs_model();
        $hotel_faq->where('id', $id)->delete();
        return redirect()->to('admin/hotel_faqs');
    }

    public function changestatus($id)
    {  
        
        $hotel_faq = new Hotel_faqs_model();
        $faqs_status=$hotel_faq->where('id', $id)->first();
        
        if( $faqs_status['is_active']==1){
           
            $new_status=0;
         }
       else
       {
        
         $new_status="1";
       }
       $update_data=[
       'is_active'=>$new_status

       ];
       $hotel_faq->update($id,$update_data);
       return redirect()->to('admin/hotel_faqs');
    
  }


   

 }
