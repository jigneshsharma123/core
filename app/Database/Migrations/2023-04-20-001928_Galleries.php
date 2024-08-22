<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Galleries extends Migration
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
                'constraint' => '255',
            ],
            'status' => [
                'type' => 'TINYINT',
                'constraint' => '1',
                'default' => '0',
                'null'=>true
            ],
            
         ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('galleries');   
    }

    public function down()
    {
        $this->forge->dropTable('galleries');
    }
}
