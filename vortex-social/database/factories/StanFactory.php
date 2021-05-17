<?php

namespace Database\Factories;

use App\Models\Stan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Stan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->userName,
            'phone' => $this->faker->e164PhoneNumber,
            'wa_id' => 99999,
        ];
    }
}
