<?php

namespace App\Models;

use CodeIgniter\Model;

class Hotel_Banner_model extends Model
{
    protected $table='hotel_banner';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $allowedFields =
		[
          'title',
          'page',
          'description',
          'link', 
          'link_text',
          'banner_image',
          'is_active',
          'created_at',
          'updated_at'
        ];
}