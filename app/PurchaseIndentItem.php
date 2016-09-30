<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseIndentItem extends Model
{
    protected $fillable = array('purchase_indent_id', 'requisition_item_id');
	   protected $table    = 'purchase_indent_items';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'purchase_indent_id' 	=>  'required',
    	'requisition_item_id'	=>  'required',
    ];

    public function purchase_indent()
	{
		return $this->belongsTo('App\PurchaseIndent', 'purchase_indent_id');
	}

	public function requisition_item()
	{
		return $this->belongsTo('App\RequisitionItem', 'requisition_item_id');
	}
}
