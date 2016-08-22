<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BudgetHeadTransaction extends Model
{
    protected $fillable = array('budget_head_id', 'department_id', 'section_id', 'created_by', 'budget_head_amount', 'budget_head_reserve_amount', 'budget_head_utilized_amount', 'financial_year');
	protected $table    = 'budget_head_transactions';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'budget_head_id'  	=>  'required|exists:budget_heads,id',
    	'section_id'  		=>  'required|exists:sections,id',
    	'department_id'  	=>  'required|exists:departments,id',
    	'budget_head_amount'			=> 'required|numeric',
    	'budget_head_reserve_amount'	=> 'required|numeric',
    	'budget_head_utilized_amount'	=> 'required|numeric',
    ];

    public function creator() 
	{
		return $this->belongsTo('App\AccountsUser', 'created_by');
	}

	public function department() 
	{
		return $this->belongsTo('App\Department', 'department_id');
	}

	public function budget_head() 
	{
		return $this->belongsTo('App\BudgetHead', 'budget_head_id');
	}

	public function section() 
	{
		return $this->belongsTo('App\Section', 'section_id');
	}
}
