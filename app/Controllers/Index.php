<?php

namespace App\Controllers;
use App\Controllers\Frontend\Profile_management;
use App\Controllers\Frontend\Service_management;
use App\Models\Setting;
use App\Models\Page;
use App\Models\Faq;
use App\Models\Page_module;
use App\Models\Profile;
use App\Models\Service;
use App\Models\Banner;
use App\Models\Menus_model;
use App\Models\Menu_item;
use App\Models\Contact_us_Model;
use App\Libraries\Dynamic_menu;
use App\Models\Resource_material;
use App\Models\Blog;
class Index extends BaseController
{    
    function __construct()    
    {
        $setting = new Setting();
        $setting= $setting->where('setting_name','theme')->first();  
        $this->theme=  $setting['setting_value'];
        $config_theme=$this->theme;
        $this->mViewData['theme_name'] = $this->theme;
        $config = new \Config\Config_cms();
        $this->theme_config=$config->cms;
    }    
  
    public function index()
    {
        $templates = $this->theme_config['theme_templates'];
        $menus = new Menus_model();
        $menu_items = new Menu_item();
        $uri = service('uri'); 
        $slug = $uri->getSegment(1);
        $module = '';
        if ($slug == "services") {
          $slug = $uri->getSegment(2);
          $module = 'service';
        }
    
        if ($slug == "")
        {
            $pages = new Page();
            $page= $pages->where('home_page', 1)->get()->getRow(); 
            if (isset($page->id) and $page->status == 1) 
            {
                $slug = $page->slug;
                $this->mViewData['home_page_check'] = true;
                
                $this->mViewData['meta']['title'] = $page->meta_title;
                $this->mViewData['meta']['keyword'] = $page->meta_keyword;
                $this->mViewData['meta']['description'] = $page->meta_description;  
                
                $rel_pages=$pages->get_pages_section($page->id);
                $this->mViewData['relatedpage'] = $rel_pages;
                $this->mViewData['partial'] = 'frontend/pages/show';
                $this->mViewData['page'] = $page;
                //print_r($page); die;
                $this->mViewData['theme_name'] = $this->theme;

                $this->mViewData['theme_multi_sections'] = $this->theme_config['theme_multi_sections'];
                //$this->mViewData['records'] = $records;
                $this->mViewData['page_title'] = $page->title;
                $bannerModel = new Banner();
                $banner=$bannerModel->where('banner_for','page')->where('banner_for_id',$page->id)->where('is_active',true)->findAll();
                $this->mViewData['banners'] = $banner;
                if ($page->template == "" || $page->template == "0") 
                    return view('themes/'.$this->theme.'/multi_section', $this->mViewData);
                else {
                    $template_file = $templates[$page->template]['file'];
                    return  view('themes/'.$this->theme.'/'.$template_file, $this->mViewData);
                }
                exit;
            }
        }
        else
        {   
            if ($module == '')
            {
                $menu_item = $menu_items->getMenuItemBySlug($slug);
                if (isset($menu_item) and isset($menu_item[0]))
                {
                    $module = $menu_item[0]->module;
                } else {
                    $module = 'pages';
                }
                if ($module == 'pages') 
                {
                    $pages = new Page();
                    $page=$pages->where('slug', $slug)->get()->getRow();
                    $this->mViewData['home_page_check'] = false;
                    //print_r($page->id); die;
                    if (isset($page->id) and $page->status == 1) {
                        $slug = $slug;  
                    } else {
                        $slug = str_replace("_","-",$slug);
                        $page = new Page();
                        $page->where('slug', $slug)->get();
                        if (isset($page->id) and $page->status == 1) {
                            redirect(base_url($page->slug), 'auto', 301);
                            die();
                        }
                    }
                }
            }
        }
/*    
        $blogModel = new Blog();
        $blogs=$blogModel->where('is_active = 1 and publish_at is not null')->orderBy('publish_at desc')->findAll(2);
        $this->mViewData['blogs'] = $blogs;
        $this->mViewData['blogs'] = $blogs;
        $resourceModel = new Resource_material();
        $resources=$resourceModel->where('is_active = 1')->orderBy('created_at desc')->findAll(5);
        $this->mViewData['resources'] = $resources;
        $this->mViewData['resources'] = $resources;
*/
        if ($slug != "")
        {
            if ($module == 'pages' and isset($page->id) and $page->status == 1)
            {
                $this->mViewData['meta']['title'] = $page->meta_title;
                $this->mViewData['meta']['keyword'] = $page->meta_keyword;
                $this->mViewData['meta']['description'] = $page->meta_description;  
                $rel_pages=$pages->get_pages_section($page->id);
                $this->mViewData['relatedpage'] = $rel_pages;
                $this->mViewData['partial'] = 'frontend/pages/show';
                $this->mViewData['page'] = $page;
                //print_r($page); die;
                $this->mViewData['theme_name'] = $this->theme;

                $this->mViewData['theme_multi_sections'] = $this->theme_config['theme_multi_sections'];
                //$this->mViewData['records'] = $records;
                $this->mViewData['page_title'] = $page->title;
               //print_r($page->template); die;
            
                $bannerModel = new Banner();
                $banner=$bannerModel->where('banner_for','page')->where('banner_for_id',$page->id)->where('is_active',true)->findAll();
                $this->mViewData['banners'] = $banner;
                if ($page->template == "" || $page->template == "0") 
                    return view('themes/'.$this->theme.'/multi_section', $this->mViewData);
                else {
                    $template_file = $templates[$page->template]['file'];
                    return  view('themes/'.$this->theme.'/'.$template_file, $this->mViewData);
                }
            }
            else if ($module == 'profile')
            {
                $profile = new Profile_management();
                echo $profile->attorney_details($menu_item[0]->slug); 
            }
            else if ($module == 'service')
            {            
                $services = new Service();
                $services_data=$services->findAll();
                $this->mViewData['service_list'] = $services_data;
                $service_detail=$services->where('slug', $slug)->where('is_active', true)->first();
                $serviceTitle = $service_detail['name'];
                $this->mViewData['page_title'] =  $serviceTitle;
                $this->mViewData['meta']['title'] =  $serviceTitle;
                $this->mViewData['theme_name'] = $this->theme;
                $this->mViewData['service_detail'] = $service_detail;
                $child_services=$services->where('parent_id', $service_detail['id'])->where('is_active', true)->orderBy('sort_order', 'ASC')->findAll();
                $this->mViewData['child_services'] = $child_services;
                
                $faqModel = new Faq();
                $faqs=$faqModel->where('faq_group_id',$service_detail['faq_group_id'])->where('is_active',true)->findAll();
                $this->mViewData['faqs'] = $faqs;
                
                $bannerModel = new Banner();
                $banner=$bannerModel->where('banner_for','service')->where('banner_for_id',$service_detail['id'])->where('is_active',true)->findAll();
                $this->mViewData['banners'] = $banner;
                if (empty($banner) || empty($faqs)) {
                    $parent_service_detail=$services->where('id', $service_detail['parent_id'])->where('is_active', true)->first();
                    
                    if (empty($faqs) && !empty($parent_service_detail)) {
                        $faqModel = new Faq();
                        $faqs=$faqModel->where('faq_group_id',$parent_service_detail['faq_group_id'])->where('is_active',true)->findAll();
                        $this->mViewData['faqs'] = $faqs;
                    }
                    
                    if (empty($banner) && !empty($parent_service_detail)) {
                        $bannerModel = new Banner();
                        $banner=$bannerModel->where('banner_for','service')->where('banner_for_id',$parent_service_detail['id'])->where('is_active',true)->findAll();
                        $this->mViewData['banners'] = $banner;
                    }
                }
                if ($service_detail['template'] == "" || $service_detail['template'] == "0")
                    return view('themes/'.$this->theme.'/multi_section', $this->mViewData);
                else {
                    $template_file = $service_detail['template'];
                    return  view('themes/'.$this->theme.'/'.$template_file, $this->mViewData);
                }      
            }
            else
            { 
                $this->mViewData['meta']['title'] = '';
                $this->mViewData['meta']['keyword'] = '';
                $this->mViewData['meta']['description'] = ''; 
                $this->mViewData['media'] = ''; 
                $this->mViewData['heading'] = "Ooops, looks like a ghost!";
                $this->mViewData['message'] = "The page you are looking for can't be found.";
                //$this->output->set_status_header('404');
                return view('themes/'.$this->theme.'/error', $this->mViewData);
            }
        }
    }

    public function about_us()
    {
        return view('themes/'.$this->theme.'/about', $this->mViewData);
    }
    
    public function contact_us()
    {
        $this->mViewData['meta']['title'] = 'Contact Us';
        $this->mViewData['meta']['title'] = 'Contact Us';
        $this->mViewData['meta']['keyword'] = '';
        $this->mViewData['meta']['description'] = '';  
        return view('themes/'.$this->theme.'/contact_us', $this->mViewData);
    }
  
    public function save_contact_form()
    {
         //echo "<pre>";
         //print_r($_POST);
        $validation = \Config\Services::validation();

        // Set the validation rules
        $rules=[
            'name' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please enter  name  ',
            ],
            ],
            'email' => [
            'rules'  => 'required|valid_email',
            'errors' => [
                'required' => 'Please enter  email  ',
                'valid_email' => 'Please enter  valid email',
            ],
            ],
            'message' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please enter  message  ',
            ],
            ],
            'subject' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please enter subject  ',
            ],
            ],
            ];
        if (!$this->validate($rules)) {
            // Form validation failed, return the errors
           $data['success'] = false;
            $data['validation']=$this->validator;
            return $this->response->setJSON([
                'success' => false,
                'errors'  => $validation->getErrors(),
            ]);
        } else {
            // Form validation succeeded, do something
             $name=$this->request->getPost('name');
             $email_id=$this->request->getPost('email');
             $subject=$this->request->getPost('subject');
             $message=$this->request->getPost('message');
             $phone=$this->request->getPost('phone');
            $contact_us_data = [
                'name'=>$name,
                'email_id'=>$email_id,
                'message'=>$message,
                'subject'=>$subject,
                'phone'=>$phone
               
                
            ];  //print_r($hotel_review_data); die;
            $contact = new Contact_us_Model();
            $contact->insert($contact_us_data);
            $data['success'] = true;
            $data['message'] = 'Contact us submitted successfully.';
        }
        return $this->response->setJSON($data);
    }
}
