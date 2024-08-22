<?php

namespace App\Models;

use CodeIgniter\Model;

class Advantage extends Model
{
    protected $table='advantages';
    protected $primaryKey = 'id';

    protected $allowedFields = ['faq_group_id', 'title', 'core_challenges','solutions','is_active'];
    
}


?>