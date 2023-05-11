<?php

namespace Modules\Role\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Role\Entities\Role;
use Illuminate\Support\Facades\Gate;
// use Modules\Auth\Entities\User;
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
        // $user = User::where('id' ,Auth::user()->id)->with('Role')->get();
        // dd($user);
        if(Gate::allows('Manage_user')) {
            return view('role::index' , compact('roles'));
        }
        abort(403);
    }
}
