<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldsTohotelBookingDetail extends Migration
{
    public function up()
    {
        $fields = array(
          'no_of_childrens' => array(
            'type' => 'INT',
            'constraint' => 11
            
          ),
          
          
        );
        $this->forge->addColumn('hotel_booking_detail', $fields);
    }

    public function down()
    {
        $this->dbforge->dropColumn('hotel_booking_detail', 'no_of_childrens');
    }
}
