<?php

namespace App\Database\Seeds;
use App\Models\Setting;
use CodeIgniter\Database\Seeder;

class SettingsSeeder extends Seeder
{

	protected $setting_data = [
        ['setting_group' => '', 'setting_name' => 'theme', 'setting_value' => 'henagon', 'auto_load' => '1'],
         ['setting_group' => '', 'setting_name' => 'per_page_records', 'setting_value' => '', 'auto_load' => '1'],
        
    ];
    public function run()
    {
    	 $this->db->table('settings')->truncate();
        $model = new Setting();

        foreach ($this->setting_data as $setting) {
            $model->insert($setting);
        }
        
    }
}
