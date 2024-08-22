<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categories extends Migration
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
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'parent_id' => [
                'type' => 'INT',
                'constraint' => '11',
            ],
            'description' => [
                'type' => 'TEXT',
                
            ],
            
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => '200',
            ],
            
            'status' => [
                'type' => 'TINYINT',
                'constraint' => '1',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('categories');
        
        
    }

    public function down()
    {
      $this->forge->dropTable('categories');  

    }
}
