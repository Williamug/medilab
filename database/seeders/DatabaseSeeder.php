<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            DashboardPermissionsSeeder::class,
            CategoryPermissionsSeeder::class,
            TestServicePermissionsSeeder::class,
            SpacemenPermissionsSeeder::class,
            ExpectedResultPermissionsSeeder::class,
            TestRequestPermissionsSeeder::class,
            TestingResultPermissionsSeeder::class,
            AccountPermissionsSeeder::class,
            PatientPermissionsSeeder::class,
            SettingPermissionsSeeder::class,
            RolesSeeder::class,
        ]);
    }
}
