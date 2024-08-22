<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FaqGroups extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => ' BIGINT',
                'constraint'     => 20,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'is_active' => [
                'type' => 'TINYINT',
                'constraint' => '1',
                'default' => '1'
                
            ],
            
         ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('faq_groups');   
    }

    public function down()
    {
        $this->forge->dropTable('faq_groups');
    }
}
