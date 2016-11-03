<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BudgetHead extends Model
{
    protected $fillable = array('name', 'budget_head_code', 'department_id', 'section_id', 'created_by');
	  protected $table    = 'budget_heads';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'name' 				=>  'required|unique:sections|max:255',
    	'budget_head_code'	=> 	'required|unique:budget_heads|max:255',
    	'section_id'  		=>  'required|exists:sections,id',
    	'department_id'  	=>  'required|exists:departments,id',
    ];

  public function creator()
	{
		return $this->belongsTo('App\AccountsUser', 'created_by');
	}

	public function department()
	{
		return $this->belongsTo('App\Department', 'department_id');
	}

	public function section()
	{
		return $this->belongsTo('App\Section', 'section_id');
	}
}
