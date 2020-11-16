<?php

namespace Database\Seeders;

use App\Models\GameSchedule;
use Illuminate\Database\Seeder;

class GameScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GameSchedule::factory()
            ->times(10)
            ->create();
    }
}
