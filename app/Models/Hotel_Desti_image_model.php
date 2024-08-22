<?php

namespace App\Models;

use CodeIgniter\Model;

class Hotel_Desti_image_model extends Model
{
    protected $table='hotel_desti_image';
    protected $primaryKey = 'id';

    protected $allowedFields = ['destination_id', 'image'];

    public function get_image_by_destination_id($id)
   {
        $array = array('destination_id' => $id);
        $builder = $this->db->table('hotel_desti_image');
        $builder->SELECT('*');
        $builder->where($array);
        $query = $builder->get();
        //print_r($query->getRow()); die;
        return $query->getResultArray();
    }
    
}


?>
