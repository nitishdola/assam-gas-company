<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemGroup extends Model
{
    protected $fillable = array('name', 'item_group_code', 'created_by', 'remarks');
	protected $table    = 'item_groups';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'name' 				=>  'required|unique:item_groups|max:255', 
    	'item_group_code'  	=>  'required|unique:item_groups|max:127',
    ];

    public function creator() 
	{
		return $this->belongsTo('App\Admin', 'created_by');
	}
}
