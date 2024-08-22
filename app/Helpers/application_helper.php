<?php
if (!function_exists('current_user_details')) {
    function current_user_details()
    {
        $session=session();
        return $session->get('admin_logged_in');
    }
}

function get_first_paragraph($content){
    $start = strpos($content, '<p>');
    $end = strpos($content, '</p>', $start);
    $paragraph = substr($content, $start, $end-$start+4);
    return $paragraph;
}

function get_jobs()
{
    $jobModel = new \App\Models\Job();
    $jobs=$jobModel->where('is_active',1)->orderBy('created_at','desc')->findAll();
    return $jobs;
}

function get_latest_resources()
{
    $resourceModel = new \App\Models\Resource_material();
    $latest_resources=$resourceModel->latest_resources_by_category();
    return $latest_resources;
}

function get_latest_blogs()
{
    $blogModel = new \App\Models\Blog();
    $latest_blogs=$blogModel->latest_blogs();
    return $latest_blogs;
}

function get_sections($page)
{
    $inner_sections = new \App\Models\Page();
    $rel_pages=$inner_sections->get_pages_section($page->relatedpage_id);
    return $rel_pages;
}

function media_library_button($allowed_types, $content_type, $content_id, $content_tag, $model_name, $field_name, $version = 'thumb')
{
  //$CI =& get_instance();
  $show_section = 'none';
  
  $output = "";
  if ($content_id > 0)
  {
    $show_section = 'block';
    $media = new \App\Models\Media_Element();
    $media_count = $media->where("id",$content_id)->countAllResults();
    $media=$media->where("id",$content_id)->first();
    if ($content_type =='image') 
    {
      if ($media_count == 1)
      {
        if (file_exists($media['media'])) 
        {
          if ($version == 'thumb')
            $output = '<img class="grayscale" src="'.base_url()."/".$media['thumb'].'"></a><a class="removemedia" href="javascript:void(0)">Remove</a>';
          else
            $output = '<img class="grayscale" src="'.base_url().$media['media'].'"></a><a class="removemedia" href="javascript:void(0)">Remove</a>';
        } else {
          $output = $media['media'];
        }
      } 
      else 
      {
        $output = "Image Removed From Gallery";
        $content_id = "";
        $content_type = "";
      }
    } 
    else if ($content_type =='video') 
    {
      $data = $CI->media_gallery_model->getById($content_id);
      if (isset($data) && isset($data[0])) {
        //if (isset($data[0].file.url.present?)
        //  $output = image_tag($data.first.file.url(:thumb), :border =>0);
        //} else {
        //  $output = $data.first.name;
        //}
      } else {
        $output = "Video Removed From Gallery";
        $content_id = "";
        $content_type = "";
      }
    } 
    else if ($content_type =='swf') 
    {
      $data = $CI->media_gallery_model->getById($content_id);
      if (isset($data) && isset($data[0])) {
       //if (isset($data[0].file.url.present?)
        //  $output = image_tag($data.first.file.url(:thumb), :border =>0);
        //} else {
        //  $output = $data.first.name;
        //}
      } else {
        $output = "Swf Removed From Gallery";
        $content_id = "";
        $content_type = "";
      }
    } 
    else if ($content_type =='pdf') 
    {
      $data = $CI->media_gallery_model->getById($content_id);
      if (isset($data) && isset($data[0])) {
        //if (isset($data[0].file.url.present?)
        //  $output = image_tag($data.first.file.url(:thumb), :border =>0);
        //} else {
        //  $output = $data.first.name;
        //}
      } else {
        $output = "Pdf Removed From CMS";
        $content_id = "";
        $content_type = "";
      }
    }
  }
  
  if (count($allowed_types) > 1)
    $button_text = "Content";
  else
    $button_text = $allowed_types[0];
  
  $semioutput = $output;
  
  $output = '<a href="javascript:void(0);" class="btn btn-success openmediagallery">Select From Media Gallery</a>';
    
  $output = $output . '<div><div id="'.$model_name.'_'.$field_name.'_alt_tag_section" style="display:'.$show_section.'">Alt Tag:<br><input id="'.$model_name.'_'.$field_name.'_alt_tag" name="'.$field_name.'_alt_tag" type="text" class="form-control" value="'.$content_tag.'"></div><input id="'.$model_name.'_'.$field_name.'_id" name="'.$field_name.'_id" type="hidden" value="'.$content_id.'" style="left:-25px;position:relative;top:5px;width:1px;z-index:-20;">';
  
  $output = $output . '<div id="'.$model_name.'_'.$field_name.'_name" class="medialibrarysmallcontent" style="margin-top:5px;">'. $semioutput . '</div>' . '<input id="'.$model_name.'_'.$field_name.'_type" name="'.$field_name.'_type" type="hidden" value="'.$content_type.'"></div>';
  
  $output = $output . '<script>
    $(".openmediagallery").click(function(){
      $.ajax({
        method: "GET",
        url: "'.base_url().'/admin/media_library/select",
        data: { element: "'.$model_name.'_'.$field_name.'" }
      }).done(function( msg ) {
        $(".modal-body").html(msg)
        $("#MediaLibraryModal-title").html("Media Library")
        $(".modal-footer").html("")
        $("#MediaLibraryModal").modal("show")
        return false;
      });
    });
    $(".medialibrarysmallcontent").on("click",".removemedia",function(){
      $(this).parent().parent().find("input").each(function(){
        $(this).val("")
      });
      $(this).parent().parent().find("div").each(function(){
        $(this).hide()
      });
      $(this).parent().html("")
    })
    
  </script>';
  return $output;
}

function show_content($page)
{  
  $page_content = $page->page_content;
  $page_modules = new \App\Models\Page_module();
  $pageModules = $page_modules->where('page_id', $page->relatedpage_id)->findAll();
  
  $module_selected_values = array();
  $records = array();
  if (is_array($pageModules)) {
    foreach($pageModules as $page_module)
    {
      $module = ucwords($page_module['module']);
      $module_data = json_decode($page_module['module_data']);
    
      $view = "sections/$module";

      if(file_exists(APPPATH."Models/$module.php")) {
        $model_path = "App\\Models\\$module";
        $model = new $model_path();  
        
        if (isset($module_data->id))
        {
          if (is_array($module_data->id))
          {
            $model_id = $module_data->id;
            $model->where_in("id",$model_id);
          }
          else
          {
            $model_id = $module_data->id;
            $model->where("id",$model_id);
          }
        }
        if (isset($module_data->count))
        {
          $model->limit($module_data->count);
        }
        if ($view == "sections/blog")
          $model->order_by('publish_at desc');
        if ($view == "sections/profile_slider" || $model->table == "profiles")
          $model->orderBy('sort_order asc, first_name asc, middle_name asc, last_name asc');
        if ($model->table == "partners" || $model->table == "faq_groups" || $model->table == "profiles") {
          $model->where("is_active = 1");
        }
        
        if (isset($module_data->format))
        {
          $format = $module_data->format;
          $view = "sections/".$module."_".$format;
        }
        $records[strtolower($module).'s'] = $model->findAll();
      }
      $records['section_class'] = $page->section_class;
      $records['model_name'] = $model->model;
      $records['module_data'] = $module_data;
      if(file_exists(APPPATH."Views/".strtolower($view).".php")) {
        $replace_text = "[[SECTION:".strtoupper($module)."]]";
        $content = view(strtolower($view), $records);
        $page_content = str_replace($replace_text,$content,$page_content);
      } else {
        $page_content = $module_data->content.$page_content;
      }
    }
  }
  
  return $page_content;
}

function show_page_content($page)
{  
    $page_content = $page->page_content;
    preg_match_all('#\[\[CATEGORY:(.*?)\]\]#', $page_content, $category_matches);
    
    if (count($category_matches) == 2) {
        $categoryModel = new \App\Models\Category();
        $categories_data = $category_matches[1];
        foreach($categories_data as $category_data) {
            $item_data = array();
            $category_details = explode(":",$category_data);
            $category_id = $category_details[0];
            $item_type = $category_details[1];
            $record_limit = 0;
            if ($item_type == 'LATEST' && count($category_details) == 3) {
                $record_limit = $category_details[2];
            } else if (count($category_details) == 3) {
                $columns = explode("-",$category_details[2]);
                if ($columns[0] == 'COL') {
                    $item_data['col'] = $columns[1];
                }
            }
            $categoryDetail = $categoryModel->find($category_id);
            switch($categoryDetail['module'])
            {
                case 'partner':
                    $partnerModel = new \App\Models\Partner();
                    $partners = $partnerModel->where('category_id',$category_id)->where('is_active',1)->orderBy('created_at','desc')->findAll();
                    $item_data['items'] = $partners;
                    break;
                case 'profile':
                    $profileModel = new \App\Models\Profile();
                    $profiles = $profileModel->where('category_id',$category_id)->where('is_active',1)->orderBy('sort_order','desc')->findAll();
                    $item_data['items'] = $profiles;
                    break;
                case 'resource':
                    $resourceModel = new \App\Models\Resource_material();
                    $resources = $resourceModel->where('category_id',$category_id)->where('is_active',1)->orderby('publish_date','desc')->findAll($record_limit);
                    $item_data['items'] = $resources;
                    break;
                case 'video':
                    $videoModel = new \App\Models\Video();
                    $videos = $videoModel->where('category_id',$category_id)->where('is_active',1)->orderBy('created_at','desc')->findAll();
                    $item_data['items'] = $videos;
                    break;
            }
            $view_file = 'blank.php';
            switch($item_type) {
                case 'GRID-WITH-TITLE':
                    $view_file = 'grid-with-title.php';
                    break;
                case 'GRID-WITHOUT-TITLE':
                    $view_file = 'grid-without-title.php';
                    break;
                case 'GRID-WITH-INFO':
                    $view_file = 'grid-with-info.php';
                    break;
                case 'VIDEO-GALLERY':
                    $view_file = 'video-gallery.php';
                    break;
                case 'OWL-CAROUSEL':
                    if ($categoryDetail['module'] == 'resource') {
                        $view_file = 'resource-owlcarousel.php';
                    } else {
                        $view_file = 'owlcarousel.php';
                    }
                    $item_data['id'] = 'carousel-owl-'.$category_id;
                    break;
                case 'LATEST':
                    $view_file = 'latest.php';
                    break;
            }
        
            if(file_exists(APPPATH."Views/themes/sampark/multi_sections/".$view_file)) {                
                if ($record_limit > 0) {
                    $replace_text = "[[CATEGORY:".$category_id.":".$item_type.":".$record_limit."]]";
                } else if (count($category_details) == 3) {
                    $columns = explode("-",$category_details[2]);
                    if ($columns[0] == 'COL') {
                        $replace_text = "[[CATEGORY:".$category_id.":".$item_type.":COL-".$columns[1]."]]";
                    } else {
                        $replace_text = "[[CATEGORY:".$category_id.":".$item_type."]]";
                    }
                } else {
                    $replace_text = "[[CATEGORY:".$category_id.":".$item_type."]]";
                }
                $content = view(strtolower('themes/sampark/multi_sections/'.$view_file), $item_data);
                $page_content = str_replace($replace_text,$content,$page_content);
            } else {
                $page_content = $page_content;
            }
        }
    }
        
    $page_modules = new \App\Models\Page_module();
    $pageModules = $page_modules->where('page_id', $page->id)->findAll();
    $module_selected_values = array();
    $records = array();
    if (is_array($pageModules)) {
        foreach($pageModules as $page_module)
        {
          $module = ucwords($page_module['module']);
          $module_data = json_decode($page_module['module_data']);

          $view = "sections/$module";

          if(file_exists(APPPATH."Models/$module.php")) {
            $model_path = "App\\Models\\$module";
            $model = new $model_path();  
            
            if (isset($module_data->id))
            {
              if (is_array($module_data->id))
              {
                $model_id = $module_data->id;
                $model->where_in("id",$model_id);
              }
              else
              {
                $model_id = $module_data->id;
                $model->where("id",$model_id);
              }
            }
            if (isset($module_data->count))
            {
              $model->limit($module_data->count);
            }
            if ($view == "sections/blog")
              $model->order_by('publish_at desc');
            if ($view == "sections/profile_slider" || $model->table == "profiles")
              $model->orderBy('sort_order asc, first_name asc, middle_name asc, last_name asc');
            if ($model->table == "partners" || $model->table == "faq_groups" || $model->table == "profiles") {
              $model->where("is_active = 1");
            }
            
            if (isset($module_data->format))
            {
              $format = $module_data->format;
              $view = "sections/".$module."_".$format;
            }
            $records[strtolower($module).'s'] = $model->findAll();
          }
          
          $records['section_class'] = ''; //$page->section_class;
          $records['module_data'] = $module_data;
          if(file_exists(APPPATH."Views/".strtolower($view).".php")) {
            $replace_text = "[[SECTION:".strtoupper($module)."]]";
            $content = view(strtolower($view), $records);
            $page_content = str_replace($replace_text,$content,$page_content);
          } else {
            $page_content = $module_data->content.$page_content;
          }
        }
    }
    return $page_content;
}

function show_page_content_old($page)
{  
    $page_content = $page->page_content;
    preg_match_all('#\[\[OWL-CAROUSEL:CATEGORY-(.*?)\]\]#', $page_content, $carousel_matches);
    $carousel_categories = $carousel_matches[1];
    
    if (count($carousel_categories) > 0) {
        $categoryModel = new \App\Models\Category();
        foreach($carousel_categories as $carousel_category) {
            $carousel_data = array();
            $carousel_data['id'] = 'carousel-owl-'.$carousel_category;
            $categoryDetail = $categoryModel->find($carousel_category);
            switch($categoryDetail['module'])
            {
                case 'profile':
                    $profileModel = new \App\Models\Profile();
                    $profiles = $profileModel->where('category_id',$carousel_category)->where('is_active',1)->orderBy('sort_order','desc')->findAll();
                    $carousel_data['items'] = $profiles;
                    $view_file = 'owlcarousel.php';
                    break;
                case 'resource':
                    $resourceModel = new \App\Models\Resource_material();
                    $resources = $resourceModel->where('category_id',$carousel_category)->where('is_active',1)->orderby('publish_date','desc')->findAll();
                    $carousel_data['items'] = $resources;
                    $view_file = 'resource-owlcarousel.php';
                    break;
            }
            if(file_exists(APPPATH."Views/themes/sampark/multi_sections/".$view_file)) {
                $replace_text = "[[OWL-CAROUSEL:CATEGORY-".$carousel_category."]]";
                $content = view(strtolower('themes/sampark/multi_sections/'.$view_file), $carousel_data);
                $page_content = str_replace($replace_text,$content,$page_content);
            } else {
                $page_content = $page_content;
            }
        }
    }
    
    preg_match_all('#\[\[VIDEO-GALLERY:CATEGORY-(.*?)\]\]#', $page_content, $video_gallery_matches);
    $video_gallery_categories = $video_gallery_matches[1];
    if (count($video_gallery_categories) > 0) {
        $categoryModel = new \App\Models\Category();
        foreach($video_gallery_categories as $video_gallery_category) {
            $carousel_data = array();
            $video_gallery_data['id'] = 'carousel-owl-'.$video_gallery_category;
            $categoryDetail = $categoryModel->find($video_gallery_category);
            switch($categoryDetail['module'])
            {
                case 'video':
                    $videoModel = new \App\Models\Video();
                    $videos = $videoModel->where('category_id',$video_gallery_category)->where('is_active',1)->orderBy('created_at','desc')->findAll();
                    $video_gallery_data['items'] = $videos;
                    $view_file = 'videogallery.php';
                    break;
            }
            if(file_exists(APPPATH."Views/themes/sampark/multi_sections/".$view_file)) {
                $replace_text = "[[VIDEO-GALLERY:CATEGORY-".$video_gallery_category."]]";
                $content = view(strtolower('themes/sampark/multi_sections/'.$view_file), $video_gallery_data);
                $page_content = str_replace($replace_text,$content,$page_content);
            } else {
                $page_content = $page_content;
            }
        }
    }
    
    preg_match_all('#\[\[LATEST:CATEGORY-(.*?)\]\]#', $page_content, $latest_matches);
    $latest_categories = $latest_matches[1];
    if (count($latest_categories) > 0) {
        $categoryModel = new \App\Models\Category();
        foreach($latest_categories as $latest_category) {
            $carousel_data = array();
            $latest_category_details = explode(":",$latest_category);
            $latest_category_id = $latest_category_details[0];
            $latest_count = $latest_category_details[1];
            $latest_data['id'] = 'carousel-owl-'.$latest_category;
            $categoryDetail = $categoryModel->find($latest_category_id);
            switch($categoryDetail['module'])
            {
                case 'resource':
                    $resourceModel = new \App\Models\Resource_material();
                    $resources = $resourceModel->where('category_id',$latest_category)->where('is_active',1)->orderBy('created_at','desc')->findAll($latest_count);
                    $latest_data['items'] = $resources;
                    $view_file = 'latest.php';
                    break;
            }
            if(file_exists(APPPATH."Views/themes/sampark/multi_sections/".$view_file)) {
                $replace_text = "[[LATEST:CATEGORY-".$latest_category."]]";
                $content = view(strtolower('themes/sampark/multi_sections/'.$view_file), $latest_data);
                $page_content = str_replace($replace_text,$content,$page_content);
            } else {
                $page_content = $page_content;
            }
        }
    }
    
    $page_modules = new \App\Models\Page_module();
    $pageModules = $page_modules->where('page_id', $page->id)->findAll();
    $module_selected_values = array();
    $records = array();
    if (is_array($pageModules)) {
        foreach($pageModules as $page_module)
        {
          $module = ucwords($page_module['module']);
          $module_data = json_decode($page_module['module_data']);

          $view = "sections/$module";

          if(file_exists(APPPATH."Models/$module.php")) {
            $model_path = "App\\Models\\$module";
            $model = new $model_path();  
            
            if (isset($module_data->id))
            {
              if (is_array($module_data->id))
              {
                $model_id = $module_data->id;
                $model->where_in("id",$model_id);
              }
              else
              {
                $model_id = $module_data->id;
                $model->where("id",$model_id);
              }
            }
            if (isset($module_data->count))
            {
              $model->limit($module_data->count);
            }
            if ($view == "sections/blog")
              $model->order_by('publish_at desc');
            if ($view == "sections/profile_slider" || $model->table == "profiles")
              $model->orderBy('sort_order asc, first_name asc, middle_name asc, last_name asc');
            if ($model->table == "partners" || $model->table == "faq_groups" || $model->table == "profiles") {
              $model->where("is_active = 1");
            }
            
            if (isset($module_data->format))
            {
              $format = $module_data->format;
              $view = "sections/".$module."_".$format;
            }
            $records[strtolower($module).'s'] = $model->findAll();
          }
          
          $records['section_class'] = ''; //$page->section_class;
          $records['module_data'] = $module_data;
          if(file_exists(APPPATH."Views/".strtolower($view).".php")) {
            $replace_text = "[[SECTION:".strtoupper($module)."]]";
            $content = view(strtolower($view), $records);
            $page_content = str_replace($replace_text,$content,$page_content);
          } else {
            $page_content = $module_data->content.$page_content;
          }
        }
    }
    return $page_content;
}

function get_media_element($media_element_id)
{
    $media = new \App\Models\Media_Element();
    $media_element = $media->where("id",$media_element_id)->first();
    return $media_element;
}

function show_image($model_name,$model_object,$image_field_name,$type="",$css_class="",$alt_field="",$width = "auto",$height = "auto")
{
	if($type!="")
	{
		$type=$type.'_';
	}
	  
  if (isset($model_object[$image_field_name]))
  {
    if ($alt_field != "")
      $alt_tag = $model_object[$alt_field];
    else
      $alt_tag = $model_object[$image_field_name];
    if ($model_object[$image_field_name] != '' and file_exists("uploads/".plural($model_name)."/".$model_object['id']."/".$type.$model_object[$image_field_name]))
     return '<img src="'.base_url()."/uploads/".plural($model_name)."/".$model_object['id']."/".$type.$model_object[$image_field_name].'" class="'.$css_class.'" alt="'.$alt_tag.'" width="'.$width.'" height="'.$height.'">';
    else if ($model_object[$image_field_name] != '' and file_exists("uploads/".plural($model_name)."/".$type.$model_object[$image_field_name]))
     return '<img src="'.base_url()."/uploads/".plural($model_name)."/".$type.$model_object[$image_field_name].'" class="'.$css_class.'" alt="'.$alt_tag.'" width="'.$width.'" height="'.$height.'">';
    else if ($model_object[$image_field_name] != '' and file_exists("uploads/".plural($model_name)."/".$model_object[$image_field_name]))
     return '<img src="'.base_url()."/uploads/".plural($model_name)."/".$model_object[$image_field_name].'" class="'.$css_class.'" alt="'.$alt_tag.'" width="'.$width.'" height="'.$height.'">';
    else
     return "2 "."uploads/".plural($model_name)."/".$model_object[$image_field_name];
  }
  else
    return '';
}

function get_image_url($model_name,$model_object,$filename,$width,$height)
{ 
  if (isset($model_object[$filename]))
  {
    if ($model_object[$filename] != '' and file_exists("uploads/".plural($model_name)."/".$model_object['id']."/".$model_object[$filename]))
     return base_url()."/uploads/".plural($model_name)."/".$model_object['id']."/".$model_object[$filename];
    else if ($model_object[$filename] != '' and file_exists("uploads/".plural($model_name)."/".$model_object[$filename]))
     return base_url()."/uploads/".plural($model_name)."/".$model_object[$filename];
    else
     return '';
  }
  else
    return '';
}

function show_common_section($theme, $section_name)
{
    $common_sections = new \App\Models\Common_section();
    $total = $common_sections->where('theme',$theme)->where('section',$section_name)->countAllResults();
    $section_content = '';
    if ($total > 0)
    {
    if ($total > 12)
      $class = 12;
    else
      $class = 12/$total;
    $common_sections = $common_sections->where("theme",$theme)->where('section',$section_name)->get()->getResultArray();
    
    foreach($common_sections as $common_section)
    {
      $widget_detail = array();
      //$widget_detail['customsection'] = $common_section->id;
      //$widget_detail['name'] = $common_section->widget;
      $widget_detail['class'] = $class;
      $widget_detail['data'] = json_decode($common_section['option_value']);
      //array_push($common_section_details[$general_section]['widgets'] , $widget_detail);
      $section_content .= view('widgets/'.$common_section['widget'].'.php',$widget_detail);
    }
    }
    return $section_content;
}

function show_google_site_tag()
{
    $setting = new \App\Models\Setting();
    $setting = $setting->where('setting_name', 'tracking_code')->where('setting_group', 'google_analytics')->first();
    $google_tag_manager_head = "";
    if (isset($setting['id']))
    {
        $google_tag_manager_code = $setting['setting_value'];
        if ($google_tag_manager_code != "")
        {
            $google_tag_manager_head = "<!-- Google Tag Manager -->";
            $google_tag_manager_head .= "<script async src='https://www.googletagmanager.com/gtag/js?id=".$google_tag_manager_code."'> </script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', '".$google_tag_manager_code."'); </script>";
            $google_tag_manager_head .= "<!-- End Google Tag Manager -->";
        }
    }
    return $google_tag_manager_head;
}

function show_google_tag_manager_head()
{
    $setting = new \App\Models\Setting();
    $google_tag_manager_head = "";
    $setting = $setting->where('setting_name', 'tag_manager_code')->where('setting_group', 'google_analytics')->first();
    if (isset($setting['id']))
    {
        $google_tag_manager_code = $setting['setting_value'];
        if ($google_tag_manager_code != "")
        {
            $google_tag_manager_head = "<!-- Google Tag Manager -->";
            $google_tag_manager_head .= "<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','".$google_tag_manager_code."');</script>";
            $google_tag_manager_head .= "<!-- End Google Tag Manager -->";
        }
    }
    return $google_tag_manager_head;
}
 
function show_google_tag_manager_body()
{
    $google_tag_manager_body = "";
    $setting = new \App\Models\Setting();
    $setting = $setting->where('setting_name', 'tag_manager_code')->where('setting_group', 'google_analytics')->first();
    if (isset($setting['id']))
    {
        $google_tag_manager_code = $setting['setting_value'];
        if ($google_tag_manager_code != "")
        {
            $google_tag_manager_body = '<!-- Google Tag Manager (noscript) -->';
            $google_tag_manager_body .= '<noscript><iframe src="https://www.googletagmanager.com/ns.html?id='.$google_tag_manager_code.'" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>';
            $google_tag_manager_body .= '<!-- End Google Tag Manager (noscript) -->';
        }
    }
    return $google_tag_manager_body;
}
 
function show_google_analytics_code()
{
    $google_analytics = "";
    $setting = new \App\Models\Setting();
    $setting = $setting->where('setting_name', 'tracking_code')->where('setting_group', 'google_analytics')->first();
    if (isset($setting['id']))
    {
        $google_analytics_code = $setting['setting_value'];
        if ($google_analytics_code != "")
        {
            $google_analytics = "<script>";
            $google_analytics .= "(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){";
            $google_analytics .= "(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),";
            $google_analytics .= "m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)";
            $google_analytics .= "})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');";
            $google_analytics .= "ga('create', '".$google_analytics_code."', 'auto');";
            $google_analytics .= "ga('send', 'pageview');";
            $google_analytics .= "</script>";
        }
    }
    return $google_analytics;
}
?>