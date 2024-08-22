<?php
namespace App\Controllers\Frontend;
use App\Controllers\BaseController;
use App\Models\Blog;
use App\Models\Setting;
use App\Models\Category;

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
        $categories = new Category();
        $categories= $categories->where('module','blog')->findAll();
        $this->category_names = array();
        $this->category_names[0] = '';
        foreach($categories as $category) {
            $this->category_names[$category['id']] = $category['title'];
        }
    }    
    
    public function index($slug = '')
    {
        $pager = \Config\Services::pager();
        $blogCountModel = new Blog();
        $blogsModel = new Blog();
        if ($slug != '') {
            $categoryModel = new Category();
            $category = $categoryModel->where('slug',$slug)->first();
            $category_id = $category['id'];
            $category_title = $category['title'];
            $blogCountModel->where('category_id',$category_id);
            $blogsModel->where('category_id',$category_id);
            
            $pages = new Page();
            $page=$pages->where('slug', $slug)->get()->getRow();            
            if (!empty($page)) {
                $this->mViewData['page_title'] = $page->title;
                $this->mViewData['meta']['title'] = $page->meta_title;
                $this->mViewData['meta']['keyword'] = $page->meta_keyword;
                $this->mViewData['meta']['description'] = $page->meta_description;
            } else {
                $this->mViewData['page_title'] = (!empty($category_title)) ? $category_title : 'Resources';
                $this->mViewData['meta']['title'] = (!empty($category_title)) ? $category_title : 'Resources';
            }
        }

        $perPage = BLOGS_PER_PAGE;
        $page    = (int) ($this->request->getGet('page') ?? 1);
        $total   = $blogCountModel->where('is_active', 1)->countAllResults();
        $this->mViewData['page'] = $page;
        $this->mViewData['perPage'] = $perPage;
        $this->mViewData['total'] = $total;
        $this->mViewData['blogs_list'] = $blogsModel->where('is_active', 1)->orderBy('publish_at DESC')->paginate($perPage);
        $pager_links = $pager->makeLinks($page, $perPage, $total, 'default_full');
        $this->mViewData['pager_links'] = $pager_links;
        $this->mViewData['meta']['title'] ='Blogs';
        
        $this->mViewData['category_names'] = $this->category_names;
        if(file_exists(APPPATH."Views/themes/$this->theme/blogs.php")) {
            return view('themes/'.$this->theme.'/blogs', $this->mViewData);
        } else {
            return view('frontend/blogs/index', $this->mViewData);
        }
    }

    public function show($slug)
    {
        $blogs = new Blog();
        $blog_detail=$blogs->where('slug', $slug)->first();
        $related_blogs=$blogs->where('is_active', 1)->where('category_id',$blog_detail['category_id'])->where('id != ',$blog_detail['id'])->findAll(3);
        $this->mViewData['meta']['title'] =  $blog_detail['title'];
        $this->mViewData['blog'] = $blog_detail;
        $this->mViewData['related_blogs'] = $related_blogs;
        $this->mViewData['category_names'] = $this->category_names;
        if(file_exists(APPPATH."Views/themes/$this->theme/blog.php")) {
            return view('themes/'.$this->theme.'/blog', $this->mViewData);
        } else {
            return view('frontend/blogs/show', $this->mViewData);
        }
    }
}
