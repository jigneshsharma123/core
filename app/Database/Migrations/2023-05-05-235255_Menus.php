<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Menus extends Migration
{
    public function up()
    {
         $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'menu_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'banner_id' => [
                'type'       => 'INT',
                'constraint' => '11',
                'default' => 'NULL',
                'null'=>true
            ],
            'sort_order' => [
                'type'       => 'INT',
                'constraint' => '11',
                
            ],
            'position' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'template' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'link' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'target_window' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'parent_id' => [
                'type' => 'INT',
                'constraint' => '1',
                
                
            ],
            'is_parent' => [
                'type' => 'TINYINT',
                'constraint' => '1',
                'default' => '0',
                
            ],
            
            
            
            
         ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('menus'); 
    }

    public function down()
    {
        $this->forge->dropTable('menus');
    }
}
