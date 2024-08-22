<?php

namespace App\Models;

use CodeIgniter\Model;

class Admin_model extends Model
{
    protected $table='admins';
    protected $allowedFields =
		[

          'email', 
          'password', 
          'name',
          'role'
        ];
    
}


?>