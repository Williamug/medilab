<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = Module::create([
            'name' => 'Category',
        ]);

        DB::table('permissions')->insert([
            'name'       => 'View category module',
            'guard_name' => 'web',
            'module_id'  => $category->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
