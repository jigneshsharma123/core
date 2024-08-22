<?php

namespace App\Controllers\Frontend;
use CodeIgniter\Controller; 
use App\Controllers\BaseController;
use App\Models\User_Signup_Model;

class SignupController extends BaseController
{ 
	


     public function register()
     {
         $validation = \Config\Services::validation();
       $rules=[

              'username' => [
            'rules'  => 'required|is_unique[user_signup.user_name]',
            'errors' => [
                'required' => 'Please enter  username  ',
                'is_unique'=>'username already exits'
            ]
            ],
            'email' => [
            'rules'  => 'required|valid_email',
            'errors' => [
                'required' => 'Please enter  email  ',
                'valid_email' => 'Please enter  valid email',
            ]
            ],
            'password' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please enter  password  ',
            ]
            ],
            'cpassword' => [
            'rules'  => 'required|matches[password]',
            'errors' => [
                'required' => 'Please enter  confirm password  ',
                'matches'=>'please enter password and confirm password same'
            ]
            ]
            ];
         if (!$this->validate($rules)) {
            // Form validation failed, return the errors
           $data['success'] = false;
            $data['validation']=$this->validator;
            return $this->response->setJSON([
                'success' => false,
                'errors'  => $validation->getErrors(),
            ]);
        } else {   

      $userModel = new User_Signup_Model();
           
       $userData = [
                'user_name' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'cpassword' => $this->request->getPost('cpassword'),
                'is_active'=>1

            ];
        $userModel->insert($userData);
        $data['success'] = true;
            $data['message'] = 'Your  account created  successfully.';
          }  //print_r($userData); die;
        return $this->response->setJSON($data);
       
     }

     public function login()
    {
      $userModel = new User_Signup_Model();
      if ($this->request->getMethod() === 'post') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $user = $userModel->where('user_name', $username)->first();

            if ($user && password_verify($password, $user['password'])) {

              $ses_data = [
                    'id'    => $user['id'],
                    'email' => $user['email'],
                    'username' => $user['user_name']
                    
                ];

                $session=session();
                $session->set('user_logged_in',$ses_data);
                
                return redirect()->to('/')->with('success', 'Login successful!');
            } else
               {
                return redirect()->back()->with('error', 'Invalid username or password.');
               }
        }


     }

  }   