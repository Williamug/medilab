<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $patient = Module::create([
            'name' => 'Patient',
        ]);

        DB::table('permissions')->insert([
            'name'       => 'View patient module',
            'guard_name' => 'web',
            'module_id'  => $patient->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
