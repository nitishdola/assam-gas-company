<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class DepartmentUser extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public static $rules = [
        'name'              =>  'required|max:255',
        'username'          =>  'required|unique:department_users|max:255',
        'section_id'        =>  'required|exists:sections,id',
        'department_id'     =>  'required|exists:departments,id',
        //'password'          =>  'required|min:3',
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
        'name', 'username', 'section_id', 'department_id', 'password', 'created_by',
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
