<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = array('name', 'section_code', 'department_id', 'created_by');
	protected $table    = 'sections';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'name' 				=>  'required|unique:sections|max:255', 
    	'section_code'  	=>  'required|unique:sections|max:127',
    	'department_id'  	=>  'required|exists:departments,id',
    ];

    public function creator() 
	{
		return $this->belongsTo('App\Admin', 'created_by');
	}

	public function department() 
	{
		return $this->belongsTo('App\Department', 'department_id');
	}
}
