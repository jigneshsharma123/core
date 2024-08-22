<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PageModules extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'page_id' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'module' => [
                'type' => 'VARCHAR',
                'constraint' => '200',
            ],
            'module_data' => [
                'type' => 'LONGTEXT',
                
            ],
            
            
            
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('page_modules');
    }

    public function down()
    {
        $this->forge->dropTable('page_modules');
    }
}
