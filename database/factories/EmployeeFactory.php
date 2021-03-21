<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{

    protected $model = Employee::class;


    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->email,
            'serial' => $this->faker->randomNumber(4),
            'zip' => $this->faker->randomNumber(6),
            'academicStudy' => $this->faker->word,
            'area' => $this->faker->streetName,
            'address' => $this->faker->address,
            'country' => $this->faker->country,
            'city' => $this->faker->city,
            'position' => $this->faker->word,
            'experience' => $this->faker->numberBetween(1,10),
            'documentation' => 'My Resume.pdf',
            'comment' => $this->faker->text(20),
        ];
    }
}
