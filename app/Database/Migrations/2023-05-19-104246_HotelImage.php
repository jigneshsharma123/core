<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HotelImage extends Migration
{
    public function up()
    {
       $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            
            'hotel_id' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            
            
            
         ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('hotel_image');
    }

    public function down()
    {
        $this->forge->dropTable('hotel_image');
    }
}
