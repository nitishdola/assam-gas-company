<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    public  $timestamps = false;
    protected $fillable = array('permission_id','role_id',);
	protected $table    = 'permission_role';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'role_id'             =>  'required|exists:roles,id',
    	'permission_id'       =>  'required|exists:permissions,id',
    ];

    public function role() 
	{
		return $this->belongsTo('App\Role', 'role_id');
	}
	public function permission() 
	{
		return $this->belongsTo('App\Permission', 'permission_id');
	}


}
