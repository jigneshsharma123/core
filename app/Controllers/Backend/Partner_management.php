<?php
namespace App\Controllers\Backend;
use CodeIgniter\Controller; 
use App\Controllers\BaseController;
use App\Models\Partner;
use App\Models\Category;

class Partner_management extends BaseController
{
    public function __construct()
    { 
        $helpers = ['form'];
        helper(['form', 'url']);
        $session=session();
        $data['current_page'] = 'Pages';
        if ($session->has('admin_logged_in')) {
            $this->mViewData['session_data']=$session->get('admin_logged_in');
        } else {
            return view('backend/login/index');
        }
        $this->curUser = $this->mViewData['session_data']['id'];
        $categories = new Category();
        $this->mViewData['categories'] = $categories->where('module','partner')->findAll();
    }

    public function index() 
    {
        $partnerManagements = new Partner();
        $partnerManagements_data=$partnerManagements->findAll();
        $this->mViewData['partners_list'] = $partnerManagements_data;
        $this->mViewData['page_title'] = 'Admin Panel - Partners'; 
        echo view('backend/partner_management/index', $this->mViewData );      
    }
  
    public function add()
    { 
        $this->mViewData['form_action'] = 'create';
        $this->mViewData['page_title'] = 'Add Partner';
        echo view('backend/partner_management/form', $this->mViewData);
    }
  
    public function create()
    { 
        $this->mViewData['page_title'] = 'Add Partner';
        $this->mViewData['form_action'] = 'create';

        $rules=[
                'category_id' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Please select category'
                    ],
                ],
                'name' => [
                    'rules'  => 'required|is_unique[partners.name]',
                    'errors' => [
                        'required' => 'Please enter name ',
                        'is_unique' => 'Already exist',
                    ],
                ],
            ];
        $rules['image'] = [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[image]',
                    'is_image[image]',
                    'mime_in[image,image/jpg,image/jpeg,image/gif,image/png]',
                    'max_size[image,30000]',
                ],
                'errors' => [
                    'uploaded' => 'Please upload image ',
                    'is_image' => 'Please upload image file (jpg, jpeg, gif, png)',
                    'mime_in' => 'Please upload image file (jpg, jpeg, gif, png)',
                ],
            ];
        if (isset($_FILES['secondary_image']) && !empty($_FILES['secondary_image']['name'])) {
            $rules['secondary_image'] = [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[secondary_image]',
                    'is_image[secondary_image]',
                    'mime_in[secondary_image,image/jpg,image/jpeg,image/gif,image/png]',
                    'max_size[secondary_image,30000]',
                ],
                'errors' => [
                    'uploaded' => 'Please upload image ',
                    'is_image' => 'Please upload image file (jpg, jpeg, gif, png)',
                    'mime_in' => 'Please upload image file (jpg, jpeg, gif, png)',
                ],
            ];
        }
        
        if (!$this->validate($rules)) {
            $this->mViewData['validation']=$this->validator;
            return view('backend/partner_management/form',$this->mViewData);
        }else{      
            $partnerManagements = new Partner();
            $image_name = '';
            $secondary_image_name = '';
            if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
                $image=$this->request->getFile('image');
                $image_name=$image->getRandomName();
            }
            if (isset($_FILES['secondary_image']) && !empty($_FILES['secondary_image']['name'])) {
                $secondary_image=$this->request->getFile('secondary_image');
                $secondary_image_name=$secondary_image->getRandomName();
            }
            $name=$this->request->getPost('name');
            $category_id=$this->request->getPost('category_id');
            $info=$this->request->getPost('info');
            if ($this->request->getPost('is_active') == "1")
            {
                $is_active = 1;
            }
            else
            {
                $is_active = 0;
            }
          
            $partner_data = [
                'category_id'     =>$category_id,
                'name'     =>$name,
                'info'     =>$info,
                'image'=>$image_name,
                'secondary_image'=>$secondary_image_name,
                'created_by'=>$this->curUser,
                'is_active'       =>$is_active,
            ]; 
            if ($image_name != '') {
                $upload_dir="uploads/partners/";
                $image->move($upload_dir,$image_name);
            }
            if ($secondary_image_name != '') {
                $upload_dir="uploads/partners/";
                $secondary_image->move($upload_dir,$secondary_image_name); 
            }
            $partnerManagements->insert($partner_data);
            return redirect()->to('admin/partner_management');     
        }
    }
  
    public function edit($id)
    {
        $partnerManagement = new Partner();
        $partner=$partnerManagement->where('id', $id)->first();

        $partnerManagements = new Partner();
        $partnerManagements_data=$partnerManagements->findAll();

        $this->mViewData['partners'] = $partnerManagements_data;
        $this->mViewData['partner'] = $partner; 
        $this->mViewData['page_title'] = 'Edit Partner';
        $this->mViewData['form_action'] = 'update/'.$id;
        return view('backend/partner_management/form',$this->mViewData);    
    }
  
    public function update($id)
    {
        $this->mViewData['page_title'] = 'Edit Partner';
        $this->mViewData['form_action'] = 'update/'.$id;
        
        $rules=[
                'category_id' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Please select category'
                    ],
                ],
                'name' => [
                    'rules'  => 'required|is_unique[partners.name,id,'.$id.']',
                    'errors' => [
                        'required' => 'Please enter name ',
                        'is_unique' => 'Already exist',
                    ],
                ],
            ];
        if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
            $rules['image'] = [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[image]',
                    'is_image[image]',
                    'mime_in[image,image/jpg,image/jpeg,image/gif,image/png]',
                    'max_size[image,30000]',
                ],
                'errors' => [
                    'uploaded' => 'Please upload image ',
                    'is_image' => 'Please upload image file (jpg, jpeg, gif, png)',
                    'mime_in' => 'Please upload image file (jpg, jpeg, gif, png)',
                ],
            ];
        }
        if (isset($_FILES['secondary_image']) && !empty($_FILES['secondary_image']['name'])) {
            $rules['secondary_image'] = [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[secondary_image]',
                    'is_image[secondary_image]',
                    'mime_in[secondary_image,image/jpg,image/jpeg,image/gif,image/png]',
                    'max_size[secondary_image,30000]',
                ],
                'errors' => [
                    'uploaded' => 'Please upload image ',
                    'is_image' => 'Please upload image file (jpg, jpeg, gif, png)',
                    'mime_in' => 'Please upload image file (jpg, jpeg, gif, png)',
                ],
            ];
        }

        if (!$this->validate($rules)) {
            $partnerManagement = new Partner();
            $partner=$partnerManagement->where('id', $id)->first();
            $this->mViewData['validation']=$this->validator;
            $this->mViewData['partner'] = $partner; 
            return view('backend/partner_management/form',$this->mViewData);
        } else {
            $partnerManagements = new Partner();
            $image=$this->request->getFile('image');
            $secondary_image=$this->request->getFile('secondary_image');
            $category_id=$this->request->getPost('category_id');
            $name=$this->request->getPost('name');
            $info=$this->request->getPost('info');
            if ($this->request->getPost('is_active') == "1")
            {
                $is_active = 1;
            }   
            else
            {
                $is_active = 0;
            }
            if ($this->request->getPost('show_on_home_page') == "1")
            {
                $show_on_home_page = 1;
            }   
            else
            {
                $show_on_home_page = 0;
            }
      
            //$slugs = new Common_Functions();
            //$slug=$slugs->create_unique_slug($name,'Partner','slug','id',$id);
            $partner_detail=$partnerManagements->where('id', $id)->first();
            $old_img_name=$partner_detail['image']; 
            $old_secondary_img_name=$partner_detail['secondary_image']; 
          
            if ($image && $image->isValid() && !$image->hasMoved()) {             
                if ($old_img_name && file_exists("uploads/partners/".$old_img_name)) {
                    unlink("uploads/partners/".$old_img_name);
                }
                $imageName=$image->getRandomName();
                //print_r($imageName); die;
                $upload_dir="uploads/partners/";
                $image->move($upload_dir,$imageName);            
            } 
            else{
                $imageName=$old_img_name;
            }
          
            if ($secondary_image && $secondary_image->isValid() && !$secondary_image->hasMoved()) {             
                if ($old_secondary_img_name && file_exists("uploads/partners/".$old_secondary_img_name)) {
                    unlink("uploads/partners/".$old_secondary_img_name);
                }
                $secondary_imageName=$secondary_image->getRandomName();
                //print_r($imageName); die;
                $upload_dir="uploads/partners/";
                $secondary_image->move($upload_dir,$secondary_imageName);            
            } 
            else{
                $secondary_imageName=$old_secondary_img_name;
            }
               
        
            $partner_data = [
                'category_id'     =>$category_id,
                'name'     =>$name,
                'info'     =>$info,
                'image'=>$imageName,
                'secondary_image'=>$secondary_imageName,
                'updated_by'=>$this->curUser,
                'is_active'       =>$is_active,
            ];
            $partnerManagements->update($id,$partner_data);
            return redirect()->to('admin/partner_management'); 
        }
    }

    public function delete($id)
    {
        $Partners = new Partner();
        $Partners->where('id', $id)->delete();
        return redirect()->to('admin/partner_management');
    }

    public function changestatus($id)
    {  
        $Partners = new Partner();
        $Partner=$Partners->where('id', $id)->first();
        if($Partner['is_active']==true){
            $new_status=false;
        }
        else
        {
            $new_status=true;
        }
        $update_data=[
            'is_active'=>$new_status,
            'updated_by'=>$this->curUser,
        ];
        
        $Partners->update($id,$update_data);
        return redirect()->to('admin/partner_management');
    }
}
?>
