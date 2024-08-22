<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDatesToProfiles extends Migration
{
    public function up()
    {
        $fields = array(
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
        $this->forge->addColumn('profiles', $fields);
    }

    public function down()
    {
        $this->dbforge->dropColumn('profiles', 'deleted_at');
        $this->dbforge->dropColumn('profiles', 'created_by');
        $this->dbforge->dropColumn('profiles', 'updated_by');
        $this->dbforge->dropColumn('profiles', 'deleted_by');
    }
}
