<?php

namespace App\Models;

use CodeIgniter\Model;

class Hotel_Desti_Itinerary_model extends Model
{
    protected $table='hotel_desti_itinerary';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $allowedFields =
		[

          'destination_id', 
          'title',
          'description',
          'itinerary_photo',
          'is_active',
          'created_at',
          'updated_at'
        ];

      public function get_itinerary($destination_id)
     {
      
      $builder = $this->db->table('hotel_desti_itinerary');
      $builder->where('is_active', 1);
      $builder->where('destination_id', $destination_id);
      $query = $builder->get();
      return $results = $query->getResult();

       }   
}