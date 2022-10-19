<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPassword;
use Illuminate\Support\Facades\Hash;

class MasterKeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MasterPassword::create(['master_key' => Hash::make('admin123')]);
    }
}
