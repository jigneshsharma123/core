<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSecondaryImageToPartner extends Migration
{
    public function up()
    {
      $fields = array(
        'secondary_image' => array(
          'type' => 'VARCHAR',
          'constraint' => 250
        )
      );
      $this->forge->addColumn('partners', $fields);
    }

    public function down()
    {
        $this->dbforge->dropColumn('secondary_image', 'partners');
    }
}
