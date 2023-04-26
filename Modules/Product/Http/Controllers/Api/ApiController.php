<?php

namespace Modules\Product\Http\Controllers\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Products;

class ApiController extends Controller
{
   public function ProductDetailApi(REQUEST $request) {
    $product_id = $request->id;
    $products = Products::where('id' , $product_id)->with(['GetDetail' , 'GetCategory'])->orderBy('updated_at' , 'desc')->get();   
    return $products;
   }

   public function ProductApi(REQUEST $request) {
      $products = Products::where('section' , $request->section)->get();
      return $products;
   }

   public function search($query){
   //   $query = $request->get('query');
     $search = Products::where('product_name' , 'LIKE' , "%{$query}%")->orWhere('market_price' , 'LIKE' , "%{$query}%")->with(['GetDetail' , 'GetCategory'])->get();  
    return $search;
   }
}
