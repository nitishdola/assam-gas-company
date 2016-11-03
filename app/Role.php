<?php 
namespace App;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
	protected $fillable = array('name', 'display_name', 'description');
	protected $table    = 'roles';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'name' 				=>  'required|unique:roles|max:255',
    ];
}
