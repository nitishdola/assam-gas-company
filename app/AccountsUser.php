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
