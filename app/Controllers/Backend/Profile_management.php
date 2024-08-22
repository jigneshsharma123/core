<?php

namespace App\Controllers\Backend;
use CodeIgniter\Controller; 
use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\Profile;
use App\Libraries\Common_Functions;

class Profile_management extends BaseController
{ 
    public function __construct()
    {   
        helper(['form', 'url']);
        $session=session();
        $data['current_page'] = 'Profile Management';
        if ($session->has('admin_logged_in')) {
            $this->mViewData['session_data']=$session->get('admin_logged_in');
        } else {
            return view('backend/login/index');
        }
        $this->curUser = $this->mViewData['session_data']['id'];
        $this->mViewData['toolbar'] = [
           ['Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat'],
           ['Image', 'Table', 'HorizontalRule', 'SpecialChar'],
           ['Link', 'Unlink', 'Anchor'],
           ['Styles', 'Format'],
           ['Scayt'],
           ['Maximize'],
           ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote'],
           ['Source'],    
        ];
        $this->mViewData['width'] = '100%';
        $this->mViewData['height'] = '300px';
        $this->mViewData['language'] = 'en';
        $this->mViewData['autoParagraph'] = false;
        $this->mViewData['fillEmptyBlocks'] = false;
        $this->mViewData['forcePasteAsPlainText'] = true;
        $categories = new Category();
        $this->mViewData['categories'] = $categories->where('module','profile')->findAll();
    }
    
    public function index() 
    {
        $profileManagements = new Profile();
        $profileManagements_data=$profileManagements->findAll();
        $this->mViewData['profileManagement_list'] = $profileManagements_data;
        $this->mViewData['page_title'] = 'Admin Panel - Profiles'; 
        echo view('backend/profile_management/index', $this->mViewData );      
    }

    public function add()
    { 
        $this->mViewData['form_action'] = 'create';
        $this->mViewData['page_title'] = 'Add Profile';
        echo view('backend/profile_management/form', $this->mViewData);
    }
  
    public function create()
    { 
        $this->mViewData['page_title'] = 'Add Profile';
   
        $rules=[
            'category_id' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Please select category',
                ],
            ],
            'fname' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Please enter first name',
                ],
            ],
            'image' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[image]',
                    'is_image[image]',
                    'mime_in[image,image/jpg,image/jpeg,image/gif,image/png]',
                    'max_size[image,30000]',
                    //'max_dims[featured_image,1024,768]',
                ],
            ],
        ];
        if (!$this->validate($rules)) {
            $this->mViewData['validation']=$this->validator;
            return view('backend/profile_management/form',$this->mViewData);
        } else {      
            $profileManagements = new Profile();
            $image=$this->request->getFile('image');
            $name=$image->getRandomName();
            $secondary_image_name = '';
            if (isset($_FILES['secondary_image']) && !empty($_FILES['secondary_image']['name'])) {
                $secondary_image=$this->request->getFile('secondary_image');
                $secondary_image_name=$secondary_image->getRandomName();
            }
            $category_id=$this->request->getPost('category_id');
            $fname=$this->request->getPost('fname');
            $mname=$this->request->getPost('mname');
            $lname=$this->request->getPost('lname');
            $profile_name=$fname." ".$mname." ".$lname;
            //print_r($profile_name); die;
            $slugs = new Common_Functions();
            $slug=$slugs->create_unique_slug($profile_name,'Profile');
            $email_id=$this->request->getPost('email_id');
            $phone_number=$this->request->getPost('phone_number');
            $alt_phone_number=$this->request->getPost('alt_phone_number');
            $department=$this->request->getPost('department');
            $designation=$this->request->getPost('designation');
            $brief=$this->request->getPost('brief');
            $description=$this->request->getPost('profile_description');
            $sort_order=$this->request->getPost('sort_order');
            if ($this->request->getPost('is_active') == "1")
            {
                $is_active = 1;
            }   
            else
            {
                $is_active = 0;
            }
            $profile_data = [
                'category_id'     =>$category_id,
                'first_name'     =>$fname,
                'middle_name'    =>$mname,
                'last_name'      =>$lname,
                'slug'           =>$slug,
                'email_id'       =>$email_id,
                'phone_number'   =>$phone_number,
                'other_phone_number'  =>$alt_phone_number,
                'department'      =>$department,                
                'designation'     =>$designation,
                'brief'  =>$brief,
                'profile_description'=>$description,
                'profile_photo'=>$name,
                'secondary_image'=>$secondary_image_name,
                'is_active'       =>$is_active,
                'created_by'    =>$this->curUser,
                'sort_order' =>$sort_order
            ]; 
            $upload_dir="uploads/profiles/";
            if ($name != '') {
                $image->move($upload_dir,$name);
            }
            if ($secondary_image_name != '') {
                $secondary_image->move($upload_dir,$secondary_image_name); 
            }
            
            $profileManagements->insert($profile_data);
            return redirect()->to('admin/profile_management');     
        }
    }

    public function edit($id)
    {    
        $profileManagements = new Profile();
        $profile=$profileManagements->where('id', $id)->first();    
        $this->mViewData['profile'] = $profile; 
        $this->mViewData['page_title'] = 'Edit Profile';
        $this->mViewData['form_action'] = 'update/'.$id;
        return view('backend/profile_management/form',$this->mViewData);
    }
    
    public function update($id)
    {
        $this->mViewData['page_title'] = 'Edit Profile';
        $this->mViewData['form_action'] = 'update/'.$id;
        $rules=[
            'category_id' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Please select category',
                ],
            ],
            'fname' => [
                'rules'  => 'required','valid_email',
                'errors' => [
                    'required' => 'Please enter   first name  ',
                    'valid_email'=>'Please enter valid email'
                ],
            ],
             'designation' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Please enter   designation   ',
                ],
            ],            
       ];
       if (!$this->validate($rules)) {
            $this->mViewData['validation']=$this->validator;
            return view('backend/profile_management/form',$this->mViewData);
        }else{      
            $profileManagements = new Profile();
            $category_id=$this->request->getPost('category_id');
            $fname=$this->request->getPost('fname');
            $mname=$this->request->getPost('mname');
            $lname=$this->request->getPost('lname');
            $email_id=$this->request->getPost('email_id');
            $phone_number=$this->request->getPost('phone_number');
            $alt_phone_number=$this->request->getPost('alt_phone_number');
            $department=$this->request->getPost('department');
            $designation=$this->request->getPost('designation');
            $brief=$this->request->getPost('brief');
            $description=$this->request->getPost('profile_description');
            $sort_order=$this->request->getPost('sort_order');
            $image=$this->request->getFile('image');
            $secondary_image=$this->request->getFile('secondary_image');
            
            $profile_detail=$profileManagements->where('id', $id)->first();
            $old_img_name=$profile_detail['profile_photo']; 
            $old_secondary_image_name=$profile_detail['secondary_image']; 
            if ($image->isValid() && !$image->hasMoved()) { 
                if ($old_img_name && file_exists("uploads/profiles/".$old_img_name)) {
                    unlink("uploads/profiles/".$old_img_name);
                }
                $imageName=$image->getRandomName();
                //print_r($imageName); die;
                $upload_dir="uploads/profiles/";
                $image->move($upload_dir,$imageName);             
            }
            else{
                $imageName=$old_img_name;
            }
            if ($secondary_image->isValid() && !$secondary_image->hasMoved()) { 
                if ($old_secondary_image_name && file_exists("uploads/profiles/".$old_secondary_image_name)) {
                    unlink("uploads/profiles/".$old_secondary_image_name);
                }
                $secondary_imageName=$secondary_image->getRandomName();
                //print_r($imageName); die;
                $upload_dir="uploads/profiles/";
                $secondary_image->move($upload_dir,$secondary_imageName);             
            }
            else{
                $secondary_imageName=$old_secondary_image_name;
            }
           
            if ($this->request->getPost('is_active') == "1")
            {
                $is_active = 1;
            }
            else
            {
                $is_active = 0;
            }
            $profile_update_data = [
                'category_id'     =>$category_id,
                'first_name'     =>$fname,
                'middle_name'    =>$mname,
                'last_name'      =>$lname,
                'email_id'       =>$email_id,
                'phone_number'   =>$phone_number,
                'other_phone_number'  =>$alt_phone_number,
                'department'      =>$department,                
                'designation'     =>$designation,
                'brief'  =>$brief,
                'profile_description'=>$description,
                'profile_photo'=>$imageName,
                'secondary_image'=>$secondary_imageName,
                'is_active'       =>$is_active,
                'updated_by'    =>$this->curUser,
                'sort_order'=>$sort_order
            ]; 
            
            $profileManagements->update($id,$profile_update_data);
            return redirect()->to('admin/profile_management'); 
        }
    }
    
    public function delete($id)
    {
        $Profiles = new Profile();
        $Profiles->where('id', $id)->delete();
        return redirect()->to('admin/profile_management');
    }
    
    public function changestatus($id)
    {  
        //echo "$id"; die;
        $Profiles = new Profile();
        $Profile=$Profiles->where('id', $id)->first();
        //print_r($categories); die;
        if( $Profile['is_active']==1){
            $new_status=0;
        }
        else
        {
            $new_status="1";
        }
        $update_data=[
            'is_active'=>$new_status,
            'updated_by'=>$this->curUser
        ];
        $Profiles->update($id,$update_data);
        return redirect()->to('admin/profile_management');
    }
 }
