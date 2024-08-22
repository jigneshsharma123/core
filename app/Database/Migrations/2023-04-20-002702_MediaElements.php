<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MediaElements extends Migration
{
    public function up()
    {
         $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'gallery_id' => [
                'type'       => 'INT',
                'constraint' => '11',
                'default' => 'NULL',
                'null' => TRUE,
            ],
            'media' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'default' => 'NULL',
                'null' => TRUE,
            ],
            'thumb' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'default' => 'NULL',
                'null' => TRUE,
            ],
            'mark_available' => [
                'type' => 'TINYINT',
                'constraint' => '1',  
                'default' => 'NULL',
                'null' => TRUE,   
            ],
            'is_active' => [
                'type' => 'TINYINT',
                'constraint' => '1',
                'default' => 'NULL',
                'null' => TRUE,     
            ],
            
         ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('media_elements');   
    }

    public function down()
    {
        $this->forge->dropTable('media_elements');
    }
}
