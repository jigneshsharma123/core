<?php
namespace App\Controllers\Backend;
use CodeIgniter\Controller; 
use App\Controllers\BaseController;
use App\Models\Job;
use App\Models\Category;

class Job_management extends BaseController
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
        $this->mViewData['categories'] = $categories->where('module','job')->findAll();
        
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
    }

    public function index() 
    {
        $jobManagements = new Job();
        $jobManagements_data=$jobManagements->findAll();
        $this->mViewData['jobs_list'] = $jobManagements_data;
        $this->mViewData['page_title'] = 'Admin Panel - Jobs'; 
        echo view('backend/job_management/index', $this->mViewData );      
    }
  
    public function add()
    { 
        $this->mViewData['form_action'] = 'create';
        $this->mViewData['page_title'] = 'Add Job';
        echo view('backend/job_management/form', $this->mViewData);
    }
  
    public function create()
    { 
        $this->mViewData['page_title'] = 'Add Job';
        $this->mViewData['form_action'] = 'create';

        $rules=[
                'title' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Please provide the title'
                    ],
                ],
                'description' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Please provide description',
                    ],
                ],
            ];
            
        if (!$this->validate($rules)) {
            $this->mViewData['validation']=$this->validator;
            return view('backend/job_management/form',$this->mViewData);
        }else{      
            $jobManagements = new Job();
            $title=$this->request->getPost('title');
            $description=$this->request->getPost('description');
            if ($this->request->getPost('is_active') == "1")
            {
                $is_active = 1;
            }
            else
            {
                $is_active = 0;
            }
          
            $job_data = [
                'title'     =>$title,
                'description'     =>$description,
                'created_by'=>$this->curUser,
                'is_active'       =>$is_active,
            ]; 
            $jobManagements->insert($job_data);
            return redirect()->to('admin/job_management');     
        }
    }
  
    public function edit($id)
    {
        $jobManagement = new Job();
        $job=$jobManagement->where('id', $id)->first();

        $jobManagements = new Job();
        $jobManagements_data=$jobManagements->findAll();

        $this->mViewData['jobs'] = $jobManagements_data;
        $this->mViewData['job'] = $job; 
        $this->mViewData['page_title'] = 'Edit Job';
        $this->mViewData['form_action'] = 'update/'.$id;
        return view('backend/job_management/form',$this->mViewData);    
    }
  
    public function update($id)
    {
        $this->mViewData['page_title'] = 'Edit Job';
        $this->mViewData['form_action'] = 'update/'.$id;
        
        $rules=[
                'title' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Please provide title'
                    ],
                ],
                'description' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Please provide descripiton'
                    ],
                ],
            ];

        if (!$this->validate($rules)) {
            $jobManagement = new Job();
            $job=$jobManagement->where('id', $id)->first();
            $this->mViewData['validation']=$this->validator;
            $this->mViewData['job'] = $job; 
            return view('backend/job_management/form',$this->mViewData);
        } else {
            $jobManagements = new Job();
            $title=$this->request->getPost('title');
            $description=$this->request->getPost('description');
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
            //$slug=$slugs->create_unique_slug($name,'Job','slug','id',$id);
            $job_detail=$jobManagements->where('id', $id)->first();
            
            $job_data = [
                'title'     =>$title,
                'description'     =>$description,
                'updated_by'=>$this->curUser,
                'is_active'       =>$is_active,
            ];
            $jobManagements->update($id,$job_data);
            return redirect()->to('admin/job_management'); 
        }
    }

    public function delete($id)
    {
        $Jobs = new Job();
        $Jobs->where('id', $id)->delete();
        return redirect()->to('admin/job_management');
    }

    public function changestatus($id)
    {  
        $Jobs = new Job();
        $Job=$Jobs->where('id', $id)->first();
        if($Job['is_active']==true){
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
        
        $Jobs->update($id,$update_data);
        return redirect()->to('admin/job_management');
    }
}
?>