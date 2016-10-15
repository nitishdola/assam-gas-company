<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $fillable = array('name');
	   protected $table    = 'designations';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'name' 				=>  'required|unique:designations|max:255',

    ];
}
