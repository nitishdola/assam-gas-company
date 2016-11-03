<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = array('name', 'vendor_code', 'vendor_address', 'vendor_phone', 'vendor_email', 'vendor_mobile', 'contact_person', 'cost_rating', 'quality_rating', 'delivery_rating', 'latest_po_awarded', 'latest_po_date', 'status', 'remarks', 'created_by');
	protected $table    = 'vendors';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'name' 				=>  'required|max:255', 
    	'vendor_code'  		=>  'required|unique:vendors|max:127',
    	'vendor_address'  	=>  'required|min:5',
        'vendor_phone'      =>  'required',
        'vendor_email'      =>  'email',
        'vendor_mobile'     =>  'required|numeric|digits_between:10,10',
        'contact_person'    =>  'required|min:3',
        'cost_rating'       =>  'required|numeric',
        'quality_rating'    =>  'required|numeric',
        'delivery_rating'   =>  'required|numeric',
        'latest_po_awarded' =>  'min:3',
        'latest_po_date'    =>  'date_format:d-m-Y',
    ];

    public function creator() 
	{
		return $this->belongsTo('App\Admin', 'created_by');
	}
}
