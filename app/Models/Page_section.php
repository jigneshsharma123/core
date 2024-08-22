<?php

namespace App\Models;

use CodeIgniter\Model;

class Page_section extends Model
{
    protected $table='pages_relatedpages';
    protected $primaryKey = 'id';
    protected $allowedFields =
		[
      'page_id', 
      'relatedpage_id', 
      'background_color',
      'text_color',
      'heading_color',
      'featured_image_position',
      'sort_order',
      'read_more_link_type',
      'read_more_link',
      'section_class',
      'section_id',
      'padding_class',
      'show_title'
    ];
 }
 ?>   
