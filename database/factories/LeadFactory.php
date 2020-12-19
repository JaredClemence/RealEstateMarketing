<?php

namespace Database\Factories;

use App\Models\Lead;
use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class LeadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lead::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $property = Property::factory()->create();
        return [
            'property_id'=>$property->id, 
            'name'=>$this->faker->name,
            'email'=>$this->faker->email,
            'phone'=>$this->faker->phoneNumber
        ];
    }
}
