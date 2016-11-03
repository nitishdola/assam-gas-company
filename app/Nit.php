<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nit extends Model
{
  protected $fillable = array('purchase_indent_id', 'nit_number', 'subject', 'description', 'nit_date', 'sale_period_from', 'sale_period_to', 'nit_opening_date', 'nit_closing_date', 'nit_pre_bid_date', 'estimate_cost', 'tender_cost', 'emd_cost', 'currency', 'tender_details', 'tender_type', 'created_by', 'checked_on', 'checked_by', 'approved_on', 'approved_by', 'status');
  protected $table    = 'nits';
  protected $guarded  = ['_token'];

  public static $rules = [
    'purchase_indent_id'=>  'required|exists:purchase_indents,id',
    'nit_number'        =>  'required|unique:nits|max:127',
    'subject'           =>  'required|min:3',
    'description'       =>  'required|min:5',
    'nit_date'          =>  'required|date_format:Y-m-d',
    'sale_period_from'  =>  'required|date_format:Y-m-d H:i:s',
    'sale_period_to'    =>  'required|date_format:Y-m-d H:i:s',
    'nit_opening_date'  =>  'required|date_format:Y-m-d',
    'nit_closing_date'  =>  'required|date_format:Y-m-d',
    'nit_pre_bid_date'  =>  'required|date_format:Y-m-d',
    'estimate_cost'     =>  'numeric|min:0',
    'tender_cost'       =>  'numeric|min:0',
    'emd_cost'          =>  'numeric|min:0',
    'currency'          =>  'required|min:1',
    'tender_details'    =>  'required|min:5',
    'tender_type'       =>  'required|min:1',
    'created_by'        =>  'required|exists:department_users,id',
  ];

  public function creator()
  {
    return $this->belongsTo('App\DepartmentUser', 'created_by');
  }

  public function checker()
  {
    return $this->belongsTo('App\DepartmentUser', 'created_by');
  }

  public function approved_by()
  {
    return $this->belongsTo('App\DepartmentUser', 'created_by');
  }

  public function purchase_indent()
  {
    return $this->belongsTo('App\PurchaseIndent', 'purchase_indent_id');
  }
}
