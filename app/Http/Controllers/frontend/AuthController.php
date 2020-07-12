<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {
        return view('frontend.user.register');
    }

    public function login()
    {
        return view('frontend.user.login');
    }
}
