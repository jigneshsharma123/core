<?php

namespace App\Controllers\Backend;
use CodeIgniter\Controller; 
use App\Controllers\BaseController;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Tags_model;
use App\Libraries\Common_Functions;

class Blogs extends BaseController
{ 
    public function __construct()
    {
        helper(['form', 'url']);
        $session=session();
        $data['current_page'] = 'Blogs';
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
        $this->mViewData['categories'] = $categories->where('module','blog')->findAll();
    }
    
    public function index()
    {
        $blogs = new Blog();
        $blogs_data=$blogs->fetch_blog();
        $this->mViewData['blog_list'] = $blogs_data;
        $this->mViewData['page_title'] = 'Admin Panel - Blogs'; 
        echo view('backend/blogs/index', $this->mViewData );      
    }
    
    public function add()
    { 
        $this->mViewData['form_action'] = 'create';
        $this->mViewData['page_title'] = 'Add Blog';
        //echo "<pre>";   print_r($mViewData); die;
        echo view('backend/blogs/form', $this->mViewData);
    }
    
    public function create()
    {          
        $this->mViewData['form_action'] = 'create'; 
        $this->mViewData['page_title'] = 'Add Blog'; 
             
        $slugs = new Common_Functions();

        $rules=[
              'title' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Please enter   Blog title ',
                ],
              ],
              'category_id' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Please select Category ',
                ],
              ],
              'brief' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Please enter  Brief',
                ],
              ],
              'content' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Please enter Content',
                ],
              ],
              'publish_at' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Please enter Publish Date',
                ],
              ],
              'author' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Please enter  Author ',
                ],
              ],
              'featured_image' => [
                  'label' => 'Image File',
                  'rules' => [
                      'uploaded[featured_image]',
                      'is_image[featured_image]',
                      'mime_in[featured_image,image/jpg,image/jpeg,image/gif,image/png]',
                      'max_size[featured_image,30000]',
                      //'max_dims[featured_image,1024,768]',
                  ],
              ],
          ]; 
        if (!$this->validate($rules)) {
          $this->mViewData['validation']=$this->validator;
          $this->mViewData['errors'] = $this->validator->getErrors();
          return view('backend/blogs/form',$this->mViewData);
        } else {                        
          $blogs = new Blog();        
          $category_id=$this->request->getPost('category_id');
          $title=$this->request->getPost('title');
          $slug=$slugs->create_unique_slug($title,'Blog');
          $brief=$this->request->getPost('brief');
          $content=$this->request->getPost('content');
          $publish_at=$this->request->getPost('publish_at');
          $author=$this->request->getPost('author');        
          $designation=$this->request->getPost('designation');
          $featured_image= $this->request->getFiles('featured_image');
          if ($this->request->getPost('is_active') == "1")
          $is_active = 1;
          else
          $is_active = 0;               

          $blog_data = [
                  'title'       =>$title,
                  'slug'        =>$slug,
                  'category_id' =>$category_id,
                  'brief'       =>$brief,
                  'blog_content'=>$content,
                  'publish_at'  =>$publish_at,
                  'author'      =>$author,                
                  'designation' =>$designation,

                  'is_active'   =>$is_active,
                  //'featured_image'=>$featured_image
              ]; 
        $featured_image=$this->request->getFile('featured_image');
        if ($query=$blogs->insert($blog_data)) {
            $last_id_p = $blogs->getInsertID();
            $name=$featured_image->getRandomName();
                          
            $upload_base_dir="uploads/blogs/";
            
            $featured_image->move($upload_base_dir,$name);
            $update_image=array(
                'featured_image'=>$name
            );
            $blogs->update($last_id_p,$update_image);
        }
        return redirect()->to('admin/blogs');                                                 
      }
       
    }
    
    public function edit($id)
    {
      $this->mViewData['form_action'] = 'update/'.$id;  
      $blogs = new Blog();
      $blogs=$blogs->where('id', $id)->first();    
      $this->mViewData['blog'] = $blogs; 
      $this->mViewData['page_title'] = 'Edit Blog';
      return view('backend/blogs/form',$this->mViewData);         
    }

    public function update($id=0)
    {
        $tags = new Tag();
        $tags=$tags->findAll();
        $this->mViewData['tags'] = $tags;
        $this->mViewData['page_title'] = 'Edit Blog';
        $this->mViewData['form_action'] = 'update/'.$id;
        $blogs = new Blog();
        $blog=$blogs->where('id', $id)->first();    
        $this->mViewData['blog'] = $blog;
        $category_id=$this->request->getPost('category_id');
        $title=$this->request->getPost('title');
        $brief=$this->request->getPost('brief');
        $content=$this->request->getPost('content');
        $publish_at=$this->request->getPost('publish_at');
        $author=$this->request->getPost('author');        
        $designation=$this->request->getPost('designation');
        $old_img_name=$blog['featured_image']; 

        if ($this->request->getPost('is_active') == "1")
            $is_active = 1;
        else
            $is_active = 0; 
        $featured_image=$this->request->getFile('featured_image');
          
        $rules=[
            'title' => [
              'rules'  => 'required',
              'errors' => [
                  'required' => 'Please enter   Blog title ',
              ],
            ],
            'category_id' => [
              'rules'  => 'required',
              'errors' => [
                  'required' => 'Please select Category ',
              ],
            ],
            'brief' => [
              'rules'  => 'required',
              'errors' => [
                  'required' => 'Please enter  Brief',
              ],
            ],
            'content' => [
              'rules'  => 'required',
              'errors' => [
                  'required' => 'Please enter Content',
              ],
            ],
            'publish_at' => [
              'rules'  => 'required',
              'errors' => [
                  'required' => 'Please enter Publish Date',
              ],
            ],
            'author' => [
              'rules'  => 'required',
              'errors' => [
                  'required' => 'Please enter  Author ',
              ],
            ]
        ]; 
        if (!empty($_FILES['featured_image']['name'])) {
          $validationRule = [
              'featured_image' => [
                  'label' => 'Image File',
                  'rules' => [
                      'uploaded[featured_image]',
                      'is_image[featured_image]',
                      'mime_in[featured_image,image/jpg,image/jpeg,image/gif,image/png]',
                      'max_size[featured_image,30000]',
                      //'max_dims[featured_image,1024,768]',
                  ],
              ],
          ];
          //array_push($rules,$validationRule);
        }
        if (! $this->validate($rules)) {
            $this->mViewData['errors'] = $this->validator->getErrors();
            return view('backend/blogs/form', $this->mViewData);
        }else{ 
            $update_data = [
                'title'       =>$title,
                'category_id' =>$category_id,
                'brief'       =>$brief,
                'blog_content'=>$content,
                'publish_at'  =>$publish_at,
                'author'      =>$author,                
                'designation' =>$designation,
                'is_active'   =>$is_active
            ]; 
            if ($featured_image && $featured_image->isValid() && !$featured_image->hasMoved()) {             
                if ($old_img_name && file_exists("uploads/blogs/".$old_img_name)) {
                  unlink("uploads/blogs/".$old_img_name);
                }
                $imageName=$featured_image->getRandomName();
                //print_r($imageName); die;
                $upload_dir="uploads/blogs/";
                $featured_image->move($upload_dir,$imageName);            
            } 
            else{
                $imageName=$old_img_name;
            } 
            
            $update_data['featured_image'] = $imageName;
        }
        $blogs->update($id,$update_data);
        return redirect()->to('admin/blogs');
    }    
    
    public function delete($id)
    {
        $blogs = new Blog();
        $blogs=$blogs->where('id', $id)->delete();
        return redirect()->to('admin/blogs');
    }
     public function changestatus($id)
    {  
        //echo "$id"; die;
        $status_model = new Blog();
        $categories=$status_model->where('id', $id)->first();
        //print_r($categories); die;
        if( $categories['is_active']==1){
           
            $new_status=0;
         }
       else
       {
        //echo "hello"; die;
         $new_status="1";
       }
       $update_data['is_active']=$new_status;
       $status_model->update($id,$update_data);
       return redirect()->to('admin/blogs');
    
  }
  function get_tags()
  {
    $tags_model = new Tags_model();
    if (isset($_GET['term'])){
      $q = strtolower($_GET['term']);
      $tags_model->get_tag($q);
      //print_r($tags_model);die;
    }
    exit();
  }  
	


}
