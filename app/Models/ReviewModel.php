<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $table='hotel_reviews';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $allowedFields = [

             'name' ,
             'hotel_id',
             'destination_id',
             'email',
             'message',
             'service_rating',
             'location_rating',
             'value_for_money_rating',
             'cleanliness_rating',
             'facilities_rating',
             'avg_rating',
             'created_at',
             'updated_at'


             ];

   public function get_review_for_homepage()
     {
      
      $builder = $this->db->table('hotel_reviews');
      $builder->limit(10);
      $query = $builder->get();

     return $results = $query->getResult();

       }          
    
}


?>