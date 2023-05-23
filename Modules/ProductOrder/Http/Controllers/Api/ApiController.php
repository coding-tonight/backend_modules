<?php

namespace Modules\ProductOrder\Http\Controllers\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ProductOrder\Http\Requests\OrderRequest;
use Modules\ProductOrder\Entities\Order;

class ApiController extends Controller
{

    public function OrderApi(REQUEST $request) { 
       $request->validate([
        'contact_number' => 'required',
        'full_name' => 'required' , 
        'email' => 'required|email' , 
      //   'total_amount' => 'required|decimal',
        'address' => 'required|max:200',
        'province' => 'required', 
         // 'payment_verification' => 'mimes:jpeg,png,pdf'
       ]);
      //  $products = [];
        
    // setting Aisa time as default
      date_default_timezone_set('Asia/Kathmandu');
    
       Order::insert([ 
        'order_id' => 'OID'.rand(01 , 9999),
        'contact_number' => $request->contact_number,
        'full_name' => $request->full_name , 
         'postal_code' => $request,
        'email' => $request->email, 
         'address' => $request->address,
        'order_time' => date('H:i:s') , 
        'order_date' => date('Y-m-d') , 
        'total_amount' => $request->total_amount , 
        'province' => $request->province , 
        'delivery_fee' => $request->delivery_fee,
        'order_products' => json_encode($request->order_products), 
        'city' => $request->city, 
      //   'product_id' => $request->product_id,
        'mode_of_payment' =>$request->mode_of_payment,
        'payment_verification' => $request->payment_verification,
       ]);

        // foreach($request->product_id as )

       return response()->json(['message' => 'please order is successfully placed']);
    }
  
}
