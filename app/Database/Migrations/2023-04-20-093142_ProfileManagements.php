<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Profiles extends Migration
{
    public function up()
    {
    	 $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'first_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                
            ],
            'middle_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'last_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'email_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'phone_number' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'other_phone_number' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'department' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'designation' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'profile_description' => [
                'type'       => 'TEXT',
                
            ],
            'profile_photo' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
             'is_active' => [
                'type' => 'TINYINT',
                'constraint' => '1', 
                    
            ],
            'created_at' => [
                'type'       => 'TIMESTAMP',
                
            ],
            'updated_at' => [
                'type'       => 'TIMESTAMP',
                
            ],
            
            
         ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('profiles');
        
    }

    public function down()
    {
        $this->forge->dropTable('profiles');
    }
}
