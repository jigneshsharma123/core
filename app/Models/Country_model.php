<?php

namespace App\Models;

use CodeIgniter\Model;

class Country_model extends Model
{
    protected $table='countries';
    protected $primaryKey = 'id';
    protected $allowedFields    = [
        'country_name'
    ]; 

    public function get_country_by_countryId($id)
   {
        $array = array('id' => $id);
        $builder = $this->db->table('countries');
        $builder->SELECT('country_name');
        $builder->where($array);
        $query = $builder->get();
        //print_r($query->getRow()); die;
        return $query->getRow();
    }

    
}


?>