<?php

namespace App\Models;

use CodeIgniter\Model;

class Media_Element extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'media_elements';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['gallery_id','media','thumb','mark_available','is_active'];
     
    
}
