<?php

namespace Modules\Contact\Http\Controllers\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use  Modules\Contact\Entities\Contact;

class ApiController extends Controller
{
  public function ApiContact(REQUEST $request) {
   $request->validate([
     'email' => 'required|email' , 
     'subject'=> 'required',
     'message' => 'required|max:500'
   ]);
   
    $contacts = Contact::insert([
        'email' => $request->email, 
        'subject' => $request->subject, 
        'message' => $request->message,
    ]);

     return  response()->json(['success' => 'Message has been  successfully sent']);
  }
}
