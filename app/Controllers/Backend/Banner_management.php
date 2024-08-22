<?php

namespace App\Controllers\Backend;
use CodeIgniter\Controller; 
use App\Controllers\BaseController;
use App\Models\Banner;
use App\Models\Service;
use App\Models\Page;
use CodeIgniter\Files\File;

class Banner_management extends BaseController
{
  public function __construct()
  { 
    $helpers = ['form'];
    helper(['form', 'url']);
    $session=session();
    $data['current_page'] = 'Pages';
    if ($session->has('admin_logged_in')) {
      $this->mViewData['session_data']=$session->get('admin_logged_in');
    }else{
      return view('backend/login/index');
    }
    $this->curUser = $this->mViewData['session_data']['id'];
  }

  public function index() 
  {
    $bannerManagements = new Banner();
    $bannerManagements_data=$bannerManagements->findAll();
    $this->mViewData['banners_list'] = $bannerManagements_data;
    $this->mViewData['page_title'] = 'Admin Panel - Banners'; 
    echo view('backend/banner_management/index', $this->mViewData );      
  }
  
  public function add()
  { 
    $this->mViewData['banner_for']='';
    $this->mViewData['form_action'] = 'create';
    $this->mViewData['page_title'] = 'Add Banner';
    echo view('backend/banner_management/form', $this->mViewData);
  }
  
  public function create()
  { 
    $this->mViewData['page_title'] = 'Add Banner';
    $this->mViewData['form_action'] = 'create';
    
    $rules=[
            'banner_for' => [
              'rules'  => 'required',
              'errors' => [
                  'required' => 'Please select the Banner For',
              ],
            ],
            'banner_for_id' => [
              'rules'  => 'required',
              'errors' => [
                  'required' => 'Please select the Banner For',
              ],
            ],
            'title' => [
              'rules'  => 'required',
              'errors' => [
                  'required' => 'Please enter title ',
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
    
    if (!$this->validate($rules)) {
      switch($this->request->getPost('banner_for')) {
        case 'service':
        $serviceModel = new Service();
        $banner_items=$serviceModel->select('id,name')->findAll();
        break;
        case 'page':
        $pageModel = new Page();
        $banner_items=$pageModel->select('id,title as name')->findAll();
        break;
        default:
        $banner_items = "";
        break;
      }
      $this->mViewData['banner_for']=$this->request->getPost('banner_for');
      $this->mViewData['banner_items']=$banner_items;
      $this->mViewData['validation']=$this->validator;
      return view('backend/banner_management/form',$this->mViewData);
    }else{      
      $bannerManagements = new Banner();
      $image_name = '';
      if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
        $image=$this->request->getFile('image');
        $image_name=$image->getRandomName();         
      }
      $banner_for=$this->request->getPost('banner_for');
      $banner_for_id=$this->request->getPost('banner_for_id');
      $title=$this->request->getPost('title');
      $sub_title=$this->request->getPost('sub_title');
      $banner_position=$this->request->getPost('banner_position');
      $button_text=$this->request->getPost('button_text');
      $button_link=$this->request->getPost('button_link');
      $button_link_target=$this->request->getPost('button_link_target');
      $banner_theme=$this->request->getPost('banner_theme');
      $banner_class=$this->request->getPost('banner_class');
      $sub_title_class=$this->request->getPost('sub_title_class');
      $title_class=$this->request->getPost('title_class');
      $slider_item_tag=$this->request->getPost('slider_item_tag');
      if ($this->request->getPost('is_active') == "1")
      {
        $is_active = 1;
      }   
      else
      {
        $is_active = 0;
      }

      $banner_data = [
        'banner_for'     =>$banner_for,
        'banner_for_id'     =>$banner_for_id,
        'title'     =>$title,
        'sub_title'     =>$sub_title,
        'banner_position'     =>$banner_position,
        'button_text'     =>$button_text,
        'button_link'     =>$button_link,
        'button_link_target'     =>$button_link_target,
        'image'=>$image_name,
        'banner_theme'=>$banner_theme,
        'banner_class'=>$banner_class,
        'sub_title_class'=>$sub_title_class,
        'title_class'=>$title_class,
        'slider_item_tag'=>$slider_item_tag,
        'created_by'=>$this->curUser,
        'is_active'       =>$is_active,
      ]; 
      if ($image_name != '') {
        $upload_dir="uploads/banners/";
        $image->move($upload_dir,$image_name); 
      }
      $bannerManagements->insert($banner_data);
      return redirect()->to('admin/banner_management');     
    }
  }
  
  public function edit($id)
  {
    $bannerManagement = new Banner();
    $banner=$bannerManagement->where('id', $id)->first();
    
    switch($banner['banner_for']) {
      case 'service':
      $serviceModel = new Service();
      $banner_items=$serviceModel->select('id,name')->findAll();
      break;
      case 'page':
      $pageModel = new Page();
      $banner_items=$pageModel->select('id,title as name')->findAll();
      break;
      default:
      $banner_items = "";
      break;
    }
    $bannerManagements = new Banner();
    $bannerManagements_data=$bannerManagements->findAll();
    
    $this->mViewData['banner_items'] = $banner_items;
    $this->mViewData['banners'] = $bannerManagements_data;
    $this->mViewData['banner'] = $banner; 
    $this->mViewData['page_title'] = 'Edit Banner';
    $this->mViewData['form_action'] = 'update/'.$id;
    return view('backend/banner_management/form',$this->mViewData);    
  }
  
  public function update($id)
  {
    $this->mViewData['page_title'] = 'Edit Banner';
    $this->mViewData['form_action'] = 'update/'.$id;
    
    $rules=[
            'banner_for' => [
              'rules'  => 'required',
              'errors' => [
                  'required' => 'Please select the Banner For',
              ],
            ],
            'banner_for_id' => [
              'rules'  => 'required',
              'errors' => [
                  'required' => 'Please select the Banner For',
              ],
            ],
            'title' => [
              'rules'  => 'required',
              'errors' => [
                  'required' => 'Please enter title ',
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

    if (!$this->validate($rules)) {
      switch($this->request->getPost('banner_for')) {
        case 'service':
        $serviceModel = new Service();
        $banner_items=$serviceModel->select('id,name')->findAll();
        break;
        case 'page':
        $pageModel = new Page();
        $banner_items=$pageModel->select('id,title as name')->findAll();
        break;
      }
      $this->mViewData['banner_for']=$this->request->getPost('banner_for');
      $this->mViewData['banner_items']=$banner_items;
      
      $bannerManagement = new Banner();
      $banner=$bannerManagement->where('id', $id)->first();
      $this->mViewData['validation']=$this->validator;
      $this->mViewData['banner'] = $banner; 
      return view('backend/banner_management/form',$this->mViewData);
    }else{      
      
      $bannerManagements = new Banner();
      $image_name = '';
      $image = '';
      if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
        $image=$this->request->getFile('image');
        $image_name=$image->getRandomName();         
      }
      $banner_for=$this->request->getPost('banner_for');
      $banner_for_id=$this->request->getPost('banner_for_id');
      $title=$this->request->getPost('title');
      $sub_title=$this->request->getPost('sub_title');
      $banner_position=$this->request->getPost('banner_position');
      $button_text=$this->request->getPost('button_text');
      $button_link=$this->request->getPost('button_link');
      $button_link_target=$this->request->getPost('button_link_target');
      $banner_theme=$this->request->getPost('banner_theme');
      $banner_class=$this->request->getPost('banner_class');
      $sub_title_class=$this->request->getPost('sub_title_class');
      $title_class=$this->request->getPost('title_class');
      $slider_item_tag=$this->request->getPost('slider_item_tag');
      if ($this->request->getPost('is_active') == "1")
      {
        $is_active = 1;
      }   
      else
      {
        $is_active = 0;
      }
      
      $banner_detail=$bannerManagements->where('id', $id)->first();
      $old_img_name=$banner_detail['image']; 
      
      if ($image && $image->isValid() && !$image->hasMoved()) {             
        if ($old_img_name && file_exists("uploads/banners/".$old_img_name)) {
          unlink("uploads/banners/".$old_img_name);
        }
        //$imageName=$image->getName();
        $imageName = $image->getRandomName();

        //print_r($imageName); die;
        $upload_dir="uploads/banners/";
        $image->move($upload_dir,$imageName);
      } 
      else{
        $imageName=$old_img_name;
      }
      
           
      $banner_data = [
        'banner_for'     =>$banner_for,
        'banner_for_id'     =>$banner_for_id,
        'title'     =>$title,
        'sub_title'     =>$sub_title,
        'banner_position'     =>$banner_position,
        'button_text'     =>$button_text,
        'button_link'     =>$button_link,
        'button_link_target'     =>$button_link_target,
        'image'=>$imageName,
        'banner_theme'=>$banner_theme,
        'banner_class'=>$banner_class,
        'sub_title_class'=>$sub_title_class,
        'title_class'=>$title_class,
        'slider_item_tag'=>$slider_item_tag,
        'created_by'=>$this->curUser,
        'is_active'       =>$is_active,
      ]; 
           
      $bannerManagements->update($id,$banner_data);
      return redirect()->to('admin/banner_management'); 
    }
  }

  public function delete($id)
  {
    $Banners = new Banner();
    $Banners->where('id', $id)->delete();
    return redirect()->to('admin/banner_management');
  }

  public function changestatus($id)
  {  
    $Banners = new Banner();
    $Banner=$Banners->where('id', $id)->first();
    if($Banner['is_active']==true){
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
    
    $Banners->update($id,$update_data);
    return redirect()->to('admin/banner_management');
  }
  
  public function banner_items($banner_for)
  {
    switch($banner_for) {
      case 'service':
      $serviceModel = new Service();
      $banner_items=$serviceModel->select('id,name')->findAll();
      break;
      case 'page':
      $pageModel = new Page();
      $banner_items=$pageModel->select('id,title as name')->findAll();
      break;
    }
    echo json_encode($banner_items);
  }
}
?>  
