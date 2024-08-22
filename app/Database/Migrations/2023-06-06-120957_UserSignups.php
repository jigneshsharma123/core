<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserSignups extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            
            'user_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '250', 
                    
            ],
             'is_active' => [
                'type' => 'TINYINT',
                'constraint' => '1', 
                    
            ],

             'created_at' => [
                'type'       => 'DATETIME',
                
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                
            ],
            
            
            
         ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('user_signup');
    }

    public function down()
    {
        $this->forge->dropTable('user_signup');
    }
}
