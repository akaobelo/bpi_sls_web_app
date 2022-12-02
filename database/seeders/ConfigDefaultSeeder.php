<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Configuration;

class ConfigDefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Configuration::create([
            'printer_name' => 'Citizen CL-S700CII',
            'bip_config' => 1,
            'sls_config' => 1
        ]);
    }
}
