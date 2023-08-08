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
        $outcome = Module::create([
            'name' => 'Outcome',
        ]);

        $outcome_permissions = [
            'view outcome module',
            'view outcome',
            'add outcome',
            'edit outcome',
            'delete outcome',
        ];

        foreach ($outcome_permissions as $permission) {
            DB::table('permissions')->insert([
                'name'       => $permission,
                'guard_name' => 'web',
                'module_id'  => $outcome->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
