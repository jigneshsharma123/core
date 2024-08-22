<?php

namespace App\Models;

use CodeIgniter\Model;

class Hotel_image_model extends Model
{
    protected $table='hotel_image';
    protected $primaryKey = 'id';

    protected $allowedFields = ['hotel_id', 'image'];

    public function get_image_by_hotel_id($id)
   {
        $array = array('hotel_id' => $id);
        $builder = $this->db->table('hotel_image');
        $builder->SELECT('*');
        $builder->where($array);
        $query = $builder->get();
        //print_r($query->getRow()); die;
        return $query->getResultArray();
    }
    
}


?>