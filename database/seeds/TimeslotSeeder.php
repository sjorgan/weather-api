<?php

use Illuminate\Database\Seeder;
use App\Models\Timeslot;

class TimeslotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $timeslots = [
        	[
        		'location_id' => 1,
        		'timeslot_start' => '2020-12-21 07:00:00',
        		'timeslot_end' => '2020-12-21 08:00:00',
        		'weather_type' => 'sun',
        		'temperature' => 12.5,
        		'humidity' => 20,
        	],
        	[
        		'location_id' => 2,
        		'timeslot_start' => '2020-12-21 07:00:00',
        		'timeslot_end' => '2020-12-21 08:00:00',
        		'weather_type' => 'rain',
        		'temperature' => 10.2,
        		'humidity' => 40,
        	],
        	[
        		'location_id' => 3,
        		'timeslot_start' => '2020-12-21 07:00:00',
        		'timeslot_end' => '2020-12-21 08:00:00',
        		'weather_type' => 'cloud',
        		'temperature' => 8.0,
        		'humidity' => 30,
        	],
        	[
        		'location_id' => 4,
        		'timeslot_start' => '2020-12-21 07:00:00',
        		'timeslot_end' => '2020-12-21 08:00:00',
        		'weather_type' => 'sun',
        		'temperature' => -2.5,
        		'humidity' => 12,
        	],
        	[
        		'location_id' => 5,
        		'timeslot_start' => '2020-12-21 07:00:00',
        		'timeslot_end' => '2020-12-21 08:00:00',
        		'weather_type' => 'snow',
        		'temperature' => -5,
        		'humidity' => 3,
        	],
        ];

        foreach ($timeslots as $timeslot) {
        	Timeslot::create ($timeslot);
        }
    }
}
