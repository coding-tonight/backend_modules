<?php

namespace Modules\Role\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function User(){
        return $this->belongsToMany('App/Models/User' ,'users_roles');
    }

    // public function permissions(){
    //     return $this->hasMany('App/Models/Permission' ,'')
    // }
}
