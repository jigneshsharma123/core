<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Events extends Migration
{
    public function up()
    {
         $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'auto_increment' => true,
            ],
            'category' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '255',

                
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                
            ],
            'event_date' => [
                'type' => 'DATETIME',
                
                
            ],
            
            'event_end_date' => [
                'type' => 'DATETIME',
                
            ],
             'venue' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                
            ],
             'speaker' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                
            ],
             'brief' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                
            ],
            'program' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => 'NULL',
                'null'=>true
                
            ],
            'event_description' => [
                'type' => ' MEDIUMTEXT',
                'default' => 'NULL',
                'null'=>true
                
            ],
            'presentation' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
                'default' => 'NULL',
                'null'=>true
                
            ],
            'report' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
                'default' => 'NULL',
                'null'=>true
                
            ],
            
             'status' => [
                'type' => 'TINYINT',
                'constraint' => '1',
                'default' => '1',
                
            ],

            
            
            
            
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('events');
    }

    public function down()
    {
        $this->forge->dropTable('events');
    }
}
