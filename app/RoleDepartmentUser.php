<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleDepartmentUser extends Model
{
	public  $timestamps = false;
    protected $fillable = array('department_user_id','role_id',);
	protected $table    = 'role_department_user';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'department_user_id' =>  'required|exists:department_users,id',
    	'role_id' 		     =>  'required|exists:roles,id',
    ];

    public function role() 
	{
		return $this->belongsTo('App\Role', 'role_id');
	}
	public function department_users() 
	{
		return $this->belongsTo('App\DepartmentUser', 'department_user_id');
	}


}
