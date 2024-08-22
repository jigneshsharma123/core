<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BlogTags extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'blog_id' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'tag_id' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            
            
         ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('blog_tags');
    }

    public function down()
    {
       $this->forge->dropTable('blog_tags');
    }
}
