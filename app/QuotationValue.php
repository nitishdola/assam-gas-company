<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuotationValue extends Model
{
    protected $fillable = array('nit_id', 'vendor_id', 'value', 'status');
    protected $table    = 'quotation_values';
    protected $guarded  = ['_token'];

    public static $rules = [
      'nit_id'	                =>  'required|exists:nits,id',
      'vendor_id'	              =>  'required|exists:vendors,id',
      'value'	                  =>  'required|numeric',
    ];

  public function nit()
  {
    return $this->belongsTo('App\Nit', 'nit_id');
  }

  public function vendor()
  {
    return $this->belongsTo('App\Vendor', 'vendor_id');
  }
}
