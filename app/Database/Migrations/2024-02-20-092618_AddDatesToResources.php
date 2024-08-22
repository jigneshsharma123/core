<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDatesToResources extends Migration
{
    public function up()
    {
        $fields = array(
          'created_at' => array(
            'type' => 'DATETIME',
          ),
          'updated_at' => array(
            'type' => 'DATETIME',
          ),
          'deleted_at' => array(
            'type' => 'DATETIME',
          ),
          'created_by' => array(
            'type' => 'INT',
            'constraint' => 11
          ),
          'updated_by' => array(
            'type' => 'INT',
            'constraint' => 11
          ),
          'deleted_by' => array(
            'type' => 'INT',
            'constraint' => 11
          ),
        );
        $this->forge->addColumn('resource_materials', $fields);
    }

    public function down()
    {
        $this->dbforge->dropColumn('resource_materials', 'created_at');
        $this->dbforge->dropColumn('resource_materials', 'updated_at');
        $this->dbforge->dropColumn('resource_materials', 'deleted_at');
        $this->dbforge->dropColumn('resource_materials', 'created_by');
        $this->dbforge->dropColumn('resource_materials', 'updated_by');
        $this->dbforge->dropColumn('resource_materials', 'deleted_by');
    }
}
