<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rack extends Model
{
    protected $fillable = array('name');
	protected $table    = 'racks';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'name' 				=>  'required|unique:departments|max:255'
    ];
}
