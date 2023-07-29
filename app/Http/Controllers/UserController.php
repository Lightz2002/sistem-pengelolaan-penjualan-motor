<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    //
    /**
     * Display the users list.
     */
    public function list(Request $request): View
    {
        return view('user.list', [
            'users' => User::paginate(2),
            'headers' => ['Username', 'Email', 'Role'],
        ]);
    }

    //
    /**
     * Show user form
     */
    public function create(Request $request): View
    {
        return view('user.create', [
            'roles' => Role::all(),
        ]);
    }
}
