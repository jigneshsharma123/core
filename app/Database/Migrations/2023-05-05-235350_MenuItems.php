<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MenuItems extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'label' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                
            ],
            'url' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                
            ],
            'type' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'module' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'module_id' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'sort_order' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'parent_id' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'menu_id' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'is_parent' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            
            
            
            
         ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('menu_items'); 
    }

    public function down()
    {
        $this->forge->dropTable('menu_items');
    }
}
