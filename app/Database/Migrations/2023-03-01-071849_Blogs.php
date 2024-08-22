<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Blogs extends Migration
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
            'category_id' => [
                'type' => 'INT',
                'constraint' => '11',
            ],
            'brief' => [
                'type' => 'TEXT',
                
            ],
            'blog_content' => [
                'type' => 'TEXT',
                
            ],
            'featured_image' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'publish_at' => [
                'type' => 'DATE',
                
            ],
            'author' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'designation' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'is_active' => [
                'type' => 'TINYINT',
                'constraint' => '1',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('blogs');
        
    }

    public function down()
    {
         $this->forge->dropTable('blogs');
    }
}
