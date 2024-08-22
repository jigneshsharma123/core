<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\Setting;
use App\Models\Menus_model;
use App\Models\Menu_item;
use App\Models\Page;
use App\Models\Service;

class Menus extends BaseController
{
    public function __construct()
    {
        $helpers = ['form'];
        helper(['form', 'url']);
        $session=session();
        $data['current_page'] = 'Blogs';
        if ($session->has('admin_logged_in'))
        {
            $this->mViewData['session_data']=$session->get('admin_logged_in');
        }else{
            return view('backend/login/index');
        }
         $setting = new Setting();
         $setting= $setting->where('setting_name','theme')->first();  
         $this->theme=  $setting['setting_value'];
         $config_theme=$this->theme;
          
         $config = new \Config\Config_cms();
         $this->theme_config=$config->cms;
         
         $this->general_sections = $this->theme_config['theme_common_sections'];
         $this->theme_menus = $this->theme_config['theme_menus'];
         $this->path=APPPATH."views/themes/".$this->theme;
   }

    public function index()
    {
        $this->mViewData['active'] = 'disabled';
        $menus = new Menus_model();
        $menu_items = new Menu_item();
        $this->mViewData['menus_list'] = $menus->get_all_menus(0);
        $existing_positions = $menus->getMenuPositions();
        $positions = Array();

        if(isset($_GET['mid']))
        {
            if($_GET['mid'] > 0)
            {
                $aCurrentMenu = $menus->find($_GET['mid']);
                $this->mViewData['current_menu'] = $aCurrentMenu;
                $this->mViewData['active'] = '';
                $this->mViewData['menu_items'] = $menu_items->get_menu_items($aCurrentMenu['id']);
            }
        }else
        {
            if(isset($this->mViewData['menus_list']) and count($this->mViewData['menus_list']) > 0) 
            {
                $aCurrentMenu = $menus->find($this->mViewData['menus_list'][0]->id);
                $this->mViewData['current_menu'] = $aCurrentMenu;
                $this->mViewData['active'] = '';
                $this->mViewData['menu_items'] = $menu_items->get_menu_items($aCurrentMenu['id']);
            }
        }
        if (isset($aCurrentMenu))
        {
            foreach($this->theme_menus as $menu=>$menu_name) {
                if ($menu != "")
                    $positions[$menu] = $menu_name;
            }
        } else {
            foreach($this->theme_menus as $menu=>$menu_name) {
                if ($menu != "" and !in_array($menu, $existing_positions))
                    $positions[$menu] = $menu_name;
            }
        }
        $this->mViewData['positions'] = $positions;
        $this->mViewData['menu_item_panel'] = 'backend/menus/menu_item';
        $this->mViewData['page_title'] = 'Admin Panel - Menus';
        return view('backend/menus/index', $this->mViewData);
    }

     public function get_page()
    {

     $pages = new Page();
		 if (isset($_GET['term'])){
      $q = strtolower($_GET['term']);
      $pages->get_pages($q);

    }   
    exit();
    }
    
     public function get_service()
    {

     $services = new Service();
		 if (isset($_GET['term'])){
      $q = strtolower($_GET['term']);
      $services->get_services($q);

    }   
    exit();
    }

   public function addmenuitem()
   { 
    $type = $this->request->getVar('type');
    
    $menu_items = new Menu_item();
    $max_sort_order = $menu_items->get_max_sort_order($this->request->getVar('mid'));
    
    
    $mdata['parent_id'] = 0;
    $mdata['is_parent'] = 0;
    if ($type == "link")
    {
      $mdata['url'] = $this->request->getVar('linkurl');
      $mdata['label'] = $this->request->getVar('linktext');
       $mdata['slug'] = ''; //$this->common_functions->create_unique_slug($this->request->getVar('linktext'),'menu_items');
      $mdata['menu_id'] = $this->request->getVar('mid');
      $mdata['type'] = $type;
      $mdata['sort_order'] = $max_sort_order['max_sort_order'] + 1;
    }
    
    if ($type == "module")
    {
      $module = $this->request->getVar('module');
      $module_id = $this->request->getVar('module_id');
      if ($module == "page")
      {
        $pages = new Page();
        $page= $pages->where("id",$module_id)->first();
        $label = $page['title'];
       
        $mdata['module'] = 'pages';
        $mdata['slug'] = $page['slug'];
      }
      if ($module == "category")
      {
        $aPage = $this->categories_model->getById($module_id);
        $label = $aPage['category'];
        $mdata['module'] = 'categories';
        $mdata['slug'] = $aPage['slug'];
      }
      if ($module == "service")
      {
        $services = new Service();
        $service= $services->where("id",$module_id)->first();
        $label = $service['name'];
       
        $mdata['module'] = 'service';
        $mdata['slug'] = $service['slug'];
      }
        $mdata['module_id'] = $module_id;
        $mdata['label'] = $label;
        $mdata['menu_id'] = $this->request->getVar('mid');
        $mdata['type'] = $type;
        $mdata['url'] = '';
        $mdata['sort_order'] = $max_sort_order['max_sort_order'] + 1;
    }
    
        $res=  $menu_items->insert($mdata); 
        $last_id = $menu_items->getInsertID();
        $this->mViewData['menu_items'] = $menu_items->getMenuItemById($last_id);
    return view('backend/menus/menu_item', $this->mViewData);
  } 

  public function updatemenuitem()
  {
       $mid = $this->request->getVar('mid');
       $menu_items = new Menu_item();
       $menu_item = $menu_items->getMenuItemById($mid);

       $type = $menu_item[0]->type;
      //print_r($type); die;
    
    if ($type == "link")
    {
      $mdata['url'] = $this->request->getVar('linkurl');
      $mdata['label'] = $this->request->getVar('linktext');
    }
    
    if ($type == "module")
    {
      $mdata['label'] = $this->request->getVar('linktext');
    }
      $menu_items->update($mid,$mdata);
    
      echo "done";
      exit;
  } 

   public function delmenuitem()
   {
    
      $menu_items = new Menu_item();
      $menu_items->where('id', $_GET['mid'])->delete();
        
   }


  public function create()
  {
      $mdata['menu_name'] = $this->request->getPost('menu_name');
      $mdata['position'] = $this->request->getPost('menu_position');
      $menus = new Menus_model();
      $res=$menus->insert($mdata);
     
      if($res)
      { 
        $last_id = $menus->getInsertID();
        
        return redirect()->to('admin/menus/?mid='.$last_id);

      }
  }

    public function update()
  {  
      $menu_items = new Menu_item();
      $sort_order1 = 0;
      $sort_order2 = 0;
      $sort_order3 = 0;
   // echo "<pre>";  print_r(json_decode($_POST['menu_items'])); die;
      foreach(json_decode($_POST['menu_items']) as $key=>$menu_item)
      { 
       if (isset($menu_item->id))
        {
          $mdata['sort_order'] = $sort_order1;
          $mdata['parent_id'] = 0;
          $mdata['is_parent'] = 0;
         
          $menu_items->update($menu_item->id,$mdata);
          $sort_order1 = $sort_order1 + 1;
        }
      if (isset($menu_item->children))
        {
          $sort_order2 = 0;
          foreach($menu_item->children as $key=>$sub_menu_item)
          {
            if (isset($sub_menu_item->id))
            {
              $mdata['sort_order'] = $sort_order2;
              $mdata['parent_id'] = $menu_item->id;
              $mdata['is_parent'] = 0;
              
              $pdata['is_parent'] = 1;
              $is_parent_id = $menu_item->id;
              
              $menu_items->update($is_parent_id,$pdata);
              

              $menu_items->update($sub_menu_item->id,$mdata);
              $sort_order2 = $sort_order2 + 1;
            }
            
            if (isset($sub_menu_item->children))
            {
              $sort_order3 = 0;
              foreach($sub_menu_item->children as $key=>$sub_menu_item2)
              {
                if (isset($sub_menu_item2->id))
                {
                  $mdata['sort_order'] = $sort_order3;
                  $mdata['parent_id'] = $sub_menu_item->id;
                  $mdata['is_parent'] = 0;
                  
                  $pdata['is_parent'] = 1;
                  $is_parent_id = $sub_menu_item->id;
                
                  $menu_items->update($is_parent_id,$pdata);
                  
                  $menu_items->update($sub_menu_item2->id,$mdata);
                  $sort_order3 = $sort_order3 + 1;
                }
              }
            }
          }
        }
      }
      
      if (isset($_POST['menu_name']) and $_POST['menu_name'] != "")
      {
        $data['menu_name'] = $this->request->getPost('menu_name');
        $data['position'] = $this->request->getPost('menu_position');
        $menus = new Menus_model();
        $menus->update($_POST['id'],$data);
      }
      
      return redirect()->to('admin/menus/?mid='.$_POST['id']);
  }

    public function delete($id)
   {
        $menus = new Menus_model();
        $menus->where('id', $id)->delete();
        $menu_items = new Menu_item();
        $menu_items->where('menu_id', $id)->delete();
        return redirect()->to('admin/menus');
    }
}
