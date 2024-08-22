<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDatesToPartners extends Migration
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
        $this->forge->addColumn('partners', $fields);
    }

    public function down()
    {
        $this->dbforge->dropColumn('partners', 'created_at');
        $this->dbforge->dropColumn('partners', 'updated_at');
        $this->dbforge->dropColumn('partners', 'deleted_at');
        $this->dbforge->dropColumn('partners', 'created_by');
        $this->dbforge->dropColumn('partners', 'updated_by');
        $this->dbforge->dropColumn('partners', 'deleted_by');
    }
}
