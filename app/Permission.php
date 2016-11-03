<?php 
namespace App;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
	protected $fillable = array('name', 'display_name', 'description');
	protected $table    = 'permissions';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'name' 				=>  'required|unique:permissions|max:255',
    ];
}
