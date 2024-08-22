<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Service extends Migration
{
    public function up()
    {
      $this->forge->addField([
        'id' => [
            'type'           => 'INT',
            'constraint'     => 11,
            'auto_increment' => true,
        ],
        'parent_id' => [
            'type' => 'INT',
            'constraint' => '11',
        ],
        'name' => [
            'type'       => 'VARCHAR',
            'constraint' => '255',
        ],
        'slug' => [
            'type'       => 'VARCHAR',
            'constraint' => '255',
        ],
        'overview' => [
            'type'       => 'TEXT',
        ],
        'why_us' => [
            'type'       => 'TEXT',
        ],
        'powerful_strategies' => [
            'type'       => 'TEXT',
        ],
        'image' => [
            'type'       => 'VARCHAR',
            'constraint' => '255',
        ],
        'template' => [
            'type'       => 'VARCHAR',
            'constraint' => '255',
        ],
        'sort_order' => [
            'type' => 'INT',
            'constraint' => '11',
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
      $this->forge->createTable('services');   
    }

    public function down()
    {
      $this->forge->dropTable('services');
    }
}
