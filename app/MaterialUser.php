<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class MaterialUser extends Authenticatable
{
   
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public static $rules = [
        'name'              =>  'required|max:255',
        'username'          =>  'required|unique:material_users|max:255',
     
    ];

    public function creator() 
    {
        return $this->belongsTo('App\Admin', 'created_by');
    }

    public function section() 
    {
        return $this->belongsTo('App\Section', 'section_id');
    }

    protected $fillable = [
        'name', 'username', 'section_id', 'password', 'created_by',
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
