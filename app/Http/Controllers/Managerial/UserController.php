<?php

namespace App\Http\Controllers\Managerial;

use App\Http\Controllers\Controller;
use App\Model\Managerial\User;

class UserController extends Controller
{
    public function __invoke()
    {
        return view('managerial.users.index', [
            'users' => User::paginate(10)
        ]);
    }

}
