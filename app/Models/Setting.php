<?php

namespace App\Models;

use CodeIgniter\Model;

class Setting extends Model
{
    protected $table='settings';
    protected $allowedFields =
    [
      'setting_group', 
      'setting_name', 
      'setting_value',
      'auto_load'
    ];    
}


?>