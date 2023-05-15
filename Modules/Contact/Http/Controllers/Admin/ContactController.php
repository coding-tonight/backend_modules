<?php

namespace Modules\Contact\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Contact\Entities\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('contact::index' , compact('contacts'));
    }

    public function delete($id) { 
        Contact::findorFail($id)->delete();
        return redirect()->back();
    }
}
