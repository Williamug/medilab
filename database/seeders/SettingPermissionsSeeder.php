<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = Module::create([
            'name' => 'Settings',
        ]);

        DB::table('permissions')->insert([
            'name'       => 'View settings module',
            'guard_name' => 'web',
            'module_id'  => $settings->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
