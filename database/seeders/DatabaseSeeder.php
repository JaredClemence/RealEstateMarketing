<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\PropertySeeder;
use Database\Seeders\WebinarSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PropertySeeder::class);
        $this->call(WebinarSeeder::class);
        
    }
}
