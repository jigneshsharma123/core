<?php

namespace App\Models;

use CodeIgniter\Model;

class Hotel_Destination_model extends Model
{
    protected $table='hotel_destinations';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';

    protected $allowedFields = ['country_id', 'state_id', 'city','description','video_url','photo' , 'banner_image' ,'is_active','display_on_homepage'];

     public function get_city_by_stateId($id)
   {
        $array = array('id' => $id);
        $builder = $this->db->table('hotel_destinations');
        $builder->where($array);
        $query = $builder->get();
        return $query->getResultArray();
    }  

    public function get_city_by_cityID($id)
   {
        $array = array('id' => $id);
        $builder = $this->db->table('hotel_destinations');
        $builder->SELECT('*');
        $builder->where($array);
        $query = $builder->get();
        //print_r($query->getRow()); die;
        return $query->getRow();
    } 
    public function get_city($q)
    {
        
    $db   = \Config\Database::connect();
    $queryBuilder= $db->table('hotel_destinations');
    $queryBuilder->like('LOWER(city)',strtolower($q));
    $query = $queryBuilder->get();
    $count_all=$queryBuilder->countAll();
    $row_set[]=array();
    if($count_all > 0){
      foreach ($query->getResultArray() as $row){

      $row1['label'] = htmlentities(stripslashes($row['city']));

      $row1['value'] = htmlentities(stripslashes($row['city']));

      $row1['id'] = $row['id'];

      $row_set[] = $row1;

      }
      echo json_encode($row_set); //format the array into json data
    }


    }

     public function get_desti_display_on_homepage()
     {
      
      $builder = $this->db->table('hotel_destinations');
      $builder->where('is_active', 1);
      $builder->where('display_on_homepage', 1);
      $builder->limit(5);
      $query = $builder->get();

     return $results = $query->getResultArray();

       }
    
}


?>