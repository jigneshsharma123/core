<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CustomForms extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],

            'description' => [
                'type' => 'TEXT',
                
            ],
            'css_class' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'custom_css' => [
                'type' => 'VARCHAR',
                'constraint' => '250'
                
            ],
            'by_ajax' => [
                'type' => 'TINYINT',
                'constraint' => '1',
                'default' => '0'
                
            ],
            'successfull_message' => [
                'type' => 'VARCHAR',
                'constraint' => '200'
                
            ],
            'mail_to' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
                
            ],
            'mail_subject' => [
                'type' => 'VARCHAR',
                'constraint' => '200'
                
            ],
            'mail_content' => [
                'type' => 'TEXT',
                
            ],
            'include_form_data_in_mail' => [
                'type' => 'TINYINT',
                'constraint' => '1',
                      
            ],
            'include_captcha' => [
                'type' => 'TINYINT',
                'constraint' => '1',
                'default' => '0'
                
            ],
            'form_class' => [
                'type' => 'VARCHAR',
                'constraint' => '200',
                'default' => 'NULL',
                'null'=>true
                
            ],
            'thankyou_url' => [
                'type' => 'VARCHAR',
                'constraint' => '250'
                
            ],
             'customer_mail_subject' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
                'default' => 'NULL',
                'null'=>true
                
            ],
            'customer_mail_content' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
                'default' => 'NULL',
                'null'=>true
                
            ],
            'include_form_data_in_customer_email' => [
                'type' => 'TINYINT',
                'constraint' => '1',
                'default' => '0'
                
            ],
            'parent_class' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
                'default' => 'NULL',
                'null'=>true
                
            ],
            
            
            
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('custom_forms');
        
    }

    public function down()
    {
        $this->forge->dropTable('custom_forms');
    }
}
