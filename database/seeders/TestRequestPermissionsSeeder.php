<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestRequestPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $test_request = Module::create([
            'name' => 'Test Request',
        ]);

        DB::table('permissions')->insert([
            'name'       => 'View test request module',
            'guard_name' => 'web',
            'module_id'  => $test_request->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
