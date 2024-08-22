<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Faqs extends Migration
{
    public function up()
    {
       $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'faq_group_id' => [
                'type'       => 'BIGINT',
                'constraint' => '20',
            ],
            'question' => [
                'type' => 'TEXT',
                
            ],
            'answer' => [
                'type' => 'TEXT',
                
            ],
            'is_active' => [
                'type' => 'TINYINT',
                'constraint' => '1',
                'default' => 1
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('faqs');        
    }

    public function down()
    {
         $this->forge->dropTable('faqs');
    }
}
