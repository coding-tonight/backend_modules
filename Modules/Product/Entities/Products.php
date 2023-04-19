<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;

    protected $guraded = [];


    public function Getcategory() {
        return $this->belongsTo('Modules\Product\Entities\Category::class' , 'category_id' ,'id');
    }

    public function GetDetail() {
        return $this->hasOne('Modules\Product\Entities\ProductDetail::class' , 'id' , 'product_id');
    }
}
