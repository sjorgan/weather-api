<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model {
	
	protected $table = 'location';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = [
		'name',
	];

	/**
     * Returns the Timeslot Models linked to Location
     *
     * @return mixed
     */
	public function timeslots() {
		return $this->hasMany(Timeslot::class);
	}
}