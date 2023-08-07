<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DashboardPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dashboard = Module::create([
            'name' => 'Dashboard',
        ]);

        DB::table('permissions')->insert([
            'name'       => 'View dashboard module',
            'guard_name' => 'web',
            'module_id'  => $dashboard->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
