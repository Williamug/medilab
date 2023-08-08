<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestingResultPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $test_result = Module::create([
            'name' => 'Test Result',
        ]);

        DB::table('permissions')->insert([
            'name'       => 'View test result module',
            'guard_name' => 'web',
            'module_id'  => $test_result->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
