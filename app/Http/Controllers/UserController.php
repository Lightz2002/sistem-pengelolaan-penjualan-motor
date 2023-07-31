<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
            'users' => User::filter($request->query())->paginate(3)->withQueryString(),
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

    //
    /**
     * Show user edit form
     */
    public function edit(User $user): View
    {
        return view('user.edit', [
            'user' => $user,
            'roles' => Role::all()
        ]);
    }

    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $prevRole = $user->roles[0];
        $newRole = Role::firstWhere('id', $request->role);
        $user->removeRole($prevRole->name);
        $user->assignRole($newRole->name);
        $user->save();


        return Redirect::route('users.edit', ['user' => $user])->with('status', 'user-updated');
    }


    public function delete(User $user): View
    {
        return view('user.delete', [
            'user' => $user
        ]);
    }

    public function destroy(User $user): RedirectResponse
    {
        $loggedInUser = Auth::user();
        if (!$loggedInUser->roles[0]->hasPermissionTo('manage user')) {
            return Redirect::to('/users')->with('status', 'permission-disallowed');
        }

        $user->delete();

        return Redirect::to('/users')->with('status', 'user-deleted');
    }
}
