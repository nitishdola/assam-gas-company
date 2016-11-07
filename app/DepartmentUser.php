<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
class DepartmentUser extends Authenticatable
{
    use EntrustUserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public static $rules = [
        'name'              =>  'required|max:255',
        'username'          =>  'required|unique:department_users|max:255',
        'department_id'     =>  'required|exists:departments,id',
        'designation_id'    =>  'required|exists:designations,id',
        //'is_hod'            =>  'required|in:1,0',
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

    public function designation()
    {
        return $this->belongsTo('App\Designation', 'designation_id');
    }

    protected $fillable = [
        'name', 'username','designation_id','is_hod', 'department_id', 'password', 'created_by',
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
