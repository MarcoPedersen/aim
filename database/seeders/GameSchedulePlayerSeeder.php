<?php

namespace Database\Seeders;

use App\Models\GameSchedulePlayer;
use Illuminate\Database\Seeder;

class GameSchedulePlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GameSchedulePlayer::factory()
            ->times(10)
            ->create();
    }
}
