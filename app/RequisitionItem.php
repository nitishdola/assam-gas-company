<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequisitionItem extends Model
{
    protected $fillable = array('id','requisition_id', 'item_measurement_id', 'store_description', 'measurement_unit_id', 'quantity_demanded', 'rate');
	protected $table    = 'requisition_items';
    protected $guarded  = ['_token'];

    public static $rules = [
    	//'requisition_id' 		=>  'required|exists:requisitions,id',
    	'item_measurement_id' 	=>  'required|exists:item_measurements,id',
    	'store_description' 	=>  'required',
    	'measurement_unit_id' 	=>  'required|exists:measurement_units,id',
    	'quantity_demanded' 	=>  'required|numeric',
    	'rate' 					=>  'required|numeric',

    ];

    
    public function measurement_unit() 
    {
        return $this->belongsTo('App\MeasurementUnit', 'measurement_unit_id');
    }
    public function measurement_item() 
    {
        return $this->belongsTo('App\ItemMeasurement', 'item_measurement_id');
    }
}
