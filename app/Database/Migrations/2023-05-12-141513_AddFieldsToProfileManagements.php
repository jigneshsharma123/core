<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldsToProfiles extends Migration
{
    public function up()
    {
        $fields = array(
          'slug' => array(
            'type' => 'VARCHAR',
            'constraint' => 250
          )
        );
        $this->forge->addColumn('profiles', $fields);
    }

    public function down()
    {
        $this->dbforge->dropColumn('profiles', 'slug');
    }
}
