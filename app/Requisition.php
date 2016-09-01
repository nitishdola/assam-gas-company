<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
    protected $fillable = array('department_id', 'requisition_number', 'job_number', 'nature_of_work', 'chargeable_account_id', 'financial_year');
	protected $table    = 'requisitions';
    protected $guarded  = ['_token'];

    public static $rules = [
    	//'department_id' 		=>  'required|exists:departments,id',
    	'requisition_number' 	=>  'required',
    	'job_number' 			=>  'required',
    	'nature_of_work' 		=>  'required',
    	'chargeable_account_id' =>  'required|exists:chargeable_accounts,id',
    	'financial_year' 		=>  'required|min:7',
    ];

    public function department() 
    {
        return $this->belongsTo('App\Department', 'department_id');
    }
     public function department_user() 
    {
        return $this->belongsTo('App\DepartmentUser', 'issued_by');
    }
    public function department_user_hod() 
    {
        return $this->belongsTo('App\DepartmentUser', 'hod');
    }

    public function chargeable_account() 
    {
        return $this->belongsTo('App\ChargeableAccount', 'chargeable_account_id');
    }
}
