<?php

namespace App\Models;

use CodeIgniter\Model;

class Tag extends Model
{
    protected $table='tags';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name'];
    
}


?>
