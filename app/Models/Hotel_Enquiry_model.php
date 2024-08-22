<?php

namespace App\Models;

use CodeIgniter\Model;

class Hotel_Enquiry_model extends Model
{
    protected $table='hotel_enquiry';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';

    protected $allowedFields = ['name', 'email_id', 'message'];
    
}


?>