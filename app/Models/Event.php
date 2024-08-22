<?php

namespace App\Models;

use CodeIgniter\Model;

class Event extends Model
{
    protected $table='events';
    protected $primaryKey = 'id';
    protected $allowedFields = [

             'category' ,
             'title',
             'slug',
             'event_date',
             'event_end_date',
             'venue',
             'speaker',
             'brief',
             'program',
             'event_description',
             'presentation',
             'report',
             'status'


             ];
    
}


?>