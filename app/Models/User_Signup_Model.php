<?php

namespace App\Models;

use CodeIgniter\Model;

class User_Signup_Model extends Model
{
    protected $table='user_signup';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $allowedFields =
		[
          'user_name',
          'user_name',
          'email',
          'password', 
          'is_active',
          'created_at',
          'updated_at'
        ];
}