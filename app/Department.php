<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = array('name', 'department_code', 'created_by');
	protected $table    = 'departments';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'name' 				=>  'required|unique:departments|max:255', 
    	'department_code'  	=>  'required|unique:departments|max:127',
    ];

    public function creator() 
	{
		return $this->belongsTo('App\Admin', 'created_by');
	}
}
