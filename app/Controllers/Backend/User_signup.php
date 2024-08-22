<?php

namespace App\Controllers\Backend;
use CodeIgniter\Controller; 
use App\Controllers\BaseController;
use App\Models\User_Signup_Model;

 

class User_signup extends BaseController
{
	public function __construct()
    { 
    	   helper(['form', 'url']);
        $session=session();
        $data['current_page'] = 'signup ';
      if ($session->has('admin_logged_in')) {
        
        $data['session_data']=$session->get('admin_logged_in');
       }else{

        return view('backend/login/index');
       }
       
      
    }
  public function index()
  {
    
    $user_detail = new User_Signup_Model();
    $user_detail= $user_detail->asObject()->findAll();
    $mViewData['user_list'] = $user_detail;
    $mViewData['page_title'] = 'User Signup';
    echo view('backend/user_signup/index', $mViewData); 
  }    	

  }
  ?>  
