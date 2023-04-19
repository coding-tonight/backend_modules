<?php

namespace Modules\Category\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'image',
        'parent'
    ];

    public function getProduct() {
        return $this->hasMany('Modules\Category\Entities\Product' , 'parent' , 'cateogries_id')->with('getProduct');
    }
    public function children()
    {
        return $this->hasMany('Modules\Category\Entities\Category', 'parent')->with('children');
    }

    public function parent_category()
    {
        return $this->belongsTo('Modules\Category\Entities\Category','parent')->with('parent_category');
    }
}
