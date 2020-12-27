<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $text = <<<TEXT
<p>The owner beautifully remodelled this 1982 classic and installed 
                    new flooring throughout the first floor. She changed the awkward flooring 
                    to make travel through the home more convenient, and she modernized the kitchen.</p>
                <p>The 3 bedroom, 2.5 bath home will make a great home for someone. Maybe for you.</p>
                <p>Look for information, photos, and details in your email. Your eBrochure should arrive there shortly.</p>
TEXT;
        $data = [
                'address' => '3312 Bisbee Ct',
                'city' => 'Bakersfield',
                'state' => 'CA',
                'zip' => '93309',
                'beds' => "3",
                'baths' => "2.5",
                'sqft' => "1680",
                "image1" => "image1.jpg",
                "image2" => "image2.jpg",
                "teaser_prompt" => "Do you want to see the inside of this beautifully modernized house?",
                "teaser_text" => $text,
    ];
        $property = Property::firstOrCreate( $data );
    }
}
