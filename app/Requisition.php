<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
    protected $fillable = array('department_id', 'requisition_number', 'job_number', 'name_of_work', 'chargeable_account_id', 'financial_year');
	protected $table    = 'requisitions';
    protected $guarded  = ['_token'];

    public static $rules = [
    	//'department_id' 		=>  'required|exists:departments,id',
    	'requisition_number' 	=>  'required',
    	'job_number' 			=>  'required',
    	'name_of_work' 			=>  'required',
    	'chargeable_account_id' =>  'required|exists:chargeable_accounts,id',
    	'financial_year' 		=>  'required|min:7',
    ];
}
