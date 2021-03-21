<?php

namespace Database\Factories;

use App\Models\Lead;
use Illuminate\Database\Eloquent\Factories\Factory;

class LeadFactory extends Factory
{

    protected $model = Lead::class;


    public function definition()
    {
        $time=['PM','AM'];
        return [
            'name' => $this->faker->name,
            'firstPhone' => $this->faker->phoneNumber,
            'secondPhone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'stageDate' => $this->faker->dateTime,
            'country' => $this->faker->country,
            'time' => $this->faker->time('H:i').' '.$time[array_rand($time)],
            'comment' => $this->faker->text(20),
            'bestTime' => $this->faker->numberBetween(1,20),
        ];
    }
}
