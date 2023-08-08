<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accounting = Module::create([
            'name' => 'Accounting',
        ]);

        DB::table('permissions')->insert([
            'name'       => 'View accounting module',
            'guard_name' => 'web',
            'module_id'  => $accounting->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
