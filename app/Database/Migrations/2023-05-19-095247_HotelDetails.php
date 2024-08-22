<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HotelDetails extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'hotel_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'hotel_type' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'extra_people' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'minimum_stay' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'cancellation' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'available_room' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'security_deposite' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'country_id' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'state_id' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'city_id' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'neighborhood' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'hotel_amenities' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'description' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'hotel_photo' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'popular_hotel' => [
                'type' => 'TINYINT',
                'constraint' => '1', 
                    
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
        $this->forge->createTable('hotel_details');
    }

    public function down()
    {
        $this->forge->dropTable('hotel_details');
    }
}
