<?php

namespace App\Controllers\Backend;
use CodeIgniter\Controller; 
use App\Controllers\BaseController;
use App\Models\Faq;
use App\Models\Faq_group;
use App\Libraries\Common_Functions;

class Faq_management extends BaseController
{ 
	public function __construct()
  {   
    helper(['form', 'url']);
    $session=session();
    $data['current_page'] = 'Faq Management';
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
    $faqManagements = new Faq();
    $faqManagements_data=$faqManagements->fetch_fag_group();
    $this->mViewData['faqManagement_list'] = $faqManagements_data;
    $this->mViewData['page_title'] = 'Admin Panel - Faqs'; 
    echo view('backend/faq_management/index', $this->mViewData );      
  }

  public function add()
  { 
    $faqGroupModel = new Faq_group();
    $this->mViewData['faq_groups'] = $faqGroupModel->findAll();
    $this->mViewData['form_action'] = 'create';
    $this->mViewData['page_title'] = 'Add Faq';
    echo view('backend/faq_management/form', $this->mViewData);
  }
  
  public function create()
  { 
    $this->mViewData['page_title'] = 'Add Faq';
    if ($this->request->getPost('faq_group_id') == "addnew") {
      $faqGroupManagement = new Faq_group();
      $faq_group=$this->request->getPost('faq_group'); 
      $checkFaqGroup=$faqGroupManagement->where('name', $faq_group)->first();
      if ($checkFaqGroup) {
        $_POST['faq_group_id'] = $checkFaqGroup['id'];
      } else {     
        $faq_group_data = [
          'name'     =>$faq_group,
          'created_by'=>$this->curUser,
          'is_active'           =>1,
        ]; 
        $_POST['faq_group_id'] = $faqGroupManagement->insert($faq_group_data);
      }
    }
    $rules=[
            'faq_group_id' => [
              'rules'  => 'required_without[faq_group]|not_in_list[addnew]',
              'errors' => [
                  'required_without' => 'Please select faq group',
                  'required' => 'Please select faq group',
                  'not_in_list' => 'Kindly provide name of new group'
              ],
            ],
            'faq_group' => [
              'rules'  => 'required_without[faq_group_id]',
              'errors' => [
                  'required_without' => '',
              ],
            ],
            'question' => [
              'rules'  => 'required',
              'errors' => [
                  'required' => 'Please enter question',
              ],
            ],
            'answer' => [
              'rules'  => 'required',
              'errors' => [
                  'required' => 'Please enter answer',
              ],
            ],
            'sort_order' => [
              'rules'  => 'required|is_natural',
              'errors' => [
                  'required' => 'Please enter sort order',
                  'is_natural' => 'Please enter valid sort order',
              ],
            ]
          ];
    
    if (! $this->validateData($_POST, $rules)) {
    //if (!$this->validate($rules)) {
      $faqGroupModel = new Faq_group();
      $this->mViewData['faq_groups'] = $faqGroupModel->findAll();
      $this->mViewData['validation']=$this->validator;
      $this->mViewData['form_action'] = 'create';
    //print_r($this->mViewData['validation']);
    //exit;
      return view('backend/faq_management/form',$this->mViewData);
    }else{      
      $faqManagements = new Faq();
      $faq_group_id=$_POST['faq_group_id'];
      $question=$this->request->getPost('question');
      $answer=$this->request->getPost('answer');
      $sort_order=$this->request->getPost('sort_order');
      if ($this->request->getPost('is_active') == "1")
      {
        $is_active = 1;
      }   
      else
      {
        $is_active = 0;
      }
      
      $faq_data = [
        'faq_group_id'     =>$faq_group_id,
        'question'     =>$question,
        'answer'    =>$answer,
        'sort_order'      =>$sort_order,
        'is_active'           =>$is_active,
        'created_by'=>$this->curUser,
      ]; 
      $faqManagements->insert($faq_data);
      return redirect()->to('admin/faq_management');     
    }
  }
  
  public function edit($id)
  {
    $faqManagement = new Faq();
    $faq=$faqManagement->where('id', $id)->first();
    
    $faqGroupModel = new Faq_group();
    $this->mViewData['faq_groups'] = $faqGroupModel->findAll();
    $this->mViewData['edit'] = 1; 
    $this->mViewData['faq'] = $faq; 
    $this->mViewData['page_title'] = 'Edit Faq';
    $this->mViewData['form_action'] = 'update/'.$id;
    return view('backend/faq_management/form',$this->mViewData);    
  }
  
  public function update($id)
  {
    $this->mViewData['page_title'] = 'Edit Faq';
    $this->mViewData['form_action'] = 'update/'.$id;
    if ($this->request->getPost('faq_group_id') == "addnew" && trim($this->request->getPost('faq_group')) != "") {
      $faqGroupManagement = new Faq_group();
      $faq_group=$this->request->getPost('faq_group'); 
      $checkFaqGroup=$faqGroupManagement->where('name', $faq_group)->first();
      if ($checkFaqGroup) {
        $_POST['faq_group_id'] = $checkFaqGroup['id'];
      } else {     
        $faq_group_data = [
          'name'     =>$faq_group,
          'created_by'=>$this->curUser,
          'is_active'           =>1,
        ]; 
        $_POST['faq_group_id'] = $faqGroupManagement->insert($faq_group_data);
      }
    }
    $rules=[
            'faq_group_id' => [
              'rules'  => 'required_without[faq_group]|not_in_list[addnew]',
              'errors' => [
                  'required_without' => 'Please select faq group',
                  'required' => 'Please select faq group',
                  'not_in_list' => 'Kindly provide name of new group'
              ],
            ],
            'faq_group' => [
              'rules'  => 'required_without[faq_group_id]',
              'errors' => [
                  'required_without' => '',
              ],
            ],
            'question' => [
              'rules'  => 'required',
              'errors' => [
                  'required' => 'Please enter question',
              ],
            ],
            'answer' => [
              'rules'  => 'required',
              'errors' => [
                  'required' => 'Please enter answer',
              ],
            ],
            'sort_order' => [
              'rules'  => 'required|is_natural',
              'errors' => [
                  'required' => 'Please enter sort order',
                  'is_natural' => 'Please enter valid sort order',
              ],
            ]
          ];
    
    if (! $this->validateData($_POST, $rules)) {
      $faqGroupModel = new Faq_group();
      $this->mViewData['faq_groups'] = $faqGroupModel->findAll();
      $this->mViewData['validation']=$this->validator;
      return view('backend/faq_management/form',$this->mViewData);
    }else{      
      
      $faqManagements = new Faq();
      $faq_group_id=$_POST['faq_group_id'];
      $question=$this->request->getPost('question');
      $answer=$this->request->getPost('answer');
      $sort_order=$this->request->getPost('sort_order');
      if ($this->request->getPost('is_active') == "1")
      {
        $is_active = 1;
      }   
      else
      {
        $is_active = 0;
      }
      
      $faq_data = [
        'faq_group_id'     =>$faq_group_id,
        'question'     =>$question,
        'answer'    =>$answer,
        'sort_order'      =>$sort_order,
        'is_active'           =>$is_active,
        'updated_by'=>$this->curUser,
      ];            
      $faqManagements->update($id,$faq_data);
      return redirect()->to('admin/faq_management'); 
    }
  }

  public function delete($id)
  {
    $Faqs = new Faq();
    $Faqs->where('id', $id)->delete();
    return redirect()->to('admin/faq_management');
  }

  public function changestatus($id)
  {  
    $Faqs = new Faq();
    $Faq=$Faqs->where('id', $id)->first();
    if( $Faq['is_active']==1){
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
    $Faqs->update($id,$update_data);
    return redirect()->to('admin/faq_management');
  }
}
