<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Advantages extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'auto_increment' => true,
            ],
            'faq_group_id' => [
                'type'       => 'BIGINT',
                'constraint' => '20',
            ],
            'title' => [
                'type' => 'TEXT',
                
            ],
            'core_challenges' => [
                'type' => 'TEXT',
                
            ],
            'solutions' => [
                'type' => 'TEXT',
                'default' => 'NULL',
                'null'=>true,
                
            ],
            
            'is_active' => [
                'type' => 'TINYINT',
                'default' => '1'
                
            ],
            
            
            
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('advantages');
        
    }

    public function down()
    {
        $this->forge->dropTable('advantages');
    }
}
