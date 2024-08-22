<?php

namespace App\Models;

use CodeIgniter\Model;

class Hotel_Room_Model extends Model
{
    protected $table='hotel_rooms';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $allowedFields =
		[

          'hotel_id', 
          'room_name',
           'price',
           'amenities',
          'room_image',
          'is_active',
          'created_at',
          'updated_at'
        ];

      public function get_min_price($hotel_id)
     {
       $builder = $this->db->table('hotel_rooms');
       $builder->selectMin('price');
       $builder->where('hotel_id', $hotel_id);
       $result = $builder->get()->getRow();
       return  $minPrice = $result->price;

       
     } 
      public function get_room_detail($roomIds)
     {
      
      $builder = $this->db->table('hotel_rooms');
      $builder->whereIn('id', $roomIds);
      $query = $builder->get();
      return $results = $query->getResult();

       }     
}