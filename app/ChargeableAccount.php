<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChargeableAccount extends Model
{
    protected $fillable = array('name', 'chargeable_accounting_code', 'department_id', 'section_id', 'created_by');
	protected $table    = 'chargeable_accounts';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'name' 				=>  'required|unique:sections|max:255',
    	'chargeable_accounting_code'	=> 'required|unique:chargeable_accounts|max:255',
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
