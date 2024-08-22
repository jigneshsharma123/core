<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Settings extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'setting_group' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'setting_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'setting_value' => [
                'type'       => 'LONGTEXT',
                
            ],
            'auto_load' => [
                'type' => 'TINYINT',
                'constraint' => '1',
                'default' => '1',
                
            ],
            
            
            
            
         ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('settings'); 
    }

    public function down()
    {
        $this->forge->dropTable('settings');
    }
}
