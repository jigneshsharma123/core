<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\Media_Element;
use App\Libraries\Common_Functions;
class Media_library extends BaseController
{
  public function __construct()
  { 
    helper(['form', 'url']);
    $session=session();
    $data['current_page'] = 'Categories';
    if ($session->has('admin_logged_in')) {
      $this->mViewData['session_data']=$session->get('admin_logged_in');
    }else{
      return view('backend/login/index');
    }
    $this->curUser = $this->mViewData['session_data']['id'];
  }

  public function index()
  {
    $medias = new Media_element();
    $medias=$medias->findAll();
    $this->mViewData['medias'] = $medias;
    $this->mViewData['page_title'] = 'Admin Panel - Media Library';
    $view_file = 'backend/media_library/index';
    return view($view_file,$this->mViewData);
  }

  public function select() 
  { 
    $this->mViewData['element_id'] = $this->request->getVar('element');
    $medias = new Media_Element();
    $medias=$medias->findAll();
    $this->mViewData['galleries_list'] = $medias;
    $this->mViewData['partial'] = 'backend/media_library/select';
    $this->mPageTitle = 'Gallery';
    $view_file = 'backend/media_library/select';
    return view('backend/media_library/select',$this->mViewData);
  }

  public function do_upload()
  {   
    $upload = new Common_Functions();
    $upload_folder = $upload->upload_folder(); 
    $name_array=array();

    foreach($this->request->getFileMultiple('userfile') as $file)
    {   
      $name=$file->getRandomName();

      $image = \Config\Services::image()
      ->withFile($file)
      ->save('./'.$upload_folder.'/'.$name );

      $image_thumb = \Config\Services::image()
      ->withFile($file)
      ->resize(250, 150, false, 'auto')
      ->save('./'.$upload_folder.'/thumb_'.$name );

      // print_r($image); die;
      //$file->move($upload_folder,'thumb_'.$name);

      $medias = new Media_element();
      $upload_data=[
        'media'=>$upload_folder.'/'.$name,
        'thumb'=>$upload_folder.'/thumb_'.$name,
        'is_active'=>1,
        'mark_available'=>1
      ];
      $medias->insert($upload_data); 
    }
    return redirect()->to('admin/media_library');
  }

  public function changestatus($id)
  {
    $medias = new Media_element();
    $status= $medias->where("id",$id)->first();
    if ($status['is_active']==1) {
      $new_status=0;
    }
    else
    {
      $new_status="1";
    }
    $update_data['is_active']=$new_status;
    $medias->update($id,$update_data);
    return redirect()->to('admin/media_library');
  }

  public function delete($id)
  {
    $upload = new Common_Functions();
    $upload_folder = $upload->upload_folder();
    
    $medias = new Media_element();
    $status= $medias->where("id",$id)->first();
    if (file_exists($status['media']))
      unlink($status['media']);
    if (file_exists($status['thumb']))
      unlink($status['thumb']);
    $medias = new Media_element();
    $medias->where("id", $id)->delete();
    return redirect()->to('admin/media_library'); 
  }
}
