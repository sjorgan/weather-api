<?php

namespace App;

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

	public function timeslots() {
		return $this->hasMany(Timeslot::class);
	}
}