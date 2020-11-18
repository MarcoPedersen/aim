<?php

namespace Database\Factories;

use App\Models\Field;
use Illuminate\Database\Eloquent\Factories\Factory;

class FieldFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Field::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'location' => $this->faker->address,
            'rules' => $this->faker->text,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'website' => $this->faker->companyEmail,
        ];
    }
}
