<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rack extends Model
{
    protected $fillable = array('name', 'location_id');
	protected $table    = 'racks';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'name' 				=>  'required|unique:departments|max:255',
    	'location_id' 		=>  'required|exists:locations,id'
    ];
}
