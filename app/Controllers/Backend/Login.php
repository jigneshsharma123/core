<?php
namespace App\Controllers\Backend;
use CodeIgniter\Controller; 
use App\Controllers\BaseController;
use App\Models\Admin_model;

class Login extends BaseController
{
    public function __construct()
    { 
        helper(['form', 'url']);
    }
    
    public function index()
    {
        if (isset($_POST['submit'])) {
            $validation =$this->validate([
                'email' => [
                    'label' => 'Email',
                    'rules' => 'required|valid_email|is_not_unique[admins.email]',
                    'errors' => [
                        'required'      => 'Enter your Username.',
                        'valid_email'   => 'Please enter a valid  Username.',
                        'is_not_unique' => 'Username or password invalid'
                    ]
                ],           
                'password' => 'required|min_length[6]'
            ]);
            if (!$validation)
            {
                return view('backend/login/index',['validation'=>$this->validator]);
            }
            else
            {
                // login post data
                $email=$this->request->getPost('email');
                $password=$this->request->getPost('password');
                $Admin_model= new Admin_model(); 
                //fetch login detail 
                $login_pass=md5($password);
                $admin_login=$Admin_model->where('email',$email)->first();

                //$match_pass=$admin_login['password'];
                //echo "<pre>"; print_r($en_pass); die;
                if ($login_pass == $admin_login['password']) {
                    $ses_data = [
                        'id'    => $admin_login['id'],
                        'email' => $admin_login['email'],
                        'name'  => $admin_login['name'],
                        'role'  => $admin_login['role']
                    ];

                    $session=session();
                    $session->set('admin_logged_in',$ses_data);
                    //echo "login successfully";
                    return redirect()->to('admin/dashboard');
                }
                else{ 
                    session()->setFlashdata('fail','incorrect password');
                    return redirect()->to('admin/login');                
                }
            }
        } else{ //load login view page
            return view('backend/login/index');
        }
    }


    public function change_password()
    {
        $session=session();
        if ($session->has('admin_logged_in')) {
            //echo "login successfully";
            $admin_data=$session->get('admin_logged_in');
            $admin = new Admin_model();
            $admin_detail = $admin->where("id = ".$admin_data['id'])->first();
            $this->mViewData['form_action'] = 'update_password';
            $this->mViewData['admin'] = $admin_detail;
            $this->mViewData['page_title'] = 'Edit Admin';
            echo view('backend/admins/change_password',$this->mViewData);
        } else {
            return redirect()->to('admin/login');    
        }
    }

    public function update_password()
    {
        $id = $this->request->getPost('id');
        $rules = [
            'name'    => 'required',
            'email'    => 'required|valid_email|is_unique[admins.email,id,'.$id.']',
        ];
        $admin = new Admin_model();
        $admin_details = $admin->where("id = ".$id)->first();
        
        $password=$this->request->getPost('password');
        $newpassword=$this->request->getPost('newpassword');
        $confirmpassword=$this->request->getPost('confirmpassword');
        
        if ($newpassword != '') {
            $rules['newpassword'] = [
                'rules' => 'required|min_length[10]',
                  'errors' => [
                      'required' => 'New Password is required',
                      'min_length' => 'New Password should be of atleast 10 characters',
                  ],
                ];
            $rules['confirmpassword'] = [
                'rules' => 'required|matches[newpassword]',
                  'errors' => [
                      'matches' => 'Confirm Password should matches New Password'
                  ],
                ];
        }
        if (!$this->validate($rules) || $admin_details['password'] != md5($password)) {
            $this->mViewData['validation']=$this->validator;
            $this->mViewData['form_action'] = 'update_password';
            $this->mViewData['page_title'] = 'Edit Admin';
            $this->mViewData['admin_id'] = $id;
            if ($admin_details['password'] != md5($password)) {
                $this->mViewData['current_password_error'] = 'Incorrect Password';
            }
            echo view('backend/admins/change_password',$this->mViewData);
        } else {  
            $name=$this->request->getPost('name');
            $email=$this->request->getPost('email');
            $update_data=[
                'name'=>$name,
                'email'=>$email
            ];
            
            if ($newpassword != '') {
                $update_data['password'] = md5($newpassword);
            }
            if ($admin->update($id,$update_data)) {
                $ses_data = [
                    'id'    => $id,
                    'email' => $email,
                    'name'  => $name,
                    'role'  => $admin_details['role']
                ];

                $session=session();
                $session->set('admin_logged_in',$ses_data);
            }
            return redirect()->to('admin/dashboard');
        }
    }
}
