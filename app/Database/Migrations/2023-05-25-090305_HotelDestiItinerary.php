<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HotelDestiItinerary extends Migration
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
            
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'itinerary_photo' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'description' => [
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
        $this->forge->createTable('hotel_desti_itinerary');
        
    }

    public function down()
    {
        $this->forge->createTable('hotel_desti_itinerary');
    }
}
