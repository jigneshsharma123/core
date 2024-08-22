<?php

namespace App\Controllers\Backend;
use CodeIgniter\Controller; 
use App\Controllers\BaseController;
use App\Models\Custom_link;

class Custom_links extends BaseController
{
	public function __construct()
    { 
    	helper(['form', 'url']);
        $session=session();
        $data['current_page'] = 'Categories';
      if ($session->has('admin_logged_in')) {
        //echo "login successfully";
        $this->mViewData['session_data']=$session->get('admin_logged_in');
       // echo "<pre>"; print_r($this->mViewData['session_data']); die;
       }else{

        return view('backend/login/index');
       }
      
    }
  function index() 
  {   
    $custom_links = new Custom_link();
    $custom_links=$custom_links->findAll();
    $mViewData['page_title'] = 'Admin Panel - Custom Links';
    $mViewData['custom_links_list'] = $custom_links;
    echo view('backend/custom_links/index', $mViewData);
  }    

  }