<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddClassFieldsInBanners extends Migration
{
    public function up()
    {
      $fields = array(
        'banner_class' => array(
          'type' => 'VARCHAR',
          'constraint' => 250
        ),
        'title_class' => array(
          'type' => 'VARCHAR',
          'constraint' => 250
        ),
        'sub_title_class' => array(
          'type' => 'VARCHAR',
          'constraint' => 250
        ),
        'slider_item_tag' => array(
          'type' => 'VARCHAR',
          'constraint' => 250
        ),
        'banner_theme' => array(
          'type' => 'VARCHAR',
          'constraint' => 250
        ),
      );
      $this->forge->addColumn('banners', $fields);
    }

    public function down()
    {
        $this->dbforge->dropColumn('banners', 'banner_theme');
        $this->dbforge->dropColumn('banners', 'banner_class');
        $this->dbforge->dropColumn('banners', 'title_class');
        $this->dbforge->dropColumn('banners', 'sub_title_class');
        $this->dbforge->dropColumn('banners', 'slider_item_tag');
    }
}
