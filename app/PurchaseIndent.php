<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseIndent extends Model
{
    protected $fillable = array('requisition_id', 'purchase_indent_number', 'purchase_indent_date', 'reference_number', 'reference_date', 'budget_head_id', 'created_by', 'created_on', 'checked_by', 'checked_on', 'approval_hod_id', 'approval_hod_date', 'justification_of_the_purchase', 'remarks');
	protected $table    = 'purchase_indents';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'requisition_id' 		=>  'required|exists:requisitions,id',
    	'purchase_indent_number'=>  'required|unique:purchase_indents',
    	'purchase_indent_date' 	=>  'required|date_format:Y-m-d',
    	'reference_number' 		=>  'required|unique:purchase_indents',
    	'reference_date' 		=>  'required|date_format:Y-m-d',
    	'budget_head_id' 		=>  'required|exists:budget_heads,id',
      'store_control_number' 		=>  'required',
    	'created_by' 			=>  'required|exists:department_users,id',
    	'created_on' 			=>  'required|date_format:Y-m-d',
    	'justification_of_the_purchase' 		=>  'required|min:7',
    ];

    public function creator()
	{
		return $this->belongsTo('App\DepartmentUser', 'created_by');
	}

	public function requisition()
	{
		return $this->belongsTo('App\Requisition', 'requisition_id');
	}

	public function budget_head()
	{
		return $this->belongsTo('App\BudgetHead', 'budget_head_id');
	}

	public function checker()
	{
		return $this->belongsTo('App\DepartmentUser', 'checked_by');
	}

	public function approved_by()
	{
		return $this->belongsTo('App\DepartmentUser', 'approval_hod_id');
	}
}
