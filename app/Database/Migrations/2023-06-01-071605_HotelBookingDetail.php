<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HotelBookingDetail extends Migration
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
                'constraint' => '200',
            ],
            
            'last_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'phone_no' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'address' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'country_id' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'city' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'hotel_id' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'check_in' => [
                'type'       => 'DATETIME',
                
            ],
             'check_out' => [
                'type'       => 'DATETIME',
                
            ],
            'room_type' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'no_of_rooms' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'per_room_price' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
             'no_of_adults' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
             'stay' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'sub_total' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'taxes_and_fees' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
             'total_price' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
             'created_at' => [
                'type'       => 'DATETIME',
                
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                
            ],

            
            
            
         ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('hotel_booking_detail');
    }

    public function down()
    {
        $this->forge->createTable('hotel_booking_detail');
    }
}
