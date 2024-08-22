<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pages extends Migration
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
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'meta_title' => [
                'type' => 'VARCHAR',
                'constraint' => '200',
            ],
            'meta_keyword' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                
            ],
            'meta_description' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                
            ],
            'banner_id' => [
                'type' => 'INT',
                'constraint' => '11',
            ],
            'report' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                
            ],
            'page_content' => [
                'type' => 'MEDIUMTEXT',
                
            ],
            'template' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'status' => [
                'type' => 'TINYINT',
                'constraint' => '1',
            ],
            'banner' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'media_element_id' => [
                'type' => 'INT',
                'constraint' => '255',
            ],
            'home_page' => [
                'type' => 'TINYINT',
                'constraint' => '1',
            ],
            'only_for_page_section' => [
                'type' => 'TINYINT',
                'constraint' => '1',
            ],
            'image_alt_tag' => [
                'type' => 'VARCHAR',
                'constraint' => '200',
            ],
            'banner_class' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
            ],

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pages');
        
        
    }
    public function down()
    {
        $this->forge->dropTable('pages');
    }
}
