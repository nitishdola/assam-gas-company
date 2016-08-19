<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemMeasurement extends Model
{
    protected $fillable = array('item_code', 'barcode', 'item_name', 'item_description', 'part_number', 'manufacturer', 'expiry_date', 'item_group_id', 'item_sub_group_id', 'measurement_unit_id', 'asset_type', 'insured', 'review', 'product_preference', 'minimum_stock_level', 'maximum_stock_level', 'reorder_stock_level', 'abc', 'xyz', 'fsn', 'location_id', 'rack_id', 'bin_number', 'kardex_number', 'store_code', 'latest_rate', 'weighted_average_rate', 'opening_stock', 'wef', 'stock_in_hand', 'status', 'created_by');
	protected $table    = 'item_measurements';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'item_code' 			=>  'required|unique:item_measurements|max:255', 
    	//'barcode'  				=>  'sometimes|unique:item_measurements|max:127',
    	'item_name'  			=>  'required|max:255',
    	'item_description'  	=>  'required|max:500',
    	'part_number'  			=>  'required|max:255',
    	'manufacturer'  		=>  'required|max:255',
    	'expiry_date'  			=>  'required|date_format:d-m-Y|after:today',
    	'item_group_id' 		=>  'required|exists:item_groups,id',
    	'item_sub_group_id' 	=>  'required|exists:item_sub_groups,id',
    	'measurement_unit_id' 	=>  'required|exists:measurement_units,id',
    	'asset_type'  			=>  'required|in:capital,revenue',
    	'insured'  				=>  'required|in:yes,no',
    	'review'  				=>  'required|in:yes,no',
    	'product_preference'  	=>  'required|in:vital,essential,desirable',
    	'minimum_stock_level' 	=>  'required|numeric',
    	'maximum_stock_level' 	=>  'required|numeric',
    	'reorder_stock_level' 	=>  'required|numeric',
    	'abc'  					=>  'required|in:1,0',
    	'xyz'  					=>  'required|in:1,0',
    	'fsn'  					=>  'required|in:1,0',
    	'location_id' 			=>  'required|exists:locations,id',
    	'rack_id' 				=>  'required|exists:racks,id',
    	'bin_number'  			=>  'required|max:255',
    	'kardex_number'  		=>  'required|max:255',
    	'store_code'  			=>  'required|max:255',
    	'latest_rate'  			=>  'required|numeric',
    	'weighted_average_rate' =>  'required|numeric',
    	'opening_stock'  		=>  'required|numeric',
    	'expiry_date'  			=>  'required|date_format:d-m-Y',
    	'stock_in_hand'  		=>  'required|numeric',
    ];

    public function creator() 
	{
		return $this->belongsTo('App\DepartmentUser', 'created_by');
	}

	public function item_group() 
	{
		return $this->belongsTo('App\ItemGroup', 'item_group_id');
	}

	public function item_sub_group() 
	{
		return $this->belongsTo('App\ItemSubGroup', 'item_sub_group_id');
	}

	public function measurement_unit() 
	{
		return $this->belongsTo('App\MeasurementUnit', 'measurement_unit_id');
	}

	public function location_id() 
	{
		return $this->belongsTo('App\Location', 'location_id');
	}

	public function rack_id() 
	{
		return $this->belongsTo('App\Rack', 'rack_id');
	}
}
