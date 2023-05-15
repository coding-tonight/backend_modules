<?php

namespace Modules\Dashboard\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Auth\Entities\Admin;
use Modules\Contact\Entities\Contact;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $message = Contact::count();

        return view('dashboard::index' , compact('message'));
    }
}
