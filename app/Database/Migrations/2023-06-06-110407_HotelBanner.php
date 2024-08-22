<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HotelBanner extends Migration
{
    public function up()
    {
    	$this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            
            'page' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'description' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
             'link' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
             'link_text' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
             'banner_image' => [
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
        $this->forge->createTable('hotel_banner');
        
    }

    public function down()
    {
         $this->forge->createTable('hotel_banner');
    }
}
