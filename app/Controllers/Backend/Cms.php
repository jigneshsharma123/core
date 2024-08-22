<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\Setting;
use App\Models\Menus_model;
use App\Models\Common_section;
use App\Models\Custom_menu;
use App\Models\Menu_item;
use App\Models\Page;
use App\Models\Service;
use App\Libraries\Common_Functions;

class Cms extends BaseController
{  
    function __construct() {
        helper(['form', 'url']);
        //$this->load->library('form_validation');
        //$this->load->helper('application');
        $this->data['current_page'] = 'pages';
        //$this->load->library('common_functions'); 
        //$this->load->library('ckeditor');
        //$this->load->library('ckfinder');
        //$this->data['current_page'] = 'Pages';
        //$this->ckeditor->basePath = base_url().'assets/admin/ckeditor/';
        //$this->ckeditor->config['toolbar'] = array(
        //    array( 'Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat'),
        //    array( 'Image', 'Table', 'HorizontalRule', 'SpecialChar'),
        //    array( 'Link', 'Unlink', 'Anchor' ),
        //    array( 'Styles', 'Format'),
        //    array( 'Scayt'),
        //    array( 'Maximize'),
        //    array( 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote'),
        //    array( 'Source' )
        //); 
        //$this->ckeditor->config['language'] = 'en';
        //$this->ckeditor->config['width'] = '100%';
        //$this->ckeditor->config['height'] = '300px';     
        //$this->load->helper('inflector');
        
        //$setting = new Setting();
        
        $setting = new Setting();
        $setting= $setting->where('setting_name','theme')->first();  
        $this->theme=  $setting['setting_value'];
        
        $config = new \Config\Config_cms();
        $this->theme_config=$config->cms;
        
        $this->general_sections = $this->theme_config['theme_common_sections'];

        $this->widget_path=APPPATH."Views/backend/widgets/";
        $widgets = scandir($this->widget_path);
        $widgets = array_diff($widgets, array('..', '.'));
        $active_widgets = unserialize(ACTIVE_WIDGETS);

        foreach($widgets as $widget)
        {
            $widget = str_replace(".php","",$widget);
            if (in_array($widget, array_keys($active_widgets)))
                $this->widgets[$widget] = ucwords(str_replace("_"," ",str_replace("-"," ",$widget)));
        }
    }
  
    function add_widget_content()
    {
        echo $customsection = $this->request->getPost('customsection');
        $widget = $this->request->getPost('widget');
        $section = $this->request->getPost('section');
        $content = json_encode($_POST[$widget]);
        
        $common_section = new Common_section();
        
        $section_update_data=[
            'widget'   =>$widget,
            'section'=>$section,
            'option_value'=>$content
        ];
        $common_section->update($customsection,$section_update_data);
        return redirect()->to('admin/cms/widgets');
        exit;
    }
  
    function remove_widget()
    {
        $common_section = new Common_section();
        $id = $this->request->getPost('id');
        $common_section->where("id",$id);
        $common_section->delete();
        exit;
    }

    function add_widget()
    {
        $common_section = new Common_section();
        
        $section = $this->request->getPost('section');
        $widget = $this->request->getPost('widget');
        
        $section_data=[
            'theme'=>$this->theme,
            'section'=>$section,
            'widget'=>$widget
        ];
        $common_section->insert($section_data);
        
        return redirect()->to('admin/cms/widgets');
    }
  
    function widgets() 
    {
        $homepage = new Page();
        $homepage->where('home_page', 1)->get();
        //$section_count = $homepage->relatedpage->include_join_fields()->count();
        //$homepage->relatedpage->include_join_fields()->get();
        
        foreach($this->general_sections as $general_section_key=>$general_section)
        {
            $general_section_file = $general_section['file'];
            $general_section_title = $general_section['name'];

            $common_section_model = new \App\Models\Common_section();
        
            $common_sections = $common_section_model->where("theme",$this->theme)->where('section',$general_section_key)->get()->getResultArray();
            $common_section_details[$general_section_key] = array();
            $common_section_details[$general_section_key]['title'] = $general_section_title;
            $common_section_details[$general_section_key]['widgets'] = array();
            foreach($common_sections as $common_section)
            {
                $widget_detail = array();
                $widget_detail['customsection'] = $common_section['id'];
                $widget_detail['name'] = $common_section['widget'];
                $widget_detail['data'] = json_decode($common_section['option_value']);
                $module = ucwords($common_section['widget']);
                if(file_exists(APPPATH."Models/$module.php")){
                    $module_name = strtolower($module);
                    switch ($module_name) {
                        case 'custom_menu':
                        $model_class = new \App\Models\Custom_menu();
                        break;
                    }
                    $widget_detail['records'] = $model_class->get()->getResultArray();
                }
                else{
                    $widget_detail['records'] = array();
                }
                array_push($common_section_details[$general_section_key]['widgets'] , $widget_detail);
            }
        }
        
        /*echo '<pre>';
        print_r($common_section_details);
        echo '</pre>';
        exit;*/
        $this->mViewData['common_sections'] = $common_section_details;
        $this->mViewData['widgets'] = $this->widgets;
        $this->mViewData['sections_exists'] = 5;
        $this->mViewData['homepage'] = $homepage;
        
        $this->mViewData['page_title'] = 'Widgets';
        $this->mViewData['form_action'] = 'create';
        echo view('backend/cms/widgets', $this->mViewData);
    }
  
    function settings()
    {
        $this->settings_field = $this->theme_config['settings'];
        $settings = new Setting();
        $settings->get();
        foreach($settings as $setting)
        {
          $setting_values[$setting->setting_name] = $setting->setting_value;
        }

        $this->mViewData['setting_values'] = $setting_values;
        $this->mViewData['settings_field'] = $this->settings_field;
        $this->mViewData['form_action'] = 'update_settings';
        $this->render('backend/cms/settings', 'default');
    }

    function update_settings()
    {
        $this->settings_field = $this->theme_config['settings'];
        $settings_array = array();
        foreach($this->settings_field as $setting_field_key=>$setting_field) {
          $setting_group = $setting_field_key;
          $setting_array = array();
          $setting_array['group'] = $setting_group;
          if (is_array($setting_field)) {
            foreach($setting_field as $setting_field_inner) {
              $setting_name = $setting_field_inner;
              $setting_value = $_POST[$setting_name];
              
              $setting_array['name'] = $setting_name;
              $setting_array['value'] = $setting_value;
              
              array_push($settings_array,$setting_array);
            }
          } else {
            $setting_group = '';
            $setting_name = $setting_field_key;
            $setting_value = $_POST[$setting_name];
            
            $setting_array['group'] = $setting_group;
            $setting_array['name'] = $setting_name;
            $setting_array['value'] = $setting_value;
            array_push($settings_array,$setting_array);
          }
        }

        foreach($settings_array as $setting_data)
        {
          $setting_group = $setting_data['group'];
          $setting_name = $setting_data['name'];
          $setting_value = $setting_data['value'];
          
          $setting = new Setting();
          $setting->where("setting_group",$setting_group);
          $setting->where("setting_name",$setting_name);
          $setting_count = $setting->count();
          
          if ($setting_count == 0)
          {        
            $new_setting = new Setting();
            $new_setting->setting_group = $setting_group;
            $new_setting->setting_name = $setting_name;
            $new_setting->setting_value = $setting_value;
            $new_setting->save();
          }
          else
          {
            $setting = new Setting();
            $setting->where("setting_group",$setting_group);
            $setting->where("setting_name",$setting_name);
            $setting->get();
            
            $update_setting = new Setting();
            $update_setting->id = $setting->id;
            $update_setting->setting_group = $setting_group;
            $update_setting->setting_name = $setting_name;
            $update_setting->setting_value = $setting_value;
            $update_setting->save();
          }
        }
        header('location:'.base_url()."admin/cms/settings");
        exit;
    }
}
