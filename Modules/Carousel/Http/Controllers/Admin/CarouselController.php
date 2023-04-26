<?php

namespace Modules\Carousel\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Carousel\Entities\Carousel;
// use Illuminate\Support\Facades\Storage;
use Image;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {   
        $carousel = Carousel::latest()->get();
        return view('carousel::index' , compact('carousel'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('carousel::create');
    }

    public function add(REQUEST $request) 
    {
      $request->validate([
      'image' => 'required|image'
      ], [
        'image.required' => 'Please insert Image'
      ]);
       
      $image = $request->file('image');
      $image_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
      Image::make($image)->resize(1080 , 500)->save('upload/carousel/'.$image_name);

      if($request->file('image')){
        Carousel::insert([
          'image' => $image_name,
          'title' => $request->title,
          'description' => $request->description,
        ]);
      }
      return redirect()->route('all.carousel');
    }

    public function Edit($id) {
     $slide = Carousel::findorFail($id);

     return view('carousel::edit' , compact('slide'));
    }

    public function delete($id) {
        $slide = Carousel::findorFail($id)->delete();
        // Storage::delete($image_name);
        return redirect()->back();
    }
}
