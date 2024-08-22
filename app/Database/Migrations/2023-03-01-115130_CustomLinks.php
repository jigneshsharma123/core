<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CustomLinks extends Migration
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
                'constraint' => '200',
            ],
            'brief' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'media_element_id' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'link_type' => [
                'type' => 'ENUM("internal","external")',
                     
            ],
            'link' => [
                'type'       => 'TEXT',
                
            ],
            'media_element_alt_tag' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            
            
         ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('custom_links');
        
    }

    public function down()
    {
        $this->forge->dropTable('custom_links');
    }
}
