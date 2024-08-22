<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HotelFaqs extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            
            'question' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            
            'answer' => [
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
        $this->forge->createTable('hotel_faqs');
    }

    public function down()
    {
        $this->forge->createTable('hotel_faqs');
    }
}
