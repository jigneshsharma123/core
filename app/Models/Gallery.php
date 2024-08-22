<?php

namespace App\Models;

use CodeIgniter\Model;

class Gallery extends Model
{
    protected $table='galleries';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title','status'];
    
}
?>
