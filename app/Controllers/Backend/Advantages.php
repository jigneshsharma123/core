<?php

namespace App\Controllers\Backend;
use CodeIgniter\Controller; 
use App\Controllers\BaseController;
use App\Models\Advantage;
use App\Libraries\Common_Functions;

class Advantages extends BaseController
{ 
	public function __construct()
    {   $helpers = ['form'];
        helper(['form', 'url']);
        $session=session();
        $data['current_page'] = 'Partner';
      if ($session->has('admin_logged_in')) {
        
        $this->mViewData['session_data']=$session->get('admin_logged_in');
       
       }else{

        return view('backend/login/index');
       }
      
    }
     public function index() 
     {
       $advantages = new Advantage();
       $advantage_data= $advantages->findAll();
      $mViewData['advantage_list'] = $advantage_data;
      $mViewData['page_title'] = 'Admin Panel - Advantages'; 
      echo view('backend/advantages/index', $mViewData );  

     }


  }   