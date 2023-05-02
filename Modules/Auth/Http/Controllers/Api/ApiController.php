<?php

namespace Modules\Auth\Http\Controllers\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Auth\Http\Requests\LoginRequest;
use Modules\Auth\Http\Requests\RegisterRequest;
use Modules\Auth\Entities\User;

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
            $token = $user->createToken('app')->accessToken;

            return response([
                'message' => 'Login succesfully',
                 'token' => $token , 
                 'user' => $user
            ] , 200);
        }
        else {
            return response([
                'message' => 'please enter validate credential'
            ] , 401);
        }
        
    }

    public function registerApi(RegisterRequest $request) {
         User::create([
            'username' => $request->username, 
            'password' => Hash::make($request->password),
         ]);
    }
}
