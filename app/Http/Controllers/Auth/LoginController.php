<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password
            ]);
        return redirect()->route('admin');
        //dd($request);
        //return view('auth.login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
        //dd('logout');
        //return view('auth.login');
    }

}
