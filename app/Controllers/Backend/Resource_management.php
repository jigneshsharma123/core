<?php

namespace App\Controllers\Backend;
use CodeIgniter\Controller; 
use App\Controllers\BaseController;
use App\Models\Resource_material;
use App\Models\Category;
use App\Libraries\Common_Functions;

class Resource_management extends BaseController
{ 
    public function __construct()
    {
        helper(['form', 'url']);
        $session=session();
        $data['current_page'] = 'Resource Management';
        if ($session->has('admin_logged_in')) {
          $this->mViewData['session_data']=$session->get('admin_logged_in');
        }else{
          return view('backend/login/index');
        }
        $this->curUser = $this->mViewData['session_data']['id'];
        $this->mViewData['toolbar'] = [          
            ['Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat', 'CopyFormatting'],
            ['JustifyCenter','JustifyLeft','JustifyRight','JustifyBlock'],
            ['Link', 'Unlink', 'Anchor'],
            ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord'],
            ['Superscript', 'Subscript', '-', 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote'],
            ['TextColor', 'BGColor'],
            ['Find', 'Replace', 'SelectAll'],
            '/',
            ['Format', 'FontSize', '-', 'Image', 'Table', 'HorizontalRule', 'SpecialChar', 'Smiley'],
            ['Scayt'],
            ['CreateDiv'],
            ['Maximize'],
            ['Source'],
        ];
        $this->mViewData['width'] = '100%';
        $this->mViewData['height'] = '300px';
        $this->mViewData['language'] = 'en';
        $this->mViewData['autoParagraph'] = false;
        $this->mViewData['startupOutlineBlocks'] = false;
        $this->mViewData['fillEmptyBlocks'] = false;
        $this->mViewData['extraAllowedContent'] = 'section;span;ul;li;table;td;style;*[id];*(*);*{*}';
        $this->mViewData['forcePasteAsPlainText'] = true;
        $categories = new Category();
        $this->mViewData['categories'] = $categories->where('module','resource')->findAll();
    }

    public function index() 
    {
        $categories = new Category();
        $categories= $categories->where('module','resource')->findAll();
        $category_names = array();
        $category_names[0] = '';
        foreach($categories as $category) {
            $category_names[$category['id']] = $category['title'];
        }
        $resourceManagements = new Resource_material();
        $resourceManagements_data=$resourceManagements->findAll();
        $this->mViewData['category_names'] = $category_names;
        $this->mViewData['resourceManagement_list'] = $resourceManagements_data;
        $this->mViewData['page_title'] = 'Admin Panel - Resources';
        echo view('backend/resource_management/index', $this->mViewData);
    }

    public function add()
    { 
        $this->mViewData['form_action'] = 'create';
        $this->mViewData['page_title'] = 'Add Resource';
        echo view('backend/resource_management/form', $this->mViewData);
    }

  public function create()
  { 
    $this->mViewData['page_title'] = 'Add Resource';
    $this->mViewData['form_action'] = 'create';

    $rules=[
            'category_id' => [
              'rules'  => 'required',
              'errors' => [
                  'required' => 'Please select category',
              ],
            ],
            'title' => [
              'rules'  => 'required',
              'errors' => [
                  'required' => 'Please enter resource title ',
              ],
            ]
          ];
    
    if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
      $rules['image'] = [
              'rules' => [
                  'uploaded[image]',
                  'is_image[image]',
                  'mime_in[image,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                  'max_size[image,30000]',
              ],
              'errors' => [
                  'uploaded' => 'Please upload resource image ',
                  'is_image' => 'Please upload image file (jpg, jpeg, gif, png)',
                  'mime_in' => 'Please upload image file (jpg, jpeg, gif, png)',
              ],
            ];
    }
    if (isset($_POST['external_link']) && !empty($_POST['external_link'])) {
        $rules['external_link'] = [
              'rules' => [
                  'valid_url_strict',
              ],
              'errors' => [
                  'valid_url' => 'Please enter valid link ',
              ],
            ];
    }
    
    if (isset($_FILES['attachment']) && !empty($_FILES['attachment']['name'])) {
      $rules['attachment'] = [
              'label' => 'PDF File',
              'rules' => [
                  'uploaded[attachment]',
                  'mime_in[attachment,application/pdf]',
                  'max_size[attachment,30000]',
              ],
              'errors' => [
                  'uploaded' => 'Please upload resource pdf ',
                  'mime_in' => 'Please upload pdf file ',
              ],
            ];
    }
    
    if (!$this->validate($rules)) {
      $this->mViewData['validation']=$this->validator;
      return view('backend/resource_management/form',$this->mViewData);
    }else{      
      $resourceManagements = new Resource_material();
      $image_name = '';
      $attachment_name = '';
      if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
        $image=$this->request->getFile('image');
        $image_name=$image->getRandomName();         
      }        
      $attachment_name = '';
      if (isset($_FILES['attachment']) && !empty($_FILES['attachment']['name'])) {
        $attachment=$this->request->getFile('attachment');
        $attachment_name=$attachment->getRandomName();         
      }        
      $category_id=$this->request->getPost('category_id');
      $title=$this->request->getPost('title');
      $brief=$this->request->getPost('brief');
      $publish_date=$this->request->getPost('publish_date');
      $external_link=$this->request->getPost('external_link');
      if ($this->request->getPost('is_active') == "1")
      {
        $is_active = 1;
      }   
      else
      {
        $is_active = 0;
      }
      
      $slugs = new Common_Functions();
      $slug=$slugs->create_unique_slug($title,'Resource_material');
      
      $resource_data = [
        'category_id'     =>$category_id,
        'title'     =>$title,
        'slug'     =>$slug,
        'brief'    =>$brief,
        'image'=>$image_name,
        'publish_date'=>$publish_date,
        'external_link'=>$external_link,
        'attachment'=>$attachment_name,
        'created_by'=>$this->curUser,
        'is_active'       =>$is_active,
      ];
      $resourceManagements->insert($resource_data); 
      $last_id_p = $resourceManagements->getInsertID();
      if ($image_name != '') {
        $upload_dir="uploads/resources/";
        $image->move($upload_dir,$image_name); 
      }
      if ($attachment_name != '') {
        $upload_dir="uploads/resources/";
        $attachment->move($upload_dir,$attachment_name); 
      }
      $resource_data = [
        'image'=>$image_name,
        'attachment'=>$attachment_name
      ]; 
           
      $resourceManagements->update($last_id_p,$resource_data);
      
      return redirect()->to('admin/resource_management');     
    }
  }
  
  public function edit($id)
  {
    $resourceManagement = new Resource_material();
    $resource=$resourceManagement->where('id', $id)->first();
    
    $resourceManagements = new Resource_material();
    $resourceManagements_data=$resourceManagements->findAll();
    
    $this->mViewData['resources'] = $resourceManagements_data;
    $this->mViewData['resource'] = $resource; 
    $this->mViewData['page_title'] = 'Edit Resource';
    $this->mViewData['form_action'] = 'update/'.$id;
    return view('backend/resource_management/form',$this->mViewData);    
  }
  
  public function update($id)
  {
    $this->mViewData['page_title'] = 'Edit Resource';
    $this->mViewData['form_action'] = 'update/'.$id;
    
    $rules=[
            'category_id' => [
              'rules'  => 'required',
              'errors' => [
                  'required' => 'Please select category',
              ],
            ],
            'title' => [
              'rules'  => 'required',
              'errors' => [
                  'required' => 'Please enter resource title ',
              ],
            ]
        ];
    
    if (isset($_POST['external_link']) && !empty($_POST['external_link'])) {
        $rules['external_link'] = [
              'rules' => [
                  'valid_url_strict',
              ],
              'errors' => [
                  'valid_url' => 'Please enter valid link ',
              ],
            ];
    }
    
    if (isset($_FILES['attachment']) && !empty($_FILES['attachment']['name'])) {
      $rules['attachment'] = [
              'rules' => [
                  'uploaded[attachment]',
                  'mime_in[attachment,application/pdf]',
                  'max_size[attachment,30000]',
              ],
              'errors' => [
                  'uploaded' => 'Please upload resource pdf ',
                  'mime_in' => 'Please upload pdf file ',
              ],
            ];
    }
    if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
      $rules['image'] = [
              'rules' => [
                  'uploaded[image]',
                  'is_image[image]',
                  'mime_in[image,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                  'max_size[image,30000]',
              ],
              'errors' => [
                  'uploaded' => 'Please upload resource image ',
                  'is_image' => 'Please upload image file (jpg, jpeg, gif, png)',
                  'mime_in' => 'Please upload image file (jpg, jpeg, gif, png)',
              ],
            ];
    }

    if (!$this->validate($rules)) {
        $resourceManagement = new Resource_material();
        $resource=$resourceManagement->where('id', $id)->first();
        $this->mViewData['resource'] = $resource; 
        $resourceManagements = new Resource_material();
        $resourceManagements_data=$resourceManagements->findAll();
        $this->mViewData['resources'] = $resourceManagements_data;
        $this->mViewData['validation']=$this->validator;
        return view('backend/resource_management/form',$this->mViewData);
    }else{      
      
      $resourceManagements = new Resource_material();
      $image=$this->request->getFile('image');
      $image_name=$image->getRandomName();         
      $attachment=$this->request->getFile('attachment');
      $attachment_name=$attachment->getRandomName();   
      $category_id=$this->request->getPost('category_id');
      $title=$this->request->getPost('title');
      $brief=$this->request->getPost('brief');
      $external_link=$this->request->getPost('external_link');
      $publish_date=$this->request->getPost('publish_date');
      if ($this->request->getPost('is_active') == "1")
      {
        $is_active = 1;
      }   
      else
      {
        $is_active = 0;
      }
      
      //$slugs = new Common_Functions();
      //$slug=$slugs->create_unique_slug($name,'Resource','slug','id',$id);
      $resource_detail=$resourceManagements->where('id', $id)->first();
      $old_img_name=$resource_detail['image']; 
      $old_attachment_name=$resource_detail['attachment']; 
      
      if ($image && $image->isValid() && !$image->hasMoved()) {             
        if ($old_img_name && file_exists("uploads/resources/".$old_img_name)) {
          unlink("uploads/resources/".$old_img_name);
        }
        $imageName=$image->getRandomName();
        //print_r($imageName); die;
        $upload_dir="uploads/resources/";
        $image->move($upload_dir,$imageName);            
      } 
      else{
        $imageName=$old_img_name;
      }   
      
      if ($attachment && $attachment->isValid() && !$attachment->hasMoved()) {             
        if ($old_attachment_name && file_exists("uploads/resources/".$old_attachment_name)) {
          unlink("uploads/resources/".$old_attachment_name);
        }
        $attachmentName=$attachment->getRandomName();
        //print_r($imageName); die;
        $upload_dir="uploads/resources/";
        $attachment->move($upload_dir,$attachmentName);            
      } 
      else{
        $attachmentName=$old_attachment_name;
      }   
      
      $resource_data = [
        'category_id'     =>$category_id,
        'title'     =>$title,
        'brief'    =>$brief,
        'image'=>$imageName,
        'attachment'=>$attachmentName,
        'external_link'=>$external_link,
        'publish_date'=>$publish_date,
        'updated_by'=>$this->curUser,
        'is_active'       =>$is_active,
      ]; 
           
      $resourceManagements->update($id,$resource_data);
      return redirect()->to('admin/resource_management'); 
    }
  }

  public function delete($id)
  {
    $Resources = new Resource_material();
    $Resources->where('id', $id)->delete();
    return redirect()->to('admin/resource_management');
  }

  public function changestatus($id)
  {  
    $Resources = new Resource_material();
    $Resource=$Resources->where('id', $id)->first();
    if( $Resource['is_active']==1){
      $new_status=0;
    }
    else
    {
      $new_status="1";
    }
    $update_data=[
      'is_active'=>$new_status,
      'updated_by'=>$this->curUser,
    ];
    $Resources->update($id,$update_data);
    return redirect()->to('admin/resource_management');
  }
}
