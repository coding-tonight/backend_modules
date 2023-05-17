<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Products extends Model
{
    use HasFactory;

    protected $table = 'products';
    
    protected $fillable = [
     'product_name'
    ];
    protected $guraded = [];


    public function Getcategory() {
        return $this->belongsTo('Modules\Category\Entities\Category' , 'category_id' ,'id');
    }

    public function GetDetail() {
        return $this->hasOne('Modules\Product\Entities\ProductDetail' , 'product_id' , 'id');
    }

    public function GetSocialMedia() {
        return $this->hasOne('Modules\Product\Entities\SocialMedia' , 'product_id' , 'id');
    }

    public function Cart() { 
        return $this->belongsTo('Modules\Cart\Entities\Cart' , 'product_id' , 'id');
    }
}
