<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldToProfiles extends Migration
{
    public function up()
    {
        $fields = array(
          'sort_order' => array(
            'type' => 'INT',
            'constraint' => 11
          )
        );
        $this->forge->addColumn('profiles', $fields);
    }

    public function down()
    {
        $this->dbforge->dropColumn('profiles', 'sort_order');
    }
}
