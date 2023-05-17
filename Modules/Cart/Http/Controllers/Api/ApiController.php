<?php

namespace Modules\Cart\Http\Controllers\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Cart\Entities\Cart;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    
     public function StoreCart(REQUEST $request) { 
        $request->validate([ 
          'product_code' => 'required' , 
           'order_qty' => 'required' ,
        ]);
        
        $products = $request->cart;
        

        foreach($products as $products) {
            Cart::insert([
                'product_code' => $product->product_code , 
                'order_qty' => $product->order_qty , 
                'product_name' => $product->product_name , 
                'delivery_fee' => $request->delivery_fee , 
                'order_qty' => $request->order_qty , 
                'total_amount' => $request->total_amount , 
                
            ])
        }

     }
   
}
