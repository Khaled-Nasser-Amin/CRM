<?php

namespace Database\Factories;

use App\Models\Properties;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertiesFactory extends Factory
{

    protected $model = Properties::class;


    public function definition()
    {
        $type=['For Rent','For Sale'];
        return [
            'name' => $this->faker->name,
            'location' => $this->faker->state,
            'description' => $this->faker->text(50),
            'bedrooms' => $this->faker->numberBetween(3,6),
            'type' => $type[array_rand($type)],
            'price' => $this->faker->numberBetween(100,1000),
            'carParking' => $this->faker->numberBetween(1,8),
            'square' => $this->faker->numberBetween(120,600),
        ];
    }
}
