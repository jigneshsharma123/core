<?php

namespace App\Controllers\Backend;
use CodeIgniter\Controller; 
use App\Controllers\BaseController;
use App\Models\Service;
use App\Models\Faq_group;
use App\Libraries\Common_Functions;

class Service_management extends BaseController
{ 
	public function __construct()
  {   
    helper(['form', 'url']);
    $session=session();
    $data['current_page'] = 'Service Management';
    if ($session->has('admin_logged_in')) {
      $this->mViewData['session_data']=$session->get('admin_logged_in');
    }else{
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
  }
  
  public function index() 
  {
    $serviceManagements = new Service();
    $serviceManagements_data=$serviceManagements->findAll();
    $this->mViewData['serviceManagement_list'] = $serviceManagements_data;
    $this->mViewData['page_title'] = 'Admin Panel - Services'; 
    echo view('backend/service_management/index', $this->mViewData );      
  }

  public function add()
  { 
    $serviceManagements = new Service();
    $serviceManagements_data=$serviceManagements->findAll();
    $faqGroupsModel = new Faq_group();
    $faqGroups=$faqGroupsModel->findAll();
    $this->mViewData['faqGroups'] = $faqGroups;
    $this->mViewData['services'] = $serviceManagements_data;
    $this->mViewData['form_action'] = 'create';
    $this->mViewData['page_title'] = 'Add Service';
    echo view('backend/service_management/form', $this->mViewData);
  }
  
  public function create()
  { 
    $this->mViewData['page_title'] = 'Add Service';
    $this->mViewData['form_action'] = 'create';
    $faqGroupsModel = new Faq_group();
    $faqGroups=$faqGroupsModel->findAll();
    $this->mViewData['faqGroups'] = $faqGroups;

    $rules=[
            'name' => [
              'rules'  => 'required',
              'errors' => [
                  'required' => 'Please enter service title ',
              ],
            ],
            'overview' => [
              'rules'  => 'required',
              'errors' => [
                  'required' => 'Please enter service overview ',
              ],
            ]
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
      $serviceManagements = new Service();
      $serviceManagements_data=$serviceManagements->findAll();
      $this->mViewData['services'] = $serviceManagements_data;
      $this->mViewData['validation']=$this->validator;
      return view('backend/service_management/form',$this->mViewData);
    }else{      
      $serviceManagements = new Service();
      $image_name = '';
      if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
        $image=$this->request->getFile('image');
        $image_name=$image->getRandomName();         
      }        
      $parent_id=$this->request->getPost('parent_id');
      $template=$this->request->getPost('template');
      $faq_group_id=$this->request->getPost('faq_group_id');
      $name=$this->request->getPost('name');
      $overview=$this->request->getPost('overview');
      $why_us=$this->request->getPost('why_us');
      $powerful_strategies=$this->request->getPost('powerful_strategies');
      $sort_order=$this->request->getPost('sort_order');
      if ($this->request->getPost('is_active') == "1")
      {
        $is_active = 1;
      }   
      else
      {
        $is_active = 0;
      }
      
      $slugs = new Common_Functions();
      $slug=$slugs->create_unique_slug($name,'Service');
      
      $service_data = [
        'parent_id'     =>$parent_id,
        'faq_group_id'     =>$faq_group_id,
        'name'     =>$name,
        'slug'     =>$slug,
        'overview'    =>$overview,
        'why_us'      =>$why_us,
        'powerful_strategies'           =>$powerful_strategies,
        'sort_order'           =>$sort_order,
        'image'=>$image_name,
        'template'=>$template,
        'created_by'=>$this->curUser,
        'is_active'       =>$is_active,
      ];
      $serviceManagements->insert($service_data); 
      if ($image_name != '') {
        $upload_dir="uploads/services/";
        $image->move($upload_dir,$image_name); 
      }
      return redirect()->to('admin/service_management');     
    }
  }
  
  public function edit($id)
  {
    $faqGroupsModel = new Faq_group();
    $faqGroups=$faqGroupsModel->findAll();
    $this->mViewData['faqGroups'] = $faqGroups;
    
    $serviceManagement = new Service();
    $service=$serviceManagement->where('id', $id)->first();
    
    $serviceManagements = new Service();
    $serviceManagements_data=$serviceManagements->findAll();
    
    $this->mViewData['services'] = $serviceManagements_data;
    $this->mViewData['service'] = $service; 
    $this->mViewData['page_title'] = 'Edit Service';
    $this->mViewData['form_action'] = 'update/'.$id;
    return view('backend/service_management/form',$this->mViewData);    
  }
  
  public function update($id)
  {
    $this->mViewData['page_title'] = 'Edit Service';
    $this->mViewData['form_action'] = 'update/'.$id;
    $faqGroupsModel = new Faq_group();
    $faqGroups=$faqGroupsModel->findAll();
    $this->mViewData['faqGroups'] = $faqGroups;
    
    $rules=[
            'name' => [
              'rules'  => 'required',
              'errors' => [
                  'required' => 'Please enter service title ',
              ],
            ],
            'overview' => [
              'rules'  => 'required',
              'errors' => [
                  'required' => 'Please enter service overview ',
              ],
            ]
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
      $serviceManagements = new Service();
      $serviceManagements_data=$serviceManagements->findAll();
      $this->mViewData['services'] = $serviceManagements_data;
      $this->mViewData['validation']=$this->validator;
      return view('backend/service_management/form',$this->mViewData);
    }else{      
      
      $serviceManagements = new Service();
      $image=$this->request->getFile('image');
      $image_name=$image->getRandomName();         
      $faq_group_id=$this->request->getPost('faq_group_id');
      $template=$this->request->getPost('template');
      $parent_id=$this->request->getPost('parent_id');
      $name=$this->request->getPost('name');
      $overview=$this->request->getPost('overview');
      $why_us=$this->request->getPost('why_us');
      $powerful_strategies=$this->request->getPost('powerful_strategies');
      $sort_order=$this->request->getPost('sort_order');
      if ($this->request->getPost('is_active') == "1")
      {
        $is_active = 1;
      }   
      else
      {
        $is_active = 0;
      }
      
      //$slugs = new Common_Functions();
      //$slug=$slugs->create_unique_slug($name,'Service','slug','id',$id);
      $service_detail=$serviceManagements->where('id', $id)->first();
      $old_img_name=$service_detail['image']; 
      
      if ($image && $image->isValid() && !$image->hasMoved()) {             
        if ($old_img_name && file_exists("uploads/services/".$old_img_name)) {
          unlink("uploads/services/".$old_img_name);
        }
        $imageName=$image->getRandomName();
        //print_r($imageName); die;
        $upload_dir="uploads/services/";
        $image->move($upload_dir,$imageName);            
      } 
      else{
        $imageName=$old_img_name;
      }   
               
      $service_data = [
        'parent_id'     =>$parent_id,
        'faq_group_id'     =>$faq_group_id,
        'name'     =>$name,
        'overview'    =>$overview,
        'template'    =>$template,
        'why_us'      =>$why_us,
        'powerful_strategies'           =>$powerful_strategies,
        'sort_order'           =>$sort_order,
        'image'=>$imageName,
        'updated_by'=>$this->curUser,
        'is_active'       =>$is_active,
      ]; 
           
      $serviceManagements->update($id,$service_data);
      return redirect()->to('admin/service_management'); 
    }
  }

  public function delete($id)
  {
    $Services = new Service();
    $Services->where('id', $id)->delete();
    return redirect()->to('admin/service_management');
  }

  public function changestatus($id)
  {  
    $Services = new Service();
    $Service=$Services->where('id', $id)->first();
    if( $Service['is_active']==1){
      $new_status=0;
    }
    else
    {
      $new_status="1";
    }
    $update_data=[
      'updated_by'=>$this->curUser,
      'is_active'=>$new_status
    ];
    $Services->update($id,$update_data);
    return redirect()->to('admin/service_management');
  }
}
