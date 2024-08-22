<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSortOrderToFaq extends Migration
{
    public function up()
    {
        $fields = array(
          'sort_order' => array(
            'type' => 'INT',
            'constraint' => 11
          )
        );
        $this->forge->addColumn('faqs', $fields);
    }

    public function down()
    {
        $this->dbforge->dropColumn('faqs', 'sort_order');
    }
}
