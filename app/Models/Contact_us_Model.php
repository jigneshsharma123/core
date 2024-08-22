<?php

namespace App\Models;

use CodeIgniter\Model;

class Contact_us_Model extends Model
{
    protected $table='contact_us';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';

    protected $allowedFields = ['name', 'email','subject', 'phone', 'message'];
    
}


?>