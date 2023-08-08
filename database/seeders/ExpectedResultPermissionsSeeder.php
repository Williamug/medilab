<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpectedResultPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $expected_result = Module::create([
            'name' => 'Expected result',
        ]);

        DB::table('permissions')->insert([
            'name'       => 'View expected result module',
            'guard_name' => 'web',
            'module_id'  => $expected_result->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
