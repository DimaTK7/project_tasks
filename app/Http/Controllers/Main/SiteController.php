<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index()
    {
        return view('site.index');
    }
}
