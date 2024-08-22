<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HotelRooms extends Migration
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
             'room_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
             'price' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
             'amenities' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'room_image' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'is_active' => [
                'type' => 'TINYINT',
                'constraint' => '1', 
                    
            ],
             'created_at' => [
                'type'       => 'DATETIME',
                
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                
            ],
            
            
         ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('hotel_rooms');
        
    }

    public function down()
    {
        $this->forge->dropTable('hotel_rooms');
    }
}
