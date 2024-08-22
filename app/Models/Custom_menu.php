<?php

namespace App\Models;

use CodeIgniter\Model;

class Custom_menu extends Model
{
    protected $table='menus';
    protected $primaryKey = 'id';

    protected $allowedFields = ['menu_name', 'banner_id', 'sort_order','position','template','link','target_window','status','parent_id','is_parent'];

  public function get_all_menus($parent = 0, $limit = 0, $offset = 0)
  {

     $db = \Config\Database::connect();
     $array = array('parent_id' => $parent);
     $builder = $db->table('menus');
     
    if ($limit != "" && $limit != "0")
    { 
       $query = $builder->getWhere($array, $limit, $offset);

    }
    else
      {
    	  $query = $builder->getWhere($array);
        return $query->getResult();
       }  
  }

    public function getMenuPositions()
  {
  	 $db = \Config\Database::connect();
  	 $builder = $db->table('menus');
     $builder->select('position');
     $query = $builder->get();
     $row_set = Array();
     if($query->getNumRows() > 0)
     {
      foreach ($query->getResultArray() as $row)
      {
        array_push($row_set, $row['position']);
       }
    }
    return $row_set; //format the array into json data
  }
    
}


?>