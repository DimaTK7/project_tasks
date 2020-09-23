<?php

namespace App\Http\Controllers\Admin;

use App\Events\SendMessageRole;
use App\Http\Controllers\Controller;
use App\Listeners\SendMessageChangeRole;
use App\Model\Admin\User;
use App\Model\Permission;
use App\Model\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::paginate(12)
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
       //
    }

    public function edit(int $id)
    {
        return view('admin.users.edit', [
            'user' => User::find($id),
            'roles' => Role::all(),
            'permissions' => Permission::all(),
        ]);
    }

    public function update(Request $request, int $id)
    {
        event(new SendMessageRole());
        $user = User::find($id);
        $user->roles()->sync($request->only('role'));
        $request = $request->only('permissions');
        if ($request) {
            $user->permissions()->sync($request['permissions']);
        }
        $user->save();
        return redirect(route('user.index'));
    }

    public function destroy(int $id)
    {
        //
    }
}
