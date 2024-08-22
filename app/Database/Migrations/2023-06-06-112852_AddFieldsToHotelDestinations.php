<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldsToHotelDestinations extends Migration
{
    public function up()
    {
        $fields = array(
          'banner_image' => array(
            'type' => 'VARCHAR',
            'constraint' => 250
            
          ),
          
          
        );
        $this->forge->addColumn('hotel_destinations', $fields);
    }

    public function down()
    {
        $this->dbforge->dropColumn('hotel_destinations', 'banner_image');
    }
}
