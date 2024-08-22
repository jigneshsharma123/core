<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HotelReviews extends Migration
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
            
            'destination_id' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '250', 
                    
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '250', 
                    
            ],
            'message' => [
                'type' => 'VARCHAR',
                'constraint' => '250', 
                    
            ],
             'service_rating' => [
                'type' => 'INT',
                'constraint' => '11', 
                    
            ],
             'location_rating' => [
                'type' => 'INT',
                'constraint' => '11', 
                    
            ],
            'value_ for_money_rating' => [
                'type' => 'INT',
                'constraint' => '11', 
                    
            ],
            'cleanliness_rating' => [
                'type' => 'INT',
                'constraint' => '11', 
                    
            ],
            'facilities_rating' => [
                'type' => 'INT',
                'constraint' => '11', 
                    
            ],
            'avg_rating' => [
                'type' => 'DECIMAL',
                'constraint' => '8,1', 
                    
            ],
             'created_at' => [
                'type'       => 'DATETIME',
                
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                
            ],
            
            
            
         ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('hotel_reviews');
    }

    public function down()
    {
        $this->forge->createTable('hotel_reviews');
    }
}
