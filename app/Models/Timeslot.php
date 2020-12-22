<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model {
	
	protected $table = 'timeslot';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = [
		'location_id', 'timeslot_start', 'timeslot_end', 'weather_type', 'temperature', 'humidity',
	];

	//Unit of measurment for temperatures
	private $temperature_unit;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(array $attributes = array()) {
    	parent::__construct($attributes);
        $this->temperature_unit = config('app.weather_temperature_unit');
    }

    /**
     * Returns the unit of measurement being used for temperature values
     *
     * @return string
     */
	public function temperatureUnit() {
		return $this->temperature_unit;
	}
}