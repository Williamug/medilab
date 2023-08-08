<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestServicePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $test_service = Module::create([
            'name' => 'Test Service',
        ]);

        $test_service_permissions = [
            'view test service module',
            'view test service',
            'add test service',
            'edit test service',
            'delete test service',
        ];

        foreach ($test_service_permissions as $permission) {
            DB::table('permissions')->insert([
                'name'       => $permission,
                'guard_name' => 'web',
                'module_id'  => $test_service->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
