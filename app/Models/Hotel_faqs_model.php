<?php

namespace App\Models;

use CodeIgniter\Model;

class Hotel_faqs_model extends Model
{
    protected $table='hotel_faqs';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $allowedFields =
		[
          'hotel_id',
          'category',
          'question', 
          'answer',
          'is_active',
          'created_at',
          'updated_at'
        ];
}