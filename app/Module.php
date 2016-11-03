<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = array('name');
	protected $table    = 'modules';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'name' 				=>  'required|max:255',
    	
    ];
}
