<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSectionIdInRelatedPages extends Migration
{
    public function up()
    {
        $fields = array(
          'section_id' => array(
            'type' => 'VARCHAR',
            'constraint' => 250
          )
        );
        $this->forge->addColumn('pages_relatedpages', $fields);
    }

    public function down()
    {
        $this->dbforge->dropColumn('pages_relatedpages', 'section_id');
    }
}
