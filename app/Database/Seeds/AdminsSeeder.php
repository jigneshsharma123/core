<?php

namespace App\Database\Seeds;
use App\Models\Admin_model;
use CodeIgniter\Database\Seeder;

class AdminsSeeder extends Seeder
{
	protected $admins_data = [
        ['email' => 'admin@matrixnodes.com', 'name' => 'Admin', 'password' => '5f4dcc3b5aa765d61d8327deb882cf99', 'role' => 'superadmin'],
        
    ];

    public function run()
    {
        $this->db->table('admins')->truncate();
        $model = new Admin_model();

        foreach ($this->admins_data as $admin) {
            $model->insert($admin);
        }
    }
}
