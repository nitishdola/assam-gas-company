<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemSubGroup extends Model
{
    protected $fillable = array('name', 'item_sub_group_code', 'item_group_id', 'created_by');
	protected $table    = 'item_sub_groups';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'name' 					=>  'required|unique:item_sub_groups|max:255', 
    	'item_sub_group_code'  	=>  'required|unique:item_sub_groups|max:127',
    	'item_group_id'  		=>  'required|exists:item_groups,id',
    ];

    public function creator() 
	{
		return $this->belongsTo('App\Admin', 'created_by');
	}

	public function item_group() 
	{
		return $this->belongsTo('App\ItemGroup', 'item_group_id');
	}
}
