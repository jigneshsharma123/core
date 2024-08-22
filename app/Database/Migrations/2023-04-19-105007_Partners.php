<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Partners extends Migration
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
                'constraint' => '255',
            ],
            'info' => [
                'type' => 'TEXT',
                
            ],
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'is_active' => [
                'type' => 'TINYINT',
                'default' => '1'
                
            ],
            
            
            
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('partners');
        
    }

    public function down()
    {
        $this->forge->dropTable('partners');
    }
}
