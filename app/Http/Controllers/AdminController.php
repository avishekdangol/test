<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm() {
        return view('admin.auth.login');
    }

    public function login(Request $request) {
        $request->validate([
            'username' => 'required|exists:admins,username',
            'password' => 'required|min:5|max:30'
        ], [
            'username.exists' => 'Sorry, you are not authorized!'
        ]);

        $creds = $request->only('username', 'password');

        if (Auth::guard('admin')->attempt($creds)) 
            return redirect()->route('admin.home');
        else
            return redirect()->route('admin.login')->with('fail', 'You are not authorized!');
    }

    public function index() {
        return view('admin.home');
    }
}
