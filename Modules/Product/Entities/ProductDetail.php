<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductDetail extends Model
{
    use HasFactory;
    
    protected $fillable = [
     'product_id'
    ];
    protected $guarded = [];

    public function product() {
        return $this->belongsTo('Modules\Product\Entities\Products::class' , 'product_id' , 'id');
    }
}
