<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuotationValue extends Model
{
    protected $fillable = array('purchase_indent_item_id', 'vendor_id', 'value', 'status');
    protected $table    = 'quotation_values';
    protected $guarded  = ['_token'];

    public static $rules = [
      'purchase_indent_item_id'	=>  'required|exists:purchase_indent_items,id',
      'vendor_id'	              =>  'required|exists:vendors,id',
      'value'	                  =>  'required|numeric',
    ];

  public function purchase_indent_item()
  {
    return $this->belongsTo('App\PurchaseIndentItem', 'purchase_indent_item_id');
  }

  public function vendor()
  {
    return $this->belongsTo('App\Vendor', 'vendor_id');
  }
}
