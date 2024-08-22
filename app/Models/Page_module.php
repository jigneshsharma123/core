<?php

namespace App\Models;

use CodeIgniter\Model;

class Page_module extends Model
{
  protected $table='page_modules';
  protected $primaryKey = 'id';
  protected $allowedFields =
  [
    'page_id', 
    'module', 
    'module_data'
  ];
}
?>   
