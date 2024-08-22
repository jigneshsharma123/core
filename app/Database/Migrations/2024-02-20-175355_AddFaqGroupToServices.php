<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFaqGroupToServices extends Migration
{
    public function up()
    {
        $fields = array(
          'faq_group_id' => array(
            'type' => 'INT',
            'constraint' => 11
          )
        );
        $this->forge->addColumn('services', $fields);
    }

    public function down()
    {
        $this->dbforge->dropColumn('services', 'faq_group_id');
    }
}
