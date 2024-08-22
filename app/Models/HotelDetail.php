<?php

namespace App\Models;

use CodeIgniter\Model;

class HotelDetail extends Model
{
    protected $table='hotel_details';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $allowedFields =
		[

          'hotel_name',
          'slug', 
          'hotel_type',
          'extra_people',
          'minimum_stay', 
          'cancellation',
          'available_room',
          'security_deposite',
          'country_id',
          'state_id',
          'city_id',
          'neighborhood',
          'hotel_amenities',
          'description',
          'hotel_photo',
          'is_active',
          'popular_hotel',
          'created_at',
          'updated_at'
        ];

   public function get_hotel($hotel_name)
  {
        //$array = array('city_id' => $hotel_name);
        $builder = $this->db->table('hotel_details');
        $builder->where('is_active', 1);
        $builder->like('city_id', $hotel_name);
        $builder->orLike('hotel_name', $hotel_name);
        //$builder->where($array);
        $query = $builder->get();
        return $query->getResult();

    }

    public function get_hotel_by_hotelId($id)
   {
        $array = array('id' => $id,);
        $builder = $this->db->table('hotel_details');
        $builder->SELECT('hotel_name');
        $builder->where($array);
        $query = $builder->get();
        //print_r($query->getRowArray()); die;
        return $query->getRow();
    } 
    public function get_hotel_by_cityId($city_id)
   {
        $array = array('city_id' => $city_id,'is_active'=>'1');
        $builder = $this->db->table('hotel_details');
        $builder->SELECT('*');
        $builder->where($array);
        $query = $builder->get();
        //print_r($query->getRowArray()); die;
        return $query->getResult();
    } 

     public function get_popular_hotel()
     {
      
      $builder = $this->db->table('hotel_details');
      $builder->where('is_active', 1);
      $builder->where('popular_hotel', 1);
      $builder->limit(10);
      $query = $builder->get();

     return $results = $query->getResult();

       }

       
 

 	
}
 ?>   