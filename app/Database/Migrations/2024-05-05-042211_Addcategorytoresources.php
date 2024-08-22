<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Addcategorytoresources extends Migration
{
    public function up()
    {
        $fields = array(
          'category_id' => array(
            'type' => 'INT',
            'constraint' => 11
          ),
        );
        $this->forge->addColumn('resource_materials', $fields);
    }

    public function down()
    {
        $this->dbforge->dropColumn('resource_materials', 'category_id');
    }
}
