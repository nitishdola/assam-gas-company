<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeasurementUnit extends Model
{
    protected $fillable = array('name', 'measurement_code', 'created_by', 'remarks');
	  protected $table    = 'measurement_units';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'name' 				=>  'required|unique:measurement_units|max:255',
    	'measurement_code'  =>  'required|unique:measurement_units|max:127',
    ];

    public function creator()
	{
		return $this->belongsTo('App\Admin', 'created_by');
	}
}
