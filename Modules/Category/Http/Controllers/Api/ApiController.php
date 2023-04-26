<?php

namespace Modules\Category\Http\Controllers\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Category\Entities\Category;

class ApiController extends Controller
{
  public function CategoryApi() {
    $Category = Category::with('parent_category')->orderBy('updated_at', 'desc')->get();
     return $Category;
  }
}
