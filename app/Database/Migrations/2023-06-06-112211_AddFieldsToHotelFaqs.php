<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldsToHotelFaqs extends Migration
{
    public function up()
    {
    	$fields = array(
          'hotel_id' => array(
            'type' => 'INT',
            'constraint' => 10
            
          ),
          'category' => array(
            'type' => 'VARCHAR',
            'constraint' => 200
            
          ),
          
        );
        $this->forge->addColumn('hotel_faqs', $fields);
        
    }

    public function down()
    {
        $this->dbforge->dropColumn('hotel_faqs', 'hotel_id');
        $this->dbforge->dropColumn('hotel_faqs', 'category');
    }
}
