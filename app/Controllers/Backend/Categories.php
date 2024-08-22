<?php

namespace App\Controllers\Backend;
use CodeIgniter\Controller; 
use App\Controllers\BaseController;
use App\Models\Category;
use App\Libraries\Common_Functions;

class Categories extends BaseController
{
    public function __construct()
    { 
        helper(['form', 'url']);
        $session=session();
        $data['current_page'] = 'Categories';
        if ($session->has('admin_logged_in')) {
            $this->mViewData['session_data']=$session->get('admin_logged_in');
        } else {
            return view('backend/login/index');
        }
        $this->curUser = $this->mViewData['session_data']['id'];
        $this->mViewData['category_modules'] = unserialize(CATEGORY_MODULES);      
    }

    public function index()
    {
        $categories = new Category();
        $categories= $categories->findAll();
        $this->mViewData['categories_list'] = $categories;
        $this->mViewData['page_title'] = 'Admin Panel - Categories';
        //echo "<pre>"; print_r($categories); die;
        echo view('backend/categories/index', $this->mViewData );
    }
    
    public function add()
    {  $this->mViewData['form_action'] = 'create'; 
       $this->mViewData['page_title'] = 'Admin Panel - Add';
        echo view('backend/categories/form',$this->mViewData);
    }
    public function create()
    { 
        $this->mViewData['form_action'] = 'create'; 
        $this->mViewData['page_title'] = 'Add Category';
        $validation = \Config\Services::validation();

        $rules=[
            'category_title' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Please fill Category title field',
                ],
            ],
            'module' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Please select module',
                ],
            ]
        ];
        
        if (!$this->validate($rules)) {
            $this->mViewData['validation']=$this->validator;
            return view('backend/categories/form',$this->mViewData);
        }else{    
            $categories = new Category();
            $slugs = new Common_Functions();
            $category_title=$this->request->getPost('category_title');
            $slug=$slugs->create_unique_slug($category_title,'Category');
            $category_status=$this->request->getPost('status');
            $module=$this->request->getPost('module');
            if (!$category_status) {
                $category_status=0;
            } else {
                $category_status=1;
            }
            $cate_data = [
                'title'     => $category_title,
                'module'     => $module,
                'slug'     => $slug,
                'status'     => $category_status
            ]; 
            $query=$categories->insert($cate_data);
            return redirect()->to('admin/categories');
        }
    } 

    public function edit($id)
    {   $categories = new Category();
        $this->mViewData['form_action'] = 'update/'.$id;
        $this->mViewData['page_title'] = 'Admin Panel - Edit';
        $categories=$categories->where('id', $id)->first();
        $this->mViewData['category'] = $categories;
        echo view('backend/categories/form',$this->mViewData);
    }
    
    public function update($id=0)
    { 
        $categories = new Category();
       
        $update_data = [
            'title'     => $this->request->getPost('category_title'),
            'module'     => $this->request->getPost('module'),
            'status'     => $this->request->getPost('status'),
        ]; 
        $categories->update($id,$update_data);
        return redirect()->to('admin/categories');
    }
    
    public function delete($id)
    {
        $categories = new Category();
        $categories=$categories->where('id', $id)->delete();
        return redirect()->to('admin/categories');
    }

     public function changestatus($id)
    {  
        //echo "$id"; die;
        $status_model = new Category();
        $categories=$status_model->where('id', $id)->first();
        //print_r($categories); die;
        if( $categories['status']==1){
           
            $new_status=0;
         }
       else
       {
        //echo "hello"; die;
         $new_status="1";
       }
       $update_data['status']=$new_status;
       $status_model->update($id,$update_data);
       return redirect()->to('admin/categories');
    
  } 
}
