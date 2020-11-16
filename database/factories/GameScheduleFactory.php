<?php

namespace Database\Factories;

use App\Models\GameSchedule;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameScheduleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GameSchedule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->dateTime,
            'field_id' => $this->faker->numberBetween(1,5),
            'price' => $this->faker->randomNumber(3),
            'limit' => $this->faker->randomNumber(3),
        ];
    }
}
