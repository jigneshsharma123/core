<?php
namespace App\Controllers\frontend;
use App\Controllers\BaseController;
use App\Models\Blog;
class BlogController extends BaseController
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
        $blogs = new Blog();
        $blogs_data=$blogs->orderBy('sort_order ASC,first_name ASC, middle_name ASC, last_name ASC')->findAll();
        $this->mViewData['blogs_list'] = $blogs_data;
        $this->mViewData['meta']['title'] ='Attorney Blogs';
        return view('frontend/blogs/index', $this->mViewData);
    }

    public function show($slug)
    {
        $blogs = new Blog();
        $blogs_data=$blogs->findAll();
        $this->mViewData['blog_list'] = $blogs_data;
        $blog_detail=$blogs->where('slug', $slug)->first();    
        $firstName = $blog_detail['first_name'];
        $middleName = $blog_detail['middle_name'];
        $lastName =  $blog_detail['last_name'];
        $fullName = $firstName . ' ' . $middleName . ''. $lastName;
        $this->mViewData['meta']['title'] =  $fullName;
        $this->mViewData['blog_detail'] = $blog_detail;
        return view('frontend/blogs/show' ,$this->mViewData);
    }
}
