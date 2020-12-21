<?php

namespace Database\Factories;

use App\Models\Webinar;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Property;

class WebinarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Webinar::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $property = Property::factory()->create();
        return [
            'link'=>$this->faker->url,
            'day_of_week'=>$this->faker->dayOfWeek(),
            'time'=>$this->faker->time(),
            'property_id'=>$property->id,
        ];
    }
}
