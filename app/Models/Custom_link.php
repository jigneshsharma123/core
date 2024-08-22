<?php

namespace App\Models;

use CodeIgniter\Model;

class Custom_link extends Model
{
    protected $table='custom_links';
    protected $primaryKey = 'id';
    protected $allowedFields =
		[

         'title', 
          'brief', 
          'media_element_id',
          'link_type',
          'link',
          'media_element_alt_tag'
        ];


 

 	
}
 ?>   