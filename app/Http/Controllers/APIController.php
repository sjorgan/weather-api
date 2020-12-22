<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Location;
use Illuminate\Http\Request;

class APIController extends Controller
{

    private $current_time;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->current_time = '2020-12-21 07:30:00';
    }

    /**
     * Get location's current weather
     *
     * @param Request $request
     *
     * @return Response
     */
    public function currentWeather(Request $request) {

        //validate inputed location name
        $validate = Validator::make($request->all(), [
            'city' => 'required|string',
        ]);

        if($validate->fails()) {
            $data = [
                'status' => 'error',
                'message' => $validate->errors()->first(),
            ];
            return response()->json($data, 422);
        }

        $location_name = strtolower($request->input('city'));
        $location = Location::where('name', '=', $location_name)->first();
        //check location exists in DB
        if ($location) {
            //check DB has a current weather timeslot for location
            $current_time =  $this->current_time;
            $timeslot = $location->timeslots()
                ->select('weather_type', 'temperature', 'humidity')
                ->where('timeslot_start', '<=', $current_time)
                ->where('timeslot_end', '>=', $current_time)
                ->first();

            if($timeslot) {
                $data = [
                    'status' => 'success',
                    'payload' => [
                        'weather_type' => $timeslot->weather_type,
                        'temperature' => $timeslot->temperature,
                        'temperature_unit' => $timeslot->temperatureUnit(),
                        'humidity' => $timeslot->humidity,
                    ],
                ];
                return response()->json($data);
            }
            else {
                $data = [
                    'status' => 'error',
                    'message' => "Location's current weather not found",
                ];
                return response()->json($data, 404);
            }
        }
        else {
            $data = [
                'status' => 'error',
                'message' => "Location not found",
            ];
            return response()->json($data, 404);
        }
    }
}
