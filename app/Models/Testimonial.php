<?php

namespace App\Models;

use CodeIgniter\Model;

class Testimonial extends Model
{
    protected $table='testimonials';
    protected $primaryKey = 'id';
    protected $allowedFields = [

             'testimonial' ,
             'name',
             'is_approved',
             'created_at'


             ];
    
}


?>