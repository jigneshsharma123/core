<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HotelDestinationImage extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            
            'destination_id' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            
            
            
         ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('hotel_desti_image');
    }

    public function down()
    {
        $this->forge->dropTable('hotel_desti_image');
    }
}
