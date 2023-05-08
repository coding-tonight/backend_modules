<?php

namespace Modules\Role\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UsersRole extends Model
{
    use HasFactory;

    protected $fillable = [];

    // public function User(){
    //     return $this->belongsTo('App/Models/User' , 'id' , 'user_id');
    // }

    // public function Roles() {
       
    // }

}
