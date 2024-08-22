<?php 

namespace App\Libraries;

class Common_Functions 
{ 
	function __construct()
	{  
		//$this->ci = get_instance();
	}

	public function create_unique_slug($string,$module,$field='slug',$key=NULL,$value=NULL)
  {  
    $classname= "\App\Models".'\\'.$module;
    $model = new $classname;
    $slug = url_title($string,"-");
    $slug = strtolower($slug);
    $i = 1;
    $params = array ();
    $params[$field] = $slug;

    if($key)$params["$key !="] = $value;

    while ($blogs=$model->where('slug', $slug)->countAllResults())
    {  
        if (!preg_match ('/-{1}[0-9]+$/', $slug ))
            $slug .= '-' . ++$i;
        else
            $slug = preg_replace ('/[0-9]+$/', ++$i, $slug );
         
        $params [$field] = $slug;
    }  
    return $slug;  
  }

  public function upload_folder(){
        $year_folder = "uploads/".date("Y");
        if (!file_exists($year_folder))
    {
            mkdir($year_folder);
      chmod($year_folder,0777);
        }   
            
        $month_folder = $year_folder."/".date("m");
        if (!file_exists($month_folder))
    {
            mkdir($month_folder);
      chmod($month_folder,0777);
        }   
        $day_folder = $month_folder."/".date("d");
        if (!file_exists($day_folder))
    {
            mkdir($day_folder);
      chmod($day_folder,0777);
        }   
        return $day_folder;
    }


 }	

?>