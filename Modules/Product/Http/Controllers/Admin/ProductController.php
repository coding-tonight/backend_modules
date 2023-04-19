<?php

namespace Modules\Product\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Products;
use  Modules\Category\Entities\Category;
use Modules\Product\Entities\ProductDetail;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {   
        $categories = Category::with('parent_category')->orderBy('updated_at' , 'asc')->get(); 
        return view('product::index' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $categories = Category::with('parent_category')->orderBy('updated_at' , 'asc')->get();
        return view('product::create' , compact('categories'));
    }

    public function perform(REQUEST $request) {
       $request->validate([
          'product_code' => 'required',
          'wholesale_price' => 'required|integer',
          'retail_price' => 'required|integer',
          'market_price' => 'required|integer',
          'qty' => 'required|integer',
          'image' => 'required|mimes:jpeg,png,jpg,gif',
          'image_one' => 'mimes:jpeg,png,jpg,gif',
          'image_two' => 'mimes:jpeg,png,jpg,gif',
          'image_three' => 'mimes:jpeg,png,jpg,gif',
          'description' => 'required',
          'category_id' => 'required',
           'color' => 'required'
       ] , [
          'product_code.requied' => 'please entry product code' ,
          'wholesale_price.required' => 'Wholesale price required',
          'retial_price.required' => 'Retial price required',
          'market_price.required' => 'market price requied', 
          'qty.required' => 'quantity required',
           'image.required' => 'image is required'
       ]);

        $image = $request->file('image');
        $gen_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(500 , 500)->save('upload/product/'.$gen_name);

        $image_url = 'http://127.0.0.1/upload/product/'.$gen_name;
        
        //Product Images for Prduct pages
        $image_one = $request->file('image_one');
        $gen_name_one = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
        Image::make($image_one)->resize(500 , 500)->save('upload/product/'.$gen_name_one);

        $image_url_one = 'http://127.0.0.1/upload/product/'.$gen_name_one;
        //*******/
        $image_two = $request->file('image_two');
        $gen_name_two = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
        Image::make($image_two)->resize(500 , 500)->save('upload/product/'.$gen_name_two);

        $image_url_two = 'http://127.0.0.1/upload/product/'.$gen_name_two;

        //*******/
        $image_three = $request->file('image_three');
        $gen_name_three = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
        Image::make($image_three)->resize(500 , 500)->save('upload/product/'.$gen_name_three);

        $image_url_three = 'http://127.0.0.1/upload/product/'.$gen_name_three;
        
           $product_with_id =  Products::insertGetId([
                'product_name' => $request->product_name , 
                'product_code' => $request->product_code, 
                'wholesale_price' => $request->wholesale_price , 
                 'retail_price' => $request->retail_price , 
                 'market_price' => $request->market_price,
                 'qty' => $request->qty , 
                  'image' => $image_url ,
                  'category_id' =>$request->category_id,
                  'section' => $request->section,
            ]);
            
            ProductDetail::insert([
                'product_id' => $product_with_id,
                'image_one' => $image_url_one,
                'image_two' => $image_url_two,
                'image_three' => $image_url_three, 
                'color' => $request->color,
                'zipper' => $request->zipper,
                'width' => $request->width,
                'height' => $request->height,
                'length' => $request->length,
                'description' => $request->description,
                'thread' => $request->thread,
                'tape' => $request->tape,
                 'farbic' =>$request->farbic,
                 'running' => $request->running
            ]);
             $notification = array(
                'message' => 'Product added with image', 
                 'alert-type' => 'success',
             );
        
         return redirect()->route('all.product')->with($notification);
    }


    public function Edit($id) {
       $product = Products::findorFail($id);
       return view('product::edit' , compact('product'));
    }

    // public function Update(REQUEST $request) {
    //    $product = $request->id;
       
    // }
}
