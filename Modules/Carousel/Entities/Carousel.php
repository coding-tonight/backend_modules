<?php

namespace Modules\Carousel\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carousel extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'description',
        'title',
    ];
    
}
