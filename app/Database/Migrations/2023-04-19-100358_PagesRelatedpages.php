<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PagesRelatedpages extends Migration
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
                'default' => 'NULL',
                'null' => TRUE,
            ],
            'relatedpage_id' => [
                'type' => 'INT',
                'constraint' => '11',
                'default' => 'NULL',
                'null' => TRUE,
            ],
            'background_color' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
                'default' => 'NULL',
                'null' => TRUE,

                
            ],
            'text_color' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
                'default' => 'NULL',
                'null' => TRUE,

                
            ],
            'heading_color' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
                'default' => 'NULL',
                'null' => TRUE,

                
            ],
             'featured_image_position' => [
                'type' => 'VARCHAR',
                'constraint' => '200',
                'default' => 'NULL',
                'null' => TRUE,

                
            ],
            'sort_order' => [
                'type' => 'INT',
                'constraint' => '11',
                'default' => 'NULL',
                'null' => TRUE,
            ],
             'read_more_link_type' => [
                'type' => "ENUM('none','self','internal','external')",
                     
            ],
            'read_more_link' => [
                'type' => 'VARCHAR',
                'constraint' => '200',
                
            ],
            'section_class' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'default' => 'NULL',
                'null' => TRUE,
                
            ],
            'section_id' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'default' => 'NULL',
                'null' => TRUE,
                
            ],
            'padding_class' => [
                'type' => 'TINYINT',
                'constraint' => '1',
                'default' => '0'
            ],
            'show_title' => [
                'type' => 'TINYINT',
                'constraint' => '1',
                'default' => '0'
                
            ],
            
            
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pages_relatedpages');
    }

    public function down()
    {
         $this->forge->dropTable('pages_relatedpages');
    }
}
