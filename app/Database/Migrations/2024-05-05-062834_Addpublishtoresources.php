<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Addpublishtoresources extends Migration
{
    public function up()
    {
        $fields = array(
          'publish_date' => array(
            'type' => 'DATE',
            'NULL' => true,
            'DEFAULT' => NULL
          ),
          'external_link' => array(
            'type' => 'VARCHAR',
            'constraint' => 250,
            'NULL' => true,
            'DEFAULT' => NULL
          ),
        );
        $this->forge->addColumn('resource_materials', $fields);
    }

    public function down()
    {
        $this->dbforge->dropColumn('resource_materials', 'publish_date');
        $this->dbforge->dropColumn('resource_materials', 'external_link');
    }
}
