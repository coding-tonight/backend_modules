<?php

namespace Modules\Role\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Role\Entities\Role;
use Modules\Auth\Entities\User;
use Auth;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $roles = Role::latest()->get();
        $user = User::where('id' ,Auth::user()->id)->with('Role')->get();
        dd($user);
        return view('role::index' , compact('roles'));
    }
}
