<?php

namespace App\Controllers\Backend;
use CodeIgniter\Controller; 
use App\Controllers\BaseController;
use App\Models\Video;
use App\Models\Category;

class Video_management extends BaseController
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
        $categories = new Category();
        $this->mViewData['categories'] = $categories->where('module','video')->findAll();
    }

    public function index() 
    {
        $category_names = array();
        $category_names[0] = '';
        foreach($this->mViewData['categories'] as $category) {
            $category_names[$category['id']] = $category['title'];
        }
        $this->mViewData['category_names'] = $category_names;
        $videoManagements = new Video();
        $videoManagements_data=$videoManagements->findAll();
        $this->mViewData['videoManagement_list'] = $videoManagements_data;
        $this->mViewData['page_title'] = 'Admin Panel - Videos'; 
        echo view('backend/video_management/index', $this->mViewData );      
    }
  
    public function add()
    { 
        $this->mViewData['form_action'] = 'create';
        $this->mViewData['page_title'] = 'Add Video';
        echo view('backend/video_management/form', $this->mViewData);
    }
  
    public function create()
    { 
        $this->mViewData['page_title'] = 'Add Video';
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
                  'required' => 'Please enter video title ',
              ],
            ],
            'video_desc' => [
              'rules'  => 'required',
              'errors' => [
                  'required' => 'Please enter video description ',
              ],
            ],
            'video' => [
              'rules'  => 'required',
              'errors' => [
                  'required' => 'Please enter video code ',
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
            $videoManagements = new Video();
            $videoManagements_data=$videoManagements->findAll();
            $this->mViewData['videos'] = $videoManagements_data;
            $this->mViewData['validation']=$this->validator;
            return view('backend/video_management/form',$this->mViewData);
        } else {      
            $videoManagements = new Video();
            $image_name = '';
            if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
                $image=$this->request->getFile('image');
                $image_name=$image->getRandomName();         
            }
            $category_id=$this->request->getPost('category_id');
            $title=$this->request->getPost('title');
            $videocode=$this->request->getPost('video');
            $refer_link=$this->request->getPost('refer_link');
            $suggestion=$this->request->getPost('suggestion');
            $video_desc=$this->request->getPost('video_desc');
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
            
            $video_data = [
                'category_id'     =>$category_id,
                'title'     =>$title,
                'video'     =>$videocode,
                'refer_link'    =>$refer_link,
                'suggestion'      =>$suggestion,
                'video_desc'           =>$video_desc,
                'show_on_home_page'           =>$show_on_home_page,
                'image'=>$image_name,
                'created_by'=>$this->curUser,
                'is_active'       =>$is_active,
            ]; 
            if ($image_name != '') {
                $upload_dir="uploads/videos/";
                $image->move($upload_dir,$image_name); 
                }
            $videoManagements->insert($video_data);
            return redirect()->to('admin/video_management');     
        }
    }
  
    public function edit($id)
    {
        $videoManagement = new Video();
        $video=$videoManagement->where('id', $id)->first();
        
        $videoManagements = new Video();
        $videoManagements_data=$videoManagements->findAll();
        
        $this->mViewData['videos'] = $videoManagements_data;
        $this->mViewData['video'] = $video; 
        $this->mViewData['page_title'] = 'Edit Video';
        $this->mViewData['form_action'] = 'update/'.$id;
        return view('backend/video_management/form',$this->mViewData);    
    }
  
    public function update($id)
    {
        $this->mViewData['page_title'] = 'Edit Video';
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
                  'required' => 'Please enter video title ',
              ],
            ],
            'video_desc' => [
              'rules'  => 'required',
              'errors' => [
                  'required' => 'Please enter video description ',
              ],
            ],
            'video' => [
              'rules'  => 'required',
              'errors' => [
                  'required' => 'Please enter video code ',
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
            $videoManagements = new Video();
            $videoManagements_data=$videoManagements->findAll();
            $this->mViewData['videos'] = $videoManagements_data;
            $this->mViewData['validation']=$this->validator;
            return view('backend/video_management/form',$this->mViewData);
        } else {      
            $videoManagements = new Video();
            $image=$this->request->getFile('image');
            $category_id=$this->request->getPost('category_id');
            $title=$this->request->getPost('title');
            $videocode=$this->request->getPost('video');
            $refer_link=$this->request->getPost('refer_link');
            $suggestion=$this->request->getPost('suggestion');
            $video_desc=$this->request->getPost('video_desc');
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
            $video_detail=$videoManagements->where('id', $id)->first();
            $old_img_name=$video_detail['image']; 

            if ($image && $image->isValid() && !$image->hasMoved()) {             
                if ($old_img_name && file_exists("uploads/videos/".$old_img_name)) {
                    unlink("uploads/videos/".$old_img_name);
                }
                $imageName=$image->getRandomName();
                //print_r($imageName); die;
                $upload_dir="uploads/videos/";
                $image->move($upload_dir,$imageName);            
            } 
            else{
                $imageName=$old_img_name;
            }   
               
            $video_data = [
                'category_id'     =>$category_id,
                'title'     =>$title,
                'video'     =>$videocode,
                'refer_link'    =>$refer_link,
                'suggestion'      =>$suggestion,
                'video_desc'           =>$video_desc,
                'show_on_home_page'           =>$show_on_home_page,
                'image'=>$imageName,
                'updated_by'=>$this->curUser,
                'is_active'       =>$is_active,
            ]; 
               
            $videoManagements->update($id,$video_data);
            return redirect()->to('admin/video_management'); 
        }
    }

    public function delete($id)
    {
        $Videos = new Video();
        $Videos->where('id', $id)->delete();
        return redirect()->to('admin/video_management');
    }

    public function changestatus($id)
    {  
        $Videos = new Video();
        $Video=$Videos->where('id', $id)->first();
        if($Video['is_active']==true){
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
    
        $Videos->update($id,$update_data);
        return redirect()->to('admin/video_management');
    }
}
?>