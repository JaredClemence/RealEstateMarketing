<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Webinar;

class WebinarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $webinars = Webinar::factory()->count(3)->create();
    }
}
