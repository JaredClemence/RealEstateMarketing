<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory {

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Property::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        return [
            'status' => 'ACTIVE',
            'status_date' => now(),
            'address' => $this->faker->streetAddress,
            'city' => 'Bakersfield',
            'state' => 'CA',
            'zip' => $this->faker->postcode,
            'beds' => rand(2, 5),
            'baths' => rand(1, 3),
            'sqft' => rand(1000, 2500),
            "teaser_prompt" => "Download this eBrochure",
            "teaser_text" => "Thank you for downloading this eBrochure",
            'virtual_tour'=>'https://www.zillow.com/view-3d-home/411161b0-0d23-4f2e-b0e9-8c0b2d679760',
            'virtual_embed'=>''
        ];
    }

}
