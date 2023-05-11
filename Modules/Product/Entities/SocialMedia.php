<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SocialMedia extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    public function product() {
     return $this->belongsTo('Modules\Product\Entities\Product' , 'id' , 'product_id');
    }
}
