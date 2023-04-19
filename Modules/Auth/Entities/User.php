<?php

namespace Modules\Auth\Entities;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory , HasApiTokens , Notifiable;

    protected $fillable = [
        'username' ,
         'name' ,
         'password'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
   
}
