<?php

namespace Database\Factories;

use App\Models\GameSchedulePlayer;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameSchedulePlayerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GameSchedulePlayer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1,50),
            'game_schedule_id' => $this->faker->numberBetween(1,10),
        ];
    }
}
