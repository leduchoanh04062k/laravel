<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login()
    {
        // dd(request()->all());
        $result = Auth::attempt([
            'email' => request()->get('email'),
            'password' => request()->get('password'),
        ], request()->get('remember'));
        if ($result) {
            return redirect()->route('users.index');
        }
        //   dd(__('auth.failed'));
        request()->flashOnly(['email']);
        return view('auth.login', [
            'message' => __('auth.failed'),
        ]);
    }
}