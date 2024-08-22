<?php

namespace App\Models;

use CodeIgniter\Model;

class Hotel_Booking_model extends Model
{
    protected $table='hotel_booking_detail';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';

    protected $allowedFields = ['first_name', 'last_name', 'email','phone_no','address','country_id','city','hotel_id','check_in','check_out','room_type_id','no_of_rooms','per_room_price','no_of_adults', 'no_of_childrens','stay','sub_total','taxes_and_fees','total_price'];
    
}


?>