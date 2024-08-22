<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Video extends Migration
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
        'video' => [
            'type'       => 'VARCHAR',
            'constraint' => '255',
        ],
        'refer_link' => [
            'type'       => 'VARCHAR',
            'constraint' => '255',
        ],
        'video_desc' => [
            'type'       => 'TEXT',
        ],
        'suggestion' => [
            'type'       => 'TEXT',
        ],
        'image' => [
            'type'       => 'VARCHAR',
            'constraint' => '255',
        ],
        'show_on_home_page' => [
            'type' => 'BOOLEAN'
        ],
        'is_active' => [
            'type' => 'BOOLEAN'
        ],
        'created_at' => [
            'type'       => 'DATETIME',                
        ],
        'updated_at' => [
            'type'       => 'DATETIME',                
        ],
        'deleted_at' => [
            'type'       => 'DATETIME',                
        ],
        'created_by' => [
            'type' => 'INT',
            'constraint' => '11',              
        ],
        'updated_by' => [
            'type' => 'INT',
            'constraint' => '11',
        ],
        'deleted_by' => [
            'type' => 'INT',
            'constraint' => '11',
        ],
      ]);
      $this->forge->addKey('id', true);
      $this->forge->createTable('videos');   
    }

    public function down()
    {
      $this->forge->dropTable('videos');
    }
}
