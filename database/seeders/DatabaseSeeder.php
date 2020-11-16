<?php

namespace Database\Seeders;

use App\Models\GameSchedule;
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
            RoleSeeder::class,
            UserSeeder::class,
            FieldSeeder::class,
            GameScheduleSeeder::class,
            GameSchedulePlayerSeeder::class,
        ]);
    }
}
