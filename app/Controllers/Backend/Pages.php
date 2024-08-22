<?php

namespace App\Controllers\Backend;

use CodeIgniter\Controller; 
use App\Controllers\BaseController;
use App\Models\Page;
use App\Models\Blog;
use App\Models\Custom_form;
use App\Models\Page_section;
use App\Models\Page_module;
use App\Models\Setting;
use App\Libraries\Common_Functions;
  

class Pages extends BaseController
{
    public function __construct()
    {   
        helper(['form', 'url','inflector']);
        $session=session();
        $data['current_page'] = 'Pages';
        if ($session->has('admin_logged_in')) 
        {
            $this->mViewData['session_data']=$session->get('admin_logged_in');
        } else {
            return view('backend/login/index');
        }

        $this->path=APPPATH."Views/backend/sections/";
        $this->sections = scandir($this->path);
        $this->sections = array_diff($this->sections, array('..', '.'));

        $setting = new Setting();
        $setting= $setting->where('setting_name','theme')->first();  
        $con=  $setting['setting_value'];

        $config = new \Config\Config_cms();
        $this->theme_config=$config->cms;

        $this->general_sections = $this->theme_config['theme_common_sections'];

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
        $this->mViewData['startupOutlineBlocks'] = true;
        $this->mViewData['fillEmptyBlocks'] = false;
        $this->mViewData['extraAllowedContent'] = 'section;span;ul;li;table;td;style;*[id];*(*);*{*}';
        $this->mViewData['forcePasteAsPlainText'] = true;
        $active_page_sections = unserialize(ACTIVE_PAGE_SECTIONS);
        $CATEGORY_MODULES = unserialize(CATEGORY_MODULES);
        $this->mViewData['active_page_sections'] = $active_page_sections;
        $this->mViewData['category_modules'] = $CATEGORY_MODULES;
    }

    public function index()
    {
        $pages = new Page();
        $pages=$pages->where('only_for_page_section',0)->get()->getResultArray(); 
        $this->mViewData['page_title'] = 'Admin Panel - Pages';
        $this->mViewData['pages_list'] = $pages;
        echo view('backend/pages/index', $this->mViewData );
    }

    public function sections()
    {
        $pages = new Page();
        $pages=$pages->where('only_for_page_section',1)->get()->getResultArray(); 
        $this->mViewData['page_title'] = 'Admin Panel - Sections';
        $this->mViewData['pages_list'] = $pages;
        echo view('backend/pages/index', $this->mViewData );
    } 

    public function add()
    { 
        $templates = $this->theme_config['theme_templates'];
        //echo "<pre>"; print_r($templates); die;
        //$this->mViewData['sections_exists'] = 0;
        //$this->mViewData['sections'] = $records;
        //echo "<pre>"; print_r($this->mViewData['sections']); die;
        $this->mViewData['templates'] = $templates;
        $this->mViewData['form_action'] = 'create';
        $this->mViewData['page_title'] = 'Admin Panel - Add ';
        echo view('backend/pages/form', $this->mViewData);
    }

    public  function create()
    {
        //echo "<pre>";
        //print_r($_POST); die;
        $page = new Page();
        $only_for_page_section=$this->request->getPost('only_for_page_section');
        if (isset($only_for_page_section)) 
        {
            $only_for_page_section=1;
        } else {
            $only_for_page_section=0;
        }
        $common_functions = new Common_Functions();
        $title=$this->request->getPost('title');
        $slug=$common_functions->create_unique_slug($title,'Page');
        $page_content=$this->request->getPost('page_content');
        $meta_title=$this->request->getPost('meta_title');
        if ($meta_title == "")
        {
            $meta_title = $title;
        }
        $meta_keyword=$this->request->getPost('meta_keyword');
        $meta_description=$this->request->getPost('meta_description');
        $banner_class=$this->request->getPost('banner_class');
        $media_element_id = $this->request->getPost('image_id');    
        $image_alt_tag = $this->request->getPost('image_alt_tag');
        $status=$this->request->getPost('status');
        if (isset($status)) 
        {
            $status=1;
        } else {
            $status=0;
        }
        $template=$this->request->getPost('template');     

        $page_data=[
            'only_for_page_section'=>$only_for_page_section,
            'title'=>$title,
            'slug'=>$slug,
            'meta_title'=>$meta_title,
            'page_content'=>$page_content,
            'meta_keyword'=>$meta_keyword,
            'meta_description'=>$meta_description,
            'banner_class'=>$banner_class,
            'media_element_id'=>$media_element_id,
            'image_alt_tag'=>$image_alt_tag,
            'status' =>$status,
            'template'=>$template
        ];      
        $page->insert($page_data);
        $last_page_id = $page->getInsertID();
        return redirect()->to('admin/pages/edit/'.$last_page_id);
    }

    public function edit($id)
    {  
        $page = new Page();
        $pages=$page->where('id', $id)->first(); 
        $rel_pages=$page->get_pages_section($id);
        $i=0;
        $sec_data = array();
        foreach ($rel_pages as  $rel_page)
        {
            $pages_info=$page->where('id', $rel_page->relatedpage_id)->first();
            $sec_data[$i]['title'] = $pages_info['title'] ;
            $sec_data[$i]['id'] = $pages_info['id'];
            $sec_data[$i]['show_title']=$rel_page->show_title;
            $sec_data[$i]['featured_image_position']=$rel_page->featured_image_position;
            $sec_data[$i]['sort_order']=$rel_page->sort_order;
            $sec_data[$i]['read_more_link_type']=$rel_page->read_more_link_type;
            $sec_data[$i]['read_more_link']=$rel_page->read_more_link;
            $sec_data[$i]['section_class']=$rel_page->section_class;
            $sec_data[$i]['section_id']=$rel_page->section_id;
            $sec_data[$i]['padding_class']=$rel_page->padding_class;
                          
            $i++;  
        }
        $this->mViewData['page_rel_sections'] = $sec_data;

        $templates = $this->theme_config['theme_templates'];
        helper('inflector');
        foreach($this->sections as $widget)
        {
            $module_file = explode(".",$widget);
            $file = singular($module_file[0]);
            $module  =    ucfirst($file);

            if(file_exists(APPPATH."Models/$module.php")){
                //echo " $module"; echo "<br>"; //die;
                $classname= "\App\Models".'\\'.$module; 
                $model = new $classname;
                $data= $model->get()->getResult(); 
                //echo "<pre>"; print_r($data); die; 
                $records[$module]['file'] = $widget;
                $records[$module]['data'] = $data;
            }
            else{
                $records[$module]['file'] = $widget;
                $records[$module]['data'] = '';
            }
        }
        $page_modules = new Page_module();
        $pageModules = $page_modules->where('page_id', $id)->findAll();

        $module_selected_values = array();
        foreach($pageModules as $page_module)
        {
            $module_selected_values[$page_module['module']] = json_decode($page_module['module_data']);
        }
        $page_section = new Page();
        $this->mViewData['theme_multi_sections'] = $this->theme_config['theme_multi_sections'];
        $this->mViewData['sections'] = $records;
        $this->mViewData['sections_exists'] = count($sec_data);
        $this->mViewData['module_selected_values'] = $module_selected_values;
        $this->mViewData['templates'] = $templates;
        $this->mViewData['page'] = $pages;
        $this->data['partial'] = 'backend/pages/form';
        $this->mViewData['form_action'] = 'update';
        $this->mViewData['page_title'] = 'Edit Page'; 
        echo view('backend/pages/form', $this->mViewData); 
    }

    public  function update()
    {
        $page = new Page();
        $page_id = $this->request->getPost('id');
        $only_for_page_section=$this->request->getPost('only_for_page_section');
        if (isset($only_for_page_section)) 
        {
            $only_for_page_section=1;
        } else {
            $only_for_page_section=0;
        }
        $title=$this->request->getPost('title');
        $page_content=$this->request->getPost('page_content');
        $meta_title=$this->request->getPost('meta_title');
        if ($meta_title == "")
        {
            $meta_title = $title;
        }
        $meta_keyword=$this->request->getPost('meta_keyword');
        $meta_description=$this->request->getPost('meta_description');
        $banner_class=$this->request->getPost('banner_class');
        $media_element_id = $this->request->getPost('image_id');    
        $image_alt_tag = $this->request->getPost('image_alt_tag');
        $status=$this->request->getPost('status');
        if (isset($status)) 
        {
            $status=1;
        }else{
            $status=0;
        }
        $template=$this->request->getPost('template');

        $page_update_data=[
            'id'   =>$page_id,
            'title'=>$title,
            'meta_title'=>$meta_title,
            'page_content'=>$page_content,
            'meta_keyword'=>$meta_keyword,
            'meta_description'=>$meta_description,
            'banner_class'=>$banner_class,
            'media_element_id'=>$media_element_id,
            'image_alt_tag'=>$image_alt_tag,
            'status' =>$status,
            'only_for_page_section'=>$only_for_page_section,
            'template'=>$template
        ];

        if ($page->update($page_id,$page_update_data)) 
        {
            foreach($this->sections as $widget)
            {
                $module_file = explode(".",$widget);
                $module = singular($module_file[0]);
                if (isset($_POST[$module]['included']) and $_POST[$module]['included'] == 1)
                {
                    $module_data = json_encode($_POST[$module]);
                    $page_module = new Page_module();
                    $existing_page_module = $page_module->where('page_id', $page_id)->where('module', $module)->first();

                    if (isset($existing_page_module['id']) and $existing_page_module['id'] > 0)
                    {
                        $page_module_data=[
                        'module_data'=>$module_data
                        ];
                        $page_module->update($existing_page_module['id'], $page_module_data);
                    }
                    else
                    {
                        $page_module = new Page_module();         

                        $page_module_data=[
                        'page_id'   =>$page_id,
                        'module'=>$module,
                        'module_data'=>$module_data
                        ];
                        $page_module->insert($page_module_data);
                    }
                }
                else
                {
                    //remvoe section
                    $page_module = new Page_module();
                    $page_module->where('page_id', $page_id)->where('module', $module)->delete();
                }
            }

            $page_sections = new Page_section();
            $page_sections->where('page_id', $page_id)->delete();
            if (isset($_POST['section_title'])) 
            {
                foreach($_POST['section_title'] as $key=>$section_title)
                {
                    $section = $_POST['sid'][$key];
                    $sort_order = $_POST['sort_order'][$key];
                    $section_id = $_POST['section_id'][$key];
                    $section_class = $_POST['section_class'][$key];
                    if (isset($_POST['show_title'][$key]))
                    {
                        $show_title = $_POST['show_title'][$key];
                    }
                    else
                    {
                        $show_title = 0;
                    }

                    $featured_image_position = $_POST['featured_image_position'][$key];
                    $read_more_link_type = $_POST['read_more_link_type'][$key];
                    $read_more_link = $_POST['read_more_link'][$key];
                    if ($section_title != "" and ($section == '' or $section == 0))
                    {
                        $newpage = new Page();
                        $data=[
                        'only_for_page_section'=>1,
                        'title' =>$section_title,
                        'status'=>1,
                        ]; 
                        $newpage->save($data);
                        $section = $newpage->getInsertID();
                    }
                    if ($section > 0)
                    {
                        $page_section = new Page_section();
                        $new_page_section = new Page_section();
                        $page_sec_data= $page_section->where('page_id', $page_id)->where('relatedpage_id', $section)->first();
                        if (isset($page_sec_data['id']) and $page_sec_data['id'] > 0)
                        {
                            $update_order=['sort_order'=>$sort_order];
                            $page_section->update($page_sec_data['id'],$update_order);
                            $new_page_section_data = [
                                'id'          =>$page_sec_data['id'],
                                'page_id'      =>  $page_id,
                                'sort_order'   =>  $sort_order,
                                'section_class'=>  $section_class,
                                'section_id'=>  $section_id,
                                //'padding_class'=>  $padding_class,
                                'show_title'   =>  $show_title,
                                'featured_image_position' => $featured_image_position,
                                'read_more_link_type' => $read_more_link_type ,
                                'read_more_link' => $read_more_link,
                                'relatedpage_id' => $section
                            ];
                            $new_page_section->save($new_page_section_data);
                        } else {
                            $new_page_section_data = [
                                'page_id'      =>  $page_id,
                                'sort_order'   =>  $sort_order,
                                'section_class'=>  $section_class,
                                'section_id'=>  $section_id,
                                //'padding_class'=>  $padding_class,
                                'show_title'   =>  $show_title,
                                'featured_image_position' => $featured_image_position,
                                'read_more_link_type' => $read_more_link_type ,
                                'read_more_link' => $read_more_link,
                                'relatedpage_id' => $section
                            ];
                            $new_page_section->save($new_page_section_data);
                        }
                        $oldpage = new Page();
                        $update_title=[
                        'title'=>$section_title
                        ];
                        //$oldpage->where('id', $section)->update('title', $section_title);
                        $oldpage->update($section,$update_title);
                    }
                }                
            }
        }
        return redirect()->to('admin/pages/edit/'.$page_id);
    }

    public function delete($id)
    {
        $page = new Page();
        $pages=$page->where('id', $id)->first();
        $page->where('id', $id)->delete();
        $page_sections = new Page_section();
        $page_sections->where('page_id', $pages['id'])->delete();
        $page_modules = new Page_module();
        $page_modules->where('page_id', $pages['id'])->delete();
        return redirect()->to('admin/pages');
    }

    public function changestatus($id)
    {
        $status_model = new Page();
        $pages=$status_model->where('id', $id)->first();
        if($pages['status']==1){
            $new_status=0;
        } else
        {
            $new_status=1;
        }

        $update_data['status']=$new_status;
        $res= $status_model->update($id,$update_data); 

        if($res)
        {  
            return redirect()->to('admin/pages');
        }
    }

    public function updateslug()
    {  
        $common_functions = new Common_Functions();
        $new_slug= $common_functions->create_unique_slug($this->request->getVar('slug'),'Page','slug','id',$this->request->getVar('id'));
        $page = new Page();
        $update_slug_data=[
            'slug'=>$new_slug
        ];
        $page->update($this->request->getVar('id'),$update_slug_data); 
        echo $new_slug;
        exit;
    }

    public function section() 
    {
        $this->data['theme_multi_sections'] = $this->theme_config['theme_multi_sections'];
        $this->data['section'] = $this->request->getvar('section');
        $this->data['inner_view'] = 'backend/pages/section';
        return view('backend/theme/_layouts/blank', $this->data);
    }

    public function get_page()
    {
        $pages = new Page();
        if (isset($_GET['term'])){
            $q = strtolower($_GET['term']);
            $pages->get_all_page($q);
        }
        exit();
    }
}
