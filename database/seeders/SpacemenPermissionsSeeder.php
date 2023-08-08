<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpacemenPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $spacemen = Module::create([
            'name' => 'Spacemen',
        ]);

        DB::table('permissions')->insert([
            'name'       => 'View spacemen module',
            'guard_name' => 'web',
            'module_id'  => $spacemen->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
