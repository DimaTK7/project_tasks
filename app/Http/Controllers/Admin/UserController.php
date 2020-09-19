<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\User;

class UserController extends Controller
{
    public function __invoke()
    {
        return view('admin.users.index', [
            'users' => User::paginate(12)
        ]);
    }

}
