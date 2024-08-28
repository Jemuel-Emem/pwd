<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthLogin extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
}
