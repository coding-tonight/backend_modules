<?php

namespace Modules\Category\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Modules\Category\Entities\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Image;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $categories = Category::with('parent_category')->orderBy('updated_at' , 'DESC')->get();
  
        return view('category::index' , compact('categories'));
    }

    public function create() 
    {
        $categories = Category::latest()->get();
        return view('category::create', compact('categories'));
    }

    public function perform(REQUEST $request) 
    {
       if($request->file('image')){

         // validate if only file has image

        $request->validate([
          'category_name' => 'required',
          'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]); 

          $image = $request->file('image');
          $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
          Image::make($image)->save('upload/category/'.$imageName);

          Category::insert([
            'category_name'=> $request->category_name,
            'image'=> $imageName,
            'parent'=> $request->parent
        ]);
        
        $notification = array(
            'message' => 'Category added Successfully',
            'alert-type' => 'sccuess'
        );
       } else {
        //  if use dosen't has image this will run 
         $imageName = "";
         Category::insert([
          'category_name'=> $request->category_name,
          'parent'=> $request->parent
      ]);
       
      $notification = array(
        'message' => 'Category added Successfully',
        'alert-type' => 'sccuess'
    );

       }
        

        return redirect()->route('all.category')->with($notification);
    }
     
     public function edit($id) {
        $category = Category::findorFail($id);
        $categories = Category::latest()->get();
         return view('category::edit' , compact('category' , 'categories'));
     }

     public function update(REQUEST $request) {
        if($request->file('image')) {

          $request->validate([
            'category_name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
           ] , 
           [
             'Category_name.required' => 'Please Enter Category name'  ,
           ]);
          $image = $request->file('image');
          $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
          Image::make($image)->save('upload/category/'.$imageName);

          Category::findorFail($request->id)->update([
            'category_name' => $request->category_name, 
            'image' => $imageName,
            'parent' => $request->parent
          ]);
        }

        else {
            Category::findorFail($request->id)->update([
                'category_name' => $request->category_name, 
                'parent' => $request->parent
              ]); 
        }

        return redirect()->route('all.category');
     }

     public function delete($id) {
        $category = Category::findorFail($id)->delete();
        return redirect()->back();
     }
}
