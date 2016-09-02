<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = array('name', 'location_id');
	protected $table    = 'permissions';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'name' 				=>  'required|max:255',
    
    ];
}
