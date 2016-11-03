<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseIndentItemRate extends Model
{
  protected $fillable = array('purchase_indent_item_id', 'vendor_id', 'rate', 'nit', 'rate_type');
  protected $table    = 'purchase_indent_item_rates';
  protected $guarded  = ['_token'];

  public static $rules = [
    'purchase_indent_item_id'	=>  'required|exists:purchase_indent_items,id',
    'vendor_id'               => 'required|exists:vendors,id',
    'rate'                    => 'required',
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
