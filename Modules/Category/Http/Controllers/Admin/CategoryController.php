<?php

namespace Modules\Category\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Modules\Category\Entities\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('category::index' , compact('categories'));
    }

    public function create() 
    {
        $categories = Category::latest()->get();
        return view('category::create', compact('categories'));
    }

    public function perform(REQUEST $request) 
    {
       $request->validate([
         'category_name' => 'required',
         'image' => 'required|image'
       ]);

        $image = $request->file('image');
        $gen_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300 , 300)->save('upload/category/'.$gen_name);
        
        $image_url = "http://127.0.0.1:8000/upload/category/".$gen_name;
        
        Category::insert([
            'category_name'=> $request->category_name,
            'image'=> $image_url,
            'parent'=> $request->parent
        ]);
        
        $notification = array(
            'message' => 'Category added Successfully',
            'alert-type' => 'sccuess'
        );

        return redirect()->route('all.category')->with($notification);
    }
}
