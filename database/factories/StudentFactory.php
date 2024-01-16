<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'birthday' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'city_id' => DB::table('cities')->inRandomOrder()->first()->id,
        ];
    }
}