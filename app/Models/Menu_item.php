<?php

namespace App\Models;

use CodeIgniter\Model;

class Menu_item extends Model
{
    protected $table='menu_items';
  
    protected $primaryKey = 'id';

    protected $allowedFields = ['label', 'slug', 'url','type','module','module_id','sort_order','parent_id','menu_id','is_parent'];

    public function get_menu_items($mid,$pid = 0)
    {
        $array = array('menu_id' => $mid, 'parent_id' => $pid);
        $builder = $this->db->table('menu_items');
        $builder->where($array);
        $builder->orderBy('sort_order', 'asc');
        $query = $builder->get();
        return $query->getResult();
     }
  

    public function get_max_sort_order($mid)
   {
    
    $db = \Config\Database::connect();
  	$builder = $db->table('menu_items');
    $builder->selectMax('sort_order','max_sort_order');
    $builder->Where(array('menu_id'=>$mid));	
    $query = $builder->get();
    return $query->getRowArray();
   }

   public function getMenuItemById($id)
   {
        $array = array('id' => $id);
        $builder = $this->db->table('menu_items');
        $builder->where($array);
        $query = $builder->get();
        return $query->getResult();
    }

   public function getMenuItemBySlug($slug)
   {
        $array = array('slug' => $slug);
        $builder = $this->db->table('menu_items');
        $builder->where($array);
        $query = $builder->get();
        return $query->getResult();
    }

} 
