<?php

namespace Modules\Carousel\Http\Controllers\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Carousel\Entities\Carousel;

class ApiController extends Controller
{
 public function CarouselApi() {
    $carousel = Carousel::latest()->get();
    return $carousel;
 }
}
