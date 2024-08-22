<?php
namespace App\Controllers\Frontend;
use App\Controllers\BaseController;
use App\Models\Resource_material;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Page;

class ResourceController extends BaseController
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
        $categories= $categories->where('module','resource')->findAll();
        $this->category_names = array();
        $this->category_names[0] = '';
        foreach($categories as $category) {
            $this->category_names[$category['id']] = $category['title'];
        }
    }    
    
    public function index($slug = '')
    {
        $pager = \Config\Services::pager();
        $resourceCountModel = new Resource_material();
        $resourcesModel = new Resource_material();
        $this->mViewData['page_title'] ='Resources';
        $this->mViewData['meta']['title'] ='Resources';
        
        if ($slug != '') {
            $categoryModel = new Category();
            $category = $categoryModel->where('slug',$slug)->first();
            $category_id = $category['id'];
            $category_title = $category['title'];
            $resourceCountModel->where('category_id',$category_id);
            $resourcesModel->where('category_id',$category_id);

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
        $page = (int) ($this->request->getGet('page') ?? 1);
        
        $total = $resourceCountModel->where('is_active', 1)->countAllResults();
        $this->mViewData['page'] = $page;
        $this->mViewData['perPage'] = $perPage;
        $this->mViewData['total'] = $total;
        $this->mViewData['resources_list'] = $resourcesModel->where('is_active', 1)->orderBy('publish_date DESC')->paginate($perPage);
        $pager_links = $pager->makeLinks($page, $perPage, $total, 'default_full');
        $this->mViewData['pager_links'] = $pager_links;     
        
        $this->mViewData['category_names'] = $this->category_names;
        if(file_exists(APPPATH."Views/themes/$this->theme/resources.php")) {
            return view('themes/'.$this->theme.'/resources', $this->mViewData);
        } else if(file_exists(APPPATH."Views/themes/$this->theme/$slug.php")) {
            return view('themes/'.$this->theme.'/'.$slug, $this->mViewData);
        } else {
            return view('frontend/resources/index', $this->mViewData);
        }
    }
}