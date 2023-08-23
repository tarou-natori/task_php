<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function login() {
        return view('Login.index');
    }

    public function register() {
        return view('Login.register');
    }
}
