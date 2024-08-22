<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HotelEnquiry extends Migration
{
    public function up()
    {
         $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            
            'email_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'message' => [
                'type' => 'VARCHAR',
                'constraint' => '250', 
                    
            ],
             'created_at' => [
                'type'       => 'DATETIME',
                
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                
            ],
            
            
            
         ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('hotel_enquiry');
    }

    public function down()
    {
        $this->forge->createTable('hotel_enquiry');
    }
}
