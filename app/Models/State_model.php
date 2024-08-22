<?php

namespace App\Models;

use CodeIgniter\Model;

class State_model extends Model
{
    protected $table='states';
    protected $primaryKey = 'id';
    protected $allowedFields    = [
        'state_name', 'country_id'
    ]; 

   public function get_states(){
      $db = \Config\Database::connect(); 
      $query ="SELECT states.*, countries.country_name  AS country  FROM states 
              LEFT JOIN countries ON states.country_id = countries.id ORDER BY states.id";

      $blogDb  = $db->query($query);
      return $blogDb->getResultArray();
   } 
   public function get_states_by_country($id)
   {
        $array = array('country_id' => $id);
        $builder = $this->db->table('states');
        $builder->where($array);
        $query = $builder->get();
        return $query->getResultArray();
    }   

    public function get_states_by_stateId($id)
   {
        $array = array('id' => $id);
        $builder = $this->db->table('states');
        $builder->SELECT('state_name');
        $builder->where($array);
        $query = $builder->get();
        //print_r($query->getRowArray()); die;
        return $query->getRow();
    }   
}


?>
