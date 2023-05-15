<?php

namespace Modules\ProductOrder\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function User() { 
        return $this->belongsTo('Modules\Auth\Entities\User' , 'id' , 'user_id');
    }
}
