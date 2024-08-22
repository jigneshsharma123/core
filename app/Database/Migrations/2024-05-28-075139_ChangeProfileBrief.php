<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ChangeProfileBrief extends Migration
{
    public function up()
    {
        $fields = [
            'practice_areas' => [
                'name' => 'brief',
                'type' => 'TEXT',
                'null' => true,
            ],
        ];
        $this->forge->modifyColumn('profiles', $fields);
    }

    public function down()
    {
        //
    }
}
