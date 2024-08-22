<?php

namespace App\Models;

use CodeIgniter\Model;

class Hotel_Banner_Image_Model extends Model
{
    protected $table='hotel_banner_image';
    protected $primaryKey = 'id';

    protected $allowedFields = ['banner_id', 'image'];

     public function get_image_by_banner_id($id)
   {
        $array = array('banner_id' => $id);
        $builder = $this->db->table('hotel_banner_image');
        $builder->SELECT('*');
        $builder->where($array);
        $query = $builder->get();
        
        return $query->getResultArray();
    }

 }


?>   