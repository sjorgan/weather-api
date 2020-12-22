<?php

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
        	['name' => 'vancouver'],
        	['name' => 'victoria'],
        	['name' => 'kelowna'],
        	['name' => 'toronto'],
        	['name' => 'ottawa'],
        ];

        foreach ($locations as $location) {
        	Location::create ($location);
        }
    }
}
