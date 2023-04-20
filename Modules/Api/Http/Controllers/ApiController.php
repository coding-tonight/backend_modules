<?php

namespace Modules\Api\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Product;

class ApiController extends Controller
{
  public function ApiProduct() {
    $products = Products::with(['GetDetail' , 'GetCategory'])->orderBy('updated_at' , 'desc')->get();
    return $products;
  }
}
