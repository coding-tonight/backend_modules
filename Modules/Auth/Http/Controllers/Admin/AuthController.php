<?php

namespace Modules\Auth\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Auth\Http\Requests\LoginRequest;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {     
         $user = auth()->user();
          if($user != null) {
            return redirect(route('dashboard'));
          }
          else {
            return view('auth::login');
          }
       
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function login(LoginRequest $request)
    {
      if(Auth::attempt($request->only('username' , 'password'))) {
         return redirect('/');
      }
      return redirect('/login')->withError('Error please Entry vaild username and password');
    }
    
    public function logout(){
      Auth::Logout();
      Session::flush();

      return redirect('/login');
    }
}
