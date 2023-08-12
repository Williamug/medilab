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

        $patient_permissions = [
            'view patient module',
            'view patient',
            'add patient',
            'edit patient',
            'delete patient',
        ];

        foreach ($patient_permissions as $permission) {
            DB::table('permissions')->insert([
                'name'       => $permission,
                'guard_name' => 'web',
                'module_id'  => $patient->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
