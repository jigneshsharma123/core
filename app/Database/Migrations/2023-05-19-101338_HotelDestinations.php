<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HotelDestinations extends Migration
{
    public function up()
    {
         $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'country_id' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
             'state_id' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
             'city' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
             'description' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'video_url' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'photo' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'is_active' => [
                'type' => 'TINYINT',
                'constraint' => '1', 
                    
            ],
             'display_on_homepage' => [
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
        $this->forge->createTable('hotel_destinations');   
    }

    public function down()
    {
        $this->forge->dropTable('hotel_destinations');
    }
}
