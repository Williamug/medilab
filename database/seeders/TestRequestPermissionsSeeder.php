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

        $test_request_permission = [
            'view test request module',
            'view test request',
            'add test request',
            'edit test request',
            'delete test request',
        ];

        foreach ($test_request_permission as $permission) {
            DB::table('permissions')->insert([
                'name'       => $permission,
                'guard_name' => 'web',
                'module_id'  => $test_request->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
