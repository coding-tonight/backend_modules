<?php

namespace Modules\Cart\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = [];
    
   
    public function User() { 
        return $this->belongsTo('Modules\Auth\Entities\User' , 'id' , 'user_id');
    }

    public function Products() { 
        return $this->hasMany('Modules\Product\Entities\Product' , 'id' , 'product_id');
    }
    
}
