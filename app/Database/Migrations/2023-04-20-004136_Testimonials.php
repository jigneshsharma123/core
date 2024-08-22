<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Testimonials extends Migration
{
    public function up()
    {
         $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'testimonial' => [
                'type'       => 'TEXT',
                
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
             'is_approved' => [
                'type' => 'TINYINT',
                'constraint' => '1', 
                'default' => '0'    
            ],
            'created_at' => [
                'type'       => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP'
            ],
            
            
         ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('testimonials');
    }

    public function down()
    {
        $this->forge->dropTable('testimonials');
    }
}
