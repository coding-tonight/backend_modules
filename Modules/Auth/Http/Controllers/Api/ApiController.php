<?php

namespace Modules\Auth\Http\Controllers\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Auth\Http\Requests\LoginRequest;
use Modules\Auth\Http\Requests\RegisterRequest;
use Modules\Auth\Entities\User;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function loginApi(LoginRequest $request)
    {
        if(Auth::attempt($request->only('username' , 'password'))) {
            $user = Auth::user();
            $token = $user->createToken('Access Token')->accessToken;

            return response()->json([
                 'access_token' => $token ,
                 'message' => 'Login successfully' , 
                  'user' => $user ,
                  'token_type' => 'Bearer'
            ] , 200);
        }
        else {
            return response([
                'message' => 'please enter validate credential'
            ] , 401);
        }
        
    }

    public function registerApi(REQUEST $request) {
        $request->validate([
         'username' => 'required|email|unique:users' , 
         'password' => 'required|confirmed'
        ]);

        $user = User::create([
            'username' => $request->username, 
            'password' => Hash::make($request->password),
            'is_admin' => '0'
         ]);

         $token =  $user->createToken('Access Token')->accessToken;

         return response()->json([
            'message' => 'Register Successfully',
            'access_token' => $token , 
            'token_type' => 'Bearer'
         ] , 200);

    }

    public function Auth() {
       $user = User::where('id' ,Auth::user()->id)->with('Role')->get();
       return $user;
    }
}
