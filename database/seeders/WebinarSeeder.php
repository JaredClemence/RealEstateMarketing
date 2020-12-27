<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Webinar;
use App\Models\Property;

class WebinarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $property = Property::first();
        if( $property ){
            $id = $property;
            Webinar::factory()->count(3)->create(['property_id'=>$id]);
        }else{
            $webinars = Webinar::factory()->count(3)->create();
        }
    }
}
