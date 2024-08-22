<?php

namespace App\Controllers\Backend;
use CodeIgniter\Controller; 
use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\Gallery;
use App\Libraries\Common_Functions;

class Gallery_management extends BaseController
{ 
    public function __construct()
    {   
        helper(['form', 'url']);
        $session=session();
        $data['current_page'] = 'Gallery Management';
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
    }

    public function index()
    {
        $gallery = new Gallery();
        $gallery_data=$gallery->findAll();
        $this->mViewData['gallery'] = $gallery_data;
        $this->mViewData['page_title'] = 'Admin Panel - Galleries';
        echo view('backend/galleries/index', $this->mViewData );
    }
  
    public function add()
    {
        $this->mViewData['page_title'] = 'Admin Panel - Add Gallery';
        echo view('backend/galleries/form', $this->mViewData );
    }

    public function view()
    {
        $id = $this->uri->segment(4);
        $gallery = new Gallery();
        $gallery->where("id = ".$id)->get();
        $medias = new Media_element();
        $medias->where("gallery_id",$id)->get();
        $this->mViewData['medias'] = $medias;
        $this->mViewData['gallery_id'] = $id;
        $this->mViewData['gallery'] = $gallery;
        $this->mViewData['page_title'] = 'Admin Panel - Gallery Images';
        echo view('backend/galleries/view', $this->mViewData );
    }
  
    function select()
    {
        $this->data['element_id'] = $this->input->get('element');
        $medias = new Media_element();
        $medias->get();
        $this->data['galleries_list'] = $medias;
        $this->data['partial'] = 'backend/galleries/select';
        $this->data['page_title'] = 'Gallery';
        $this->load->view('backend/theme/blank', $this->data);    
    }

    public function do_upload()
    {
        echo '<pre>';
        print_r($_FILES);
        exit;
        $gallery = new Gallery();
        $gallery->title = $this->input->post('title');
        $gallery->brief = $this->input->post('brief');
        if ($gallery->save())
        {
            $this->load->database();
            $upload_folder = $this->common_functions->upload_folder();
            $name_array=array();
            $count=count($_FILES['userfile']['name']);
            foreach($_FILES as $key=>$value)
            {
                for($s=0;$s<=$count-1;$s++)
                {
                    $_FILES['userfile']['name']=$value['name'][$s];
                    $_FILES['userfile']['type']    =$value['type'][$s];
                    $_FILES['userfile']['tmp_name']=$value['tmp_name'][$s];
                    $_FILES['userfile']['error']       =$value['error'][$s];
                    $_FILES['userfile']['size']    =$value['size'][$s];   
                    $config['upload_path']=$upload_folder;
                    $config['allowed_types']= "gif|jpg|png|jpeg|pdf|doc|xml|zip|rar";
                    $config['max_size']='1000000';
                    $config['max_width']  ='102400000';
                    $config['max_height']  ='76800000';
                    $this->load->library('upload',$config);
                    $this->upload->do_upload();
                    $data=$this->upload->data();

                    //small resize start
                    $configlarge = array(
                        'source_image'      => $upload_folder.'/'.$data['file_name'],
                        'new_image'         =>  $upload_folder.'/thumb_'.$data['file_name'],
                        'image_library'    =>'gd2',
                        'master_dim'    => 'auto',
                        'maintain_ratio'    => false,
                        'width'             => SMALL_IMAGE_WIDTH,
                        'height'            => SMALL_IMAGE_HEIGHT
                    );

                    $this->image_lib->initialize($configlarge);
                    $this->image_lib->resize();

                    $medias = new Media_element();
                    $medias->media =$upload_folder.'/'.$data['file_name'];
                    $medias->thumb =$upload_folder.'/thumb_'.$data['file_name'];
                    $medias->is_active =1;
                    $medias->gallery_id =$gallery->id;
                    $medias->mark_available =1;
                    $medias->save();
                }
            }
        }
        $this->session->set_flashdata('notice', 'Media add successfully.');
        header('location:'.base_url()."admin/galleries".$this->index());
    }
    
    public function delete($id)
    { 
        $id = $this->uri->segment(4);
        $gallery = new Gallery();
        $gallery->where("id",$id)->get();
        $gallery->delete();
        $medias = new Media_element();
        $medias->where("id",$id)->get();
        $medias->where("id",$id)->update(array('gallery_id' => 0));
        $this->session->set_flashdata('notice', 'Media deleted successfully.');
        redirect($_SERVER['HTTP_REFERER']);
    }
  
    public function delete_image($id)
    {
        $id = $this->uri->segment(4);
        $medias = new Media_element();
        $medias->where("id",$id)->get();
        $medias->where("id",$id)->update(array('gallery_id' => 0));
        $this->session->set_flashdata('notice', 'Media deleted successfully.');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function edit_image()
    { 
        $id=$this->input->get("imageid");
        $medias = new Media_element();
        $medias->where("id",$id)->get();
        foreach ($medias as $row)
        {
            $res=array(
                'id' => $row->id,
                'title' => $row->title,
                'description' => $row->description,
                'thumb' => base_url().$row->thumb,
                'image_alt_tag' => $row->image_alt_tag,
            );
        }
        echo json_encode($res); 
    }
    
    public function imageupdate()
    { 
        $id = $this->input->post("id");
        $title = $this->input->post("title");
        $description = $this->input->post("description");
        $alt_tag = $this->input->post("alt_tag");
        $medias = new Media_element();
        $medias->where("id",$id)->update(array('title' => $title,'description' => $description,'image_alt_tag' => $alt_tag));
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function edit()
    {
        $this->data['page_title'] = 'Edit Gallery';
        $id = $this->uri->segment(4);
        $gallery = new Gallery();
        $gallery->where("id = ".$id)->get();
        $this->mViewData['gallery'] = $gallery;
        $this->render('backend/galleries/editform', 'default');	
    }

    public function update()
    {
        $gallery = new Gallery();
        $title = $this->input->post('title');
        $name = $this->input->post('name');
        $brief = $this->input->post('brief');
        
        $gallery->where("id = ".$_POST['id'])->update(array('title' => $title,'brief' => $brief));
        $this->session->set_flashdata('notice', 'Gallery updated successfully.');
        header('location:'.base_url()."admin/galleries/".$this->index());
    }
  
    public function changestatus()
    {
        $id = $this->uri->segment(4);
        $gallery = new Gallery();
        $gallery->where("id = ".$id)->get();
        if( $gallery->status==1){
            $new_status=0;
        }
        else
        {
            $new_status="1";
        }
        $gallery->where("id = ".$id)->update(array('status' => $new_status));
        redirect($_SERVER['HTTP_REFERER']);
    }
  
    public function changestatus_image()
    {
        $id = $this->uri->segment(4);
        $medias = new Media_element();
        $medias->where("id = ".$id)->get();
        if( $medias->is_active==1){
            $new_status=0;
        }
        else
        {
            $new_status="1";
        }
        $medias->where("id = ".$id)->update(array('is_active' => $new_status));
        redirect($_SERVER['HTTP_REFERER']);
    }
  
    public function mark_available()
    {
        $id = $this->uri->segment(4);
        $medias = new Media_element();
        $medias->where("id = ".$id)->get();
        if ($medias->mark_available==1){
            $new_status=0;
        }
        else
        {
            $new_status="1";
        }
        $medias->where("id = ".$id)->update(array('mark_available' => $new_status));
        header('location:'.base_url()."admin/galleries".$this->index());
    }
  
    public function do_upload_inner()
    {
        $gallery_id =$this->input->post('gallery_id');
        $this->load->database();
        $upload_folder = $this->common_functions->upload_folder();
        $name_array=array();
        $count=count($_FILES['userfile']['name']);
        foreach($_FILES as $key=>$value)
        {
            for($s=0;$s<=$count-1;$s++)
            {
                $_FILES['userfile']['name']=$value['name'][$s];
                $_FILES['userfile']['type']    =$value['type'][$s];
                $_FILES['userfile']['tmp_name']=$value['tmp_name'][$s];
                $_FILES['userfile']['error']       =$value['error'][$s];
                $_FILES['userfile']['size']    =$value['size'][$s];   
                $config['upload_path']=$upload_folder;
                $config['allowed_types']= "gif|jpg|png|jpeg|pdf|doc|xml|zip|rar";
                $config['max_size']='1000000';
                $config['max_width']  ='102400000';
                $config['max_height']  ='76800000';
                $this->load->library('upload',$config);
                $this->upload->do_upload();
                $data=$this->upload->data();
                            
                //small resize start
                $configlarge = array(
                    'source_image'      => $upload_folder.'/'.$data['file_name'],
                    'new_image'         =>  $upload_folder.'/thumb_'.$data['file_name'],
                    'image_library'    =>'gd2',
                    'master_dim'    => 'auto',
                    'maintain_ratio'    => false,
                    'width'             => SMALL_IMAGE_WIDTH,
                    'height'            => SMALL_IMAGE_HEIGHT
                );
        
                $this->image_lib->initialize($configlarge);
                $this->image_lib->resize();
                $medias = new Media_element();
                $medias->media =$upload_folder.'/'.$data['file_name'];
                $medias->thumb =$upload_folder.'/thumb_'.$data['file_name'];
                $medias->is_active =1;
                $medias->gallery_id = $gallery_id ;
                $medias->mark_available =1;
                $medias->save();
                
            }
        }
        $this->session->set_flashdata('notice', 'Media add successfully.');
        redirect($_SERVER['HTTP_REFERER']);
    }
}
