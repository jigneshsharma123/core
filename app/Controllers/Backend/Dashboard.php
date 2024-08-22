<?php
namespace App\Controllers\Backend;
use CodeIgniter\Controller; 
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function __construct()
    { 
        helper(['form', 'url']);
    }
    
    public function index()
    {
        $session=session();
        if ($session->has('admin_logged_in')) {
            //echo "login successfully";
            $this->mViewData['session_data']=$session->get('admin_logged_in');
           // echo "<pre>"; print_r($this->mViewData['session_data']); die;
            $data['page_title'] = 'Dashboard';
            echo view('backend/dashboard',$data);
        } else {
            return view('backend/login/index');
        }
    }
    
    public function logout()
    {
        if (session()->has('admin_logged_in'))
        {
            session()->remove('admin_logged_in');
            return redirect()->to('admin/login');
        }
    }
}
