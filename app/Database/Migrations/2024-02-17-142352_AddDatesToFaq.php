<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDatesToFaq extends Migration
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
        $this->forge->addColumn('faqs', $fields);
    }

    public function down()
    {
        $this->dbforge->dropColumn('faqs', 'created_at');
        $this->dbforge->dropColumn('faqs', 'updated_at');
        $this->dbforge->dropColumn('faqs', 'deleted_at');
        $this->dbforge->dropColumn('faqs', 'created_by');
        $this->dbforge->dropColumn('faqs', 'updated_by');
        $this->dbforge->dropColumn('faqs', 'deleted_by');
    }
}
