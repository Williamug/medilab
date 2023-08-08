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
            ExpectedResultPermissionsSeeder::class,
            TestingResultPermissionsSeeder::class,
            TestServicePermissionsSeeder::class,
            TestRequestPermissionsSeeder::class,
            DashboardPermissionsSeeder::class,
            CategoryPermissionsSeeder::class,
            SpacemenPermissionsSeeder::class,
            AccountPermissionsSeeder::class,
            PatientPermissionsSeeder::class,
            SettingPermissionsSeeder::class,
            RolesSeeder::class,
        ]);
    }
}
