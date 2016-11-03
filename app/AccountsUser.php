<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class AccountsUser extends Authenticatable
{
   
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public static $rules = [
        'name'              =>  'required|max:255',
        'username'          =>  'required|unique:accounts_users|max:255',
     
    ];
      public function creator() 
    {
        return $this->belongsTo('App\DepartmentUser', 'created_by');
    }

    public function department() 
    {
        return $this->belongsTo('App\Department', 'department_id');
    }

    public function section() 
    {
        return $this->belongsTo('App\Section', 'section_id');
    }

    protected $fillable = [
        'name', 'username', 'password', 'created_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
