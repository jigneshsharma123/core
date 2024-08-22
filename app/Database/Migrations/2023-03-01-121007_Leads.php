<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Leads extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'salutation' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
            'first_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
            'last_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
            'mobile' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
            'website' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
            'do_not_call' => [
                'type'       => 'VARCHAR',
                'constraint' => '1',
                'null'=>true,
                'default' => 'NULL',
            ],
            'account_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
            'tags' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
            'primary_address_street' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
            'alt_address_street' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
            'primary_address_city' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
            'alt_address_city' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'=>true,
                'default' => 'NULL',
            ],
            'primary_address_state' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'=>true,
                'default' => 'NULL',
            ],
            'alt_address_state' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'=>true,
                'default' => 'NULL',
            ],
            'primary_address_postal_code' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'=>true,
                'default' => 'NULL',
            ],
            'alt_address_postal_code' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'=>true,
                'default' => 'NULL',
            ],
            'primary_address_country' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'=>true,
                'default' => 'NULL',
            ],
            'alt_address_country' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'=>true,
                'default' => 'NULL',
            ],
            'department' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'=>true,
                'default' => 'NULL',
            ],
            'office_phone' => [
                'type'       => 'VARCHAR',
                'constraint' => '11',
                'null'=>true,
                'default' => 'NULL',
            ],
            'custom_form_id' => [
                'type'       => 'INT',
                'constraint' => '11',
                'null'=>true,
                'default' => 'NULL',
            ],
            'fax' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
            'twitter_account' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
            'description' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
            'lead_status' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
            'status_description' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
            'lead_source' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
            'lead_source_description' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
            'assigned_to' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
            'opportunity_amount' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
            'last_contact' => [
                'type'       => 'DATETIME',
                'null'=>true,
                'default' => 'NULL',
            ],
            'contacted_by' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
             'last_in' => [
                'type'       => 'DATETIME',
                'null'=>true,
                'default' => 'NULL',
            ],
             'last_out' => [
                'type'       => 'DATETIME',
                'null'=>true,
                'default' => 'NULL',
            ],
            'education' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
            'education_additional' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
            'previous_jobs' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
             'company_size' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
            'industry' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
             'company_location' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
            'company_description' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
            'year_founded' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
            'industry_tags' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
            'naics_code' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
            'sic_code' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
             'fy_end' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
             'annual_rev' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
             'facebook_link' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
             'twitter_link' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
            'company_facebook' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
            'company_twitter' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true,
                'default' => 'NULL',
            ],
            'date_created' => [
                'type'       => 'DATETIME',
                'null'=>true,
                'default' => 'NULL',
            ],
            'created_by_id' => [
                'type'       => 'INT',
                'constraint' => '11',
                'null'=>true,
                'default' => 'NULL',
            ],
             'date_modified' => [
                'type'       => 'DATETIME',
                'null'=>true,
                'default' => 'NULL',
            ],
            'modified_by_id' => [
                'type'       => 'INT',
                'constraint' => '11',
                'null'=>true,
                'default' => 'NULL',
            ],


            ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable(' leads');
    }

    public function down()
    {
        $this->forge->dropTable('leads');
    }
}
