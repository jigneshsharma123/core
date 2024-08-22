<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Banners extends Migration
{
    public function up()
    {
      $this->forge->addField([
        'id' => [
            'type'           => 'INT',
            'constraint'     => 11,
            'auto_increment' => true,
        ],
        'banner_for' => [
            'type'       => 'VARCHAR',
            'constraint' => '255',
        ],
        'banner_for_id' => [
            'type' => 'INT',
            'constraint' => '11',
        ],
        'banner_position' => [
            'type'       => 'VARCHAR',
            'constraint' => '255',
        ],
        'title' => [
            'type'       => 'VARCHAR',
            'constraint' => '255',
        ],
        'sub_title' => [
            'type'       => 'VARCHAR',
            'constraint' => '255',
        ],
        'button_text' => [
            'type'       => 'VARCHAR',
            'constraint' => '255',
        ],
        'button_link' => [
            'type'       => 'VARCHAR',
            'constraint' => '255',
        ],
        'button_link_target' => [
            'type'       => 'VARCHAR',
            'constraint' => '255',
        ],
        'image' => [
            'type'       => 'VARCHAR',
            'constraint' => '255',
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
      $this->forge->createTable('banners');   
    }

    public function down()
    {
      $this->forge->dropTable('banners');
    }
}
