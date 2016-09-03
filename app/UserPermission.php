<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    protected $fillable = array( 'module_id', 'department_user_id','permission_id');
	protected $table    = 'user_permissions';
    protected $guarded  = ['_token'];

    public static $rules = [
    	
    	'module_id'  		  =>  'required|exists:modules,id',
    	'department_user_id'  =>  'required|exists:department_users,id',
    	'permission_id'       =>  'required|exists:permissions,id',
    ];

    public function module() 
	{
		return $this->belongsTo('App\Module', 'module_id');
	}
	public function permission() 
	{
		return $this->belongsTo('App\Permission', 'permission_id');
	}

	public function department() 
	{
		return $this->belongsTo('App\DepartmentUser', 'department_user_id');
	}
}
