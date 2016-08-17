<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = array('name');
	protected $table    = 'locations';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'name' 				=>  'required|unique:departments|max:255'
    ];
}
