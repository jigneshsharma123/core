<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tags extends Migration
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
                'constraint' => '100',
            ],
            
            
         ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tags');   
    }

    public function down()
    {
        $this->forge->dropTable('tags');
    }
}
